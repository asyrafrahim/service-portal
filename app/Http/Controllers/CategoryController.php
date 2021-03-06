<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories = Category::all();
        return view('categories.index')->with(compact('categories'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        // get current logged in user
        $user = Auth::user();
        
        return view('categories.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $input = $request->all();
        
        $category = Category::create($input);
        
        // dd($request);
        
        return redirect('/categories');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function show(Category $category)
    {
        //
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function edit(Category $category)
    {
        return view('categories.edit')->with(compact('category'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, Category $category)
    {
        // get current logged in user
        $user = Auth::user();
        
        $category->update($request->only('name'));
        return redirect()
        ->route('categories.index')
        ->with(['alert-type' => 'alert-success','alert'=> 'Category updated']);
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Category  $category
    * @return \Illuminate\Http\Response
    */
    public function destroy(Category $category)
    {
        // get current logged in user
        $user = Auth::user();
        
        $category->delete();
        
        return redirect()->route('categories.index')
        ->with('success', 'Category deleted successfully');
    }
}
