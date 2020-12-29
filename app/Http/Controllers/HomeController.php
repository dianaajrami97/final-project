<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Book;

class HomeController extends Controller
{
	public function index()
    {
    	$categories = Category::all();
    	$books = Book::all();
        return view('index', ['categories' => $categories, 'books' => $books]);
    }    
}
