<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function store(Request $request){

        dd($request->name);
        $data = $request->validate([
            'name'=> 'alpha'
        ]);
        Category::create($data);
        return 'SUCCESS';
    }
    public function getAllCat(){
        return Category::latest()->get();
    }
}
