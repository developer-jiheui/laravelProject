<?php

namespace App\Http\Controllers;
use \Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Storage;
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
                $portfolioItem->IMAGE_URL = $request->file('img')->store('portfolioImgs','local');
            $portfolioItem->LIKE_COUNT = 0;
            $portfolioItem->save();
        /*}
        catch (\Exception $e) {
            http_response_code(400);
        }*/
        return view('pages.portfolio');
    }
}