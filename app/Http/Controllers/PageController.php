<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function show($name)
    {
        // List of allowed pages (to prevent errors or unwanted access)
        $pages = ['home', 'bio', 'resume', 'portfolio', 'blog','login' , 'register'];

        if (in_array($name, $pages)) {
            return view('pages.' . $name);
        }

        // If not found, return 404
        abort(404);
    }
}
