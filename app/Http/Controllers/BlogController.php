<?php
    namespace App\Http\Controllers;
    use \Illuminate\Support\Facades\Auth;
    use \Illuminate\Support\Facades\Storage;
    use \Illuminate\Support\Facades\DB;
    use \Illuminate\Http\Request;
    use \App\Models\Blog;

    class BlogController extends Controller {

        public function create(Request $request) {
            $blogItem = new Blog;
            //$blogItem->USER_ID = Auth::id(); // uncomment when we get login working
            $blogItem->TITLE = $_POST['title'];
            $blogItem->CONTENT = $_POST['content'];
            $blogItem->CREATE_DT = $_POST['create_dt'];
            if ($request->file('img')!==null)
                $blogItem->IMAGE_URL = '/storage/' .$request->file('img')->store('portfolioImgs','public');
            $blogItem->save();
            return view('pages.blog');
        }
        
        public function edit() {
            //TODO: Figure out how to edit blogs.
        }

        public function delete() {
            try {
                \App\Models\Blog::destroy($_GET['id']);
            }
            catch (\Exception $e) {
                http_response_code(400);
            }
            return view('pages.blog');
        }
    }
?>