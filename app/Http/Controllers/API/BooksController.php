<?php

namespace App\Http\Controllers\API;

use App\Models\Book;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


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
        return Controller::success($books);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'image' => 'required|mimes:jpg,png,jpeg',
            'isbn' => 'required|unique:books',
            'author' => 'required|min:3',
            'publisher' => 'required|min:3',
            'publish_year' => 'required|integer|min:1950|max:2020',
            'category_id' => 'required|integer',
        ]);
        if($validated->fails()) {
        	return Controller::error($validated->errors());
        } else {

	        // Upload Image And Store
	        $uploadedImage = $request->file('image');
	        $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
	        $direction = public_path('/books');
	        $uploadedImage->move($direction, $imageName);

	        $book = new Book();
	        $book->fill($request->all());
	        $book->image = '/books/' . $imageName;
	        $result = $book->save();

	        
	        if( $result ){
	        	return Controller::success($book);
	        }
	        else {
	        	return Controller::error("Something Went Wrong!!");
	        }
	    }	
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
        $validated = Validator::make($request->all(), [
            'name' => 'required|min:3',
            'image' => 'mimes:jpg,png,jpeg',
            'isbn' => 'required|unique:books,isbn,' . $id,
            'author' => 'required|min:3',
            'publisher' => 'required|min:3',
            'publish_year' => 'required|integer|min:1950|max:2020',
            'category_id' => 'required|integer',
        ]);


        if($validated->fails()) {
            return Controller::error($validated->errors());
        } else {
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

            $result = $book->update();

            
            if( $result ){
                return Controller::success($book);
            }
            else {
                return Controller::error("Something Went Wrong!!");
            }
        }
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
        return Controller::success($book);
    }
}
