<?php

namespace App\Http\Controllers\API;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all()->load('books');
        return Controller::success($categories);
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
            'language' => 'required',        
        ]);
        if($validated->fails()) {
        	return Controller::error($validated->errors());
        } else {

	        $category = new Category();
	        $category->fill($request->all());
	        $result = $category->save();

	        
	        if( $result ){
	        	return Controller::success($category);
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
            'language' => 'required',
        ]);


        if($validated->fails()) {
            return Controller::error($validated->errors());
        } else {
            $category = Category::findorFail($id);
            $category->fill($request->all());
            $result = $category->update();

            
            if( $result ){
                return Controller::success($category);
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
        $category = Category::findOrFail($id);
        $result = $category->delete();   
        return Controller::success($category);
    }
}
