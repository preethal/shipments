<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;
use DB;


class CategoryController extends Controller
{
    //

     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        // Fetch categories
        $categories = Category::latest()->paginate(5);
        return view('getcategory',['categories'=>$categories]);
    }

    public function create()
    {
    // 
    return view('createcategory');
    }

    public function store(Request $request)
    {
    // save the categories

        $input = $request->all();
        $categories = Category::create($input);
        $categories = Category::latest()->paginate(5);
        return view('getcategory',['categories'=>$categories]);

    }


    


 
}
