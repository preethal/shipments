<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Tag;

class TagController extends Controller
{
    //

     public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {

        $tags = Tag::latest()->paginate(5);
        return view('indextag', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }

    public function create()
    {
      return view('createtag');
    }


    public function store(Request $request)
    {
        // save tag names
        $input = $request->all();
        $tagss = Tag::create($input);
        $tags = Tag::latest()->paginate(5);
        return view('indextag', compact('tags'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        
    }


}
