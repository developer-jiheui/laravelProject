<?php

namespace App\Http\Controllers;

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
    public function edit($id) {

    }
    public function create($id) {

    }
}