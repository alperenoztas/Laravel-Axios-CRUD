<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function store(Request $request){


        $data = $request->validate([
            'name'=> 'required'
        ]);

        Category::create($data);
        return response()->json($data, 200);

    }
    public function getAllCat(){
        return Category::latest()->get();
    }
}
