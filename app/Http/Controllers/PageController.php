<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PageController extends Controller
{
    public function show($name)
    {
        // List of allowed pages (to prevent errors or unwanted access)
        $pages = ['home', 'bio', 'resume', 'portfolio', 'blog','login' , 'register'];
        $auth_pages = ['admin'];

//        if(!(view()->exists($name))){
//            return view('pages.home');
//        }
        if (in_array($name, $pages)) {
            return view('pages.' . $name);
        }
        if(in_array($name, $auth_pages)) {
            if (Auth::check()) {
                $user = Auth::user();
                if ($user->user_type == 0) {
                    return view('pages.' . $name);
                } else {
                    abort(403, 'Unauthorized access');
                }
            } else {
                return redirect()->route('login');
            }
        }
        // If not found, return 404
        abort(404);
    }
}
