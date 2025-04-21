<?php
namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Http\Request;
use \App\Models\Comment;

class commentController extends Controller {

    public function create(Request $request) {
        $commentItem = new Comment;
        $commentItem->CONTENTS = $_POST['content'];
        $commentItem->USER_ID = Auth::user()->USER_ID;
        $commentItem->BLOG_ID = $_POST['blog_id'];//TODO: change it to fetch blog id.
        
        $commentItem->save();
        return redirect()->route('page.blogfull',['id'=>$_POST['blog_id']]);
    }

    public function delete() {
        try {
            $comment = \App\Models\Comment::find($_GET['id']);
            $blogItem = $comment['BLOG_ID'];
            $comment->delete();
        }
        catch (\Exception $e) {
            http_response_code(400);
        }
        return redirect()->route('page.blogfull',['id'=>$blogItem]);
    }
    public function edit() {
        try {
            $comment = Comment::find($_GET['id']);
            $blogItem = $comment['BLOG_ID'];
            assert(Auth::user()->USER_ID==$comment['USER_ID']);
            $comment->CONTENTS = $_POST['content'];
            $comment->save();
        }
        catch (\Exception $e) {
            http_response_code(400);
        }
        return redirect()->route('page.blogfull',['id'=>$blogItem]);
    }
}
