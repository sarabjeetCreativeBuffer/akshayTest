<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::all();

        return view('category.list',compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'category_des' => 'required|max:100',
           
        ]);
       
        Category::create([
            'category_name' => $request->name,
            'category_short_description' => $request->category_des,
        ]);

        return redirect()->route('category.list')->with('success','Category Created Successfully');
    }

    public function delete($id){

        Category::where('id',$id)->delete();

        return redirect()->route('category.list')
        ->with('success','Category deleted successfully');
    }

    public function show($id){

        $category= Category::where('id', $id)->first();

        return view('category.show',compact('category'));
    }

    public function edit($id){

        $category= Category::where('id',$id)->first();

        return view('category.edit',compact('category'));
    }
    
    public function update(Request $request){

        $request->validate([
            'name' => 'required|max:50',
            'category_des' => 'required|max:100',
            
        ]);
       
        $category = Category::where('id',$request->id)->first();
        $category->category_name = $request->name;
        $category->category_short_description = $request->category_des;
        $category->save();

        return redirect()->route('category.list')->with('success','Category Updated Successfully');
    }
}
