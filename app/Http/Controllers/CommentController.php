<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Comment;


class CommentController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        $validatedData = $request->validated();
        Comment::create($validatedData);
        return back()->with('commentStoreStatus', 'Your comment has been submitted successfully.');
    }
}
