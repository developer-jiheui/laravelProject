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
        return view('pages.blogfull');
    }

    public function delete() {
        try {
            \App\Models\Comment::destroy($_GET['id']);
        }
        catch (\Exception $e) {
            http_response_code(400);
        }
        return view('pages.blogfull');
    }
}
