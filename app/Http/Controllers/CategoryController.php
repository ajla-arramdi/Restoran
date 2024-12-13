<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Models\Category;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function Create(Request $request){
        return view('category.create');
    }

    public function store(Request $request){
        $data = DB::table('categories')->insert([
              "category_name" => $request->input('inputname'),
              
        ]);

        return redirect('category');

       Category::create([
        'category_name' => $request->inputname
       ]);

       
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = Category::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()->route('category.index')->with('success', 'Category updated successfully!');
        
    }

    public function delete($id)
    {
        $category = Category::find($id)->delete();
        

        return redirect()->route('category.index')->with('success', 'Category deleted successfully!');
    }
}
    

   
    
    



