<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Http\Request;
use \App\Models\Portfolio;

class PortfolioController extends Controller {
    public function delete() {
        try {
            \App\Models\Portfolio::destroy($_GET['id']);
        }
        catch (\Exception $e) {
            http_response_code(400);
        }
        return view('pages.portfolio');
    }
    public function edit() {

    }
    public function create(Request $request) {
        //try {
            $portfolioItem = new Portfolio;
            //$portfolioItem->USER_ID = Auth::id(); // uncomment when we get login working
            $portfolioItem->TITLE = $_POST['title'];
            $portfolioItem->DESCRIPTION = $_POST['desc'];
            $portfolioItem->CATEGORY = $_POST['category'];
            $portfolioItem->PROJECT_URL = $_POST['url'];
            if ($request->file('img')!==null)
                $portfolioItem->IMAGE_URL = '/storage/' .$request->file('img')->store('portfolioImgs','public');
            $portfolioItem->LIKE_COUNT = 0;
            $portfolioItem->save();
        /*}
        catch (\Exception $e) {
            http_response_code(400);
        }*/
        return view('pages.portfolio');
    }
    public function like() {
        $existingLike = DB::scalar('SELECT COUNT(*) FROM likes WHERE portfolio_id = ? AND user_id=? LIMIT 1',[$_GET['id'],Auth::user()->USER_ID]);
        if ($existingLike) {
            DB::delete('DELETE FROM  likes WHERE user_id=? AND portfolio_id=?',[Auth::user()->USER_ID,$_GET['id']]);
        }
        else {
            DB::insert('INSERT INTO likes (user_id, portfolio_id) values (?, ?)',[Auth::user()->USER_ID,$_GET['id']]);
        }
        DB::update('UPDATE portfolio SET like_count = (SELECT COUNT(*) FROM likes WHERE portfolio_id=?) WHERE portfolio_id = ?',[$_GET['id'],$_GET['id']]);
        return view('pages.portfolio');
    }
}