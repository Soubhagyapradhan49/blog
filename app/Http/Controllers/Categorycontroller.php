<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class Categorycontroller extends Controller
{
   
    public function index()
    {
        $categories = Category::get();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    
    public function store(Request $request)
    {

        $validated= $request->validate([
            'name'=> 'required'   ]);

        $post = Category::create([
            'name' => $request->name
            ]);
            
            return redirect()->route('categories.index');
    }

 

  
    public function edit($id)
    {
       
    }


     
    public function update(Request $request, $id)
    {
        
    }

    public function destroy($id)
    {
         Category::where('id', $id)->delete();
        return redirect()->back();
    }
}
