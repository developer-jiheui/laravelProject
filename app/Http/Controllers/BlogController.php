<?php
    namespace App\Http\Controllers;
    use \Illuminate\Support\Facades\Auth;
    use \Illuminate\Support\Facades\Storage;
    use \Illuminate\Support\Facades\DB;
    use \Illuminate\Http\Request;
    use \App\Models\Blog;
    use DOMDocument;

    class BlogController extends Controller {

        public function create(Request $request)
        {
            $request->validate([
                'title'   => 'required|string|max:255',
                'content' => 'required|string',
            ]);

            $blogItem = new Blog;
            $blogItem->USER_ID  = Auth::user()->USER_ID;
            $blogItem->TITLE    = $request->input('title');
            $blogItem->CONTENTS = $request->input('content');

            //  Extract the first image from content
            $firstImage = self::extractFirstImageSrc($request->input('content'));
            if ($firstImage !== null) {
                $blogItem->IMAGE_URL = $firstImage;
            }

            $blogItem->save();

            return view('pages.blog');
        }

        public function edit(Request $request) {
            $blogItem = Blog::find($_GET['id']);
            $blogItem->IMAGE_URL = self::extractFirstImageSrc($request->$_POST['content']);
            self::blogItemFormRequest($blogItem, $request);
            return view('pages.blogfull');
        }



        public static function extractFirstImageSrc($html)
        {
            if (preg_match('/<img[^>]+src="([^">]+)"/i', $html, $matches)) {
                return $matches[1]; // This is the first image src (data:image or URL)
            }
            return null;
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
