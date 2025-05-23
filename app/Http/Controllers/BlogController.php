<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class BlogController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->only(['create']);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
        $user_id = Auth::user()->id;
        $blogs = Blog::where('user_id', $user_id)->paginate(5);
        return view('theme.blogs.index' , compact('blogs'));
        }
        abort(403, 'Unauthorized action.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('theme.blogs.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBlogRequest $request)
    {
        $validatedData= $request->validated();
        $validatedData['user_id'] = Auth::user()->id;
        $image = $request->image;
        $imageName = time() . '-' . $image->getClientOriginalName();
        $image->storeAs('blogs', $imageName , 'public');
        $validatedData['image'] = $imageName;
        Blog::create($validatedData);
        return back()->with('blogCreateStatus', 'Your blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        return view('theme.single-blog' , compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        if(Auth::user()->id != $blog->user_id){
            abort(403, 'Unauthorized action.');
        }
        $categories = Category::get();
        return view('theme.blogs.edit' , compact('blog' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        if(Auth::user()->id != $blog->user_id){
            abort(403, 'Unauthorized action.');
        }
        $validatedData= $request->validated();
        if($request->hasFile('image')){
            Storage::disk('public')->delete('blogs/' . $blog->image);
            $image = $request->image;
            $imageName = time() . '-' . $image->getClientOriginalName();
            $image->storeAs('blogs', $imageName , 'public');
            $validatedData['image'] = $imageName;
        }
        $blog->update($validatedData);
        return back()->with('blogUpdateStatus', 'Your blog updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if(Auth::user()->id != $blog->user_id){
            abort(403, 'Unauthorized action.');
        }
        Storage::disk('public')->delete('blogs/' . $blog->image);
        $blog->delete();
        return back()->with('blogDeleteStatus', 'Your blog deleted successfully');
    }
}
