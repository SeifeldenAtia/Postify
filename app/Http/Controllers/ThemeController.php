<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class ThemeController extends Controller
{
    //
    public function index()
    {
        $blogs = Blog::paginate(4);
        return view('theme.index' , compact('blogs'));
    }
    public function catogory($id)
    {
        $category = Category::findOrFail($id);
        $blogs = Blog::where('category_id', $id)->paginate(8);
        return view('theme.category' , compact('blogs' , 'category'));
    }

    public function contact()
    {
        return view('theme.contact');
    }


 }
