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
            $blogItem->USER_ID = Auth::user()->USER_ID;
            $blogItem->TITLE = $_POST['title'];
            $blogItem->CONTENTS = $_POST['content'];
            if ($request->file('img')!==null)
                $blogItem->IMAGE_URL = '/storage/' .$request->file('img')->store('portfolioImgs','public');
            $blogItem->save();
            return view('pages.blog');
        }
        
        public function edit(Request $request) {
            //TODO: Figure out how to edit blogs.
            $blogItem = Blog::find($_GET['id']);
            self::blogItemFormRequest($blogItem, $request);
            return view('pages.blogfull');//TODO: complete this
        }

        private function blogItemFormRequest(Blog $blogItem, Request $request){
            $blogItem->USER_ID = Auth::user()->USER_ID;
            $blogItem->TITLE = $_POST['title'];
            $blogItem->CONTENTS = $_POST['content'];
            if ($request->file('img')!==null)
                $blogItem->IMAGE_URL = '/storage/' .$request->file('img')->store('portfolioImgs','public');
            $blogItem->save();
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

        //chat
        public function index(){
            $blogs = Blog::all(); // or paginate if needed
            return view('blogs.index', compact('blogs'));
        }

        public function show($id){
            $blog = Blog::findOrFail($id);
            return view('blogs.show', compact('blog'));
        }
    }
?>