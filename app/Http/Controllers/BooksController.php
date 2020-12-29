<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all()->load('category');
        return view('control.books.index', ['books' => $books]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('control.books.create', ['categories' => $categories]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,png,jpeg',
            'isbn' => 'required|unique:books',
            'author' => 'required|min:3',
            'publisher' => 'required|min:3',
            'publish_year' => 'required|integer|min:1950|max:2020',
            'category_id' => 'required|integer',
        ]);

        // Upload Image And Store
        $uploadedImage = $request->file('image');
        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
        $direction = public_path('/books');
        $uploadedImage->move($direction, $imageName);

        $book = new Book();
        $book->fill($request->all());
        $book->image = '/books/' . $imageName;
        $result = $book->save();
        return redirect()->route('book.all')->with(['success' => 'The Book Added Successflly']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();        
        return view('control.books.edit', ['book' => $book, 'categories' => $categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:3',
            'image' => 'mimes:jpg,png,jpeg',
            'isbn' => 'required|unique:books,isbn,' . $id,
            'author' => 'required|min:3',
            'publisher' => 'required|min:3',
            'publish_year' => 'required|integer|min:1950|max:2020',
            'category_id' => 'required|integer',
        ]);



        $book = Book::findorFail($id);
        $book->fill($request->all());


        // Update Image If A new Image Added
        if($request->hasFile('image')) {
            // Upload Image And Store
            $uploadedImage = $request->file('image');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $direction = public_path('/books');
            $uploadedImage->move($direction, $imageName);
            $book->image = '/books/' . $imageName;        
        }

        $book->update();
        return redirect()->route('book.all')->with(['success' => 'The Book Updated Successflly']);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $result = $book->delete();   
        return redirect()->back()->with(['success' => 'The Book Deleted Successflly']);
    }
}
