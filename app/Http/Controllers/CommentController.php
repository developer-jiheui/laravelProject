<?php
/* //ChatGPT

use App\Models\Comment;
use App\Models\Blog;
use Illuminate\Http\Request;

function store(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'comment' => 'required|string',
    ]);

    $blog = Blog::findOrFail($id);

    $blog->comments()->create([
        'name' => $request->name,
        'comment' => $request->comment,
    ]);

    return redirect()->route('blogs.show', $id)->with('success', 'Comment added!');
} */
