@extends('layouts.footer')
@extends('layouts.main')
@section('content')
    @php
        if (isset($_GET['id'])) {
            $blogItem = \App\Models\Blog::find($_GET['id']);
            if (Auth::user()===null||Auth::user()->USER_ID!=$blogItem['USER_ID']) {
                http_response_code(304); // FORBIDDEN 
                die();
            }
        }
        else {
            $blogItem = [];
            if (Auth::user()===null||Auth::user()->USER_TYPE!=0) {
                http_response_code(304);
                die();
            }
        }
    @endphp
    <article class=active data-page="blog"><!-- Need this to edit blog -->
        <header>
            <h2 class="h2 article-title">
                @if(isset($_GET['id']))
                Editing Item
                @else
                Adding Item
                @endif
            </h2>
        </header>
        <form class=form action="{{isset($_GET['id'])?route('edit.blog.update', ['id'=>$_GET['id']]):route('edit.blog.create')}}" 
        method=post enctype=multipart/form-data>
            @csrf
            @if(isset($_GET['id']))
                @method('patch')
            @else
                @method('post')
            @endif
            <div class="input-wrapper">
                <label for=title class=form-label>Title</label>
                <input name=title id=title class=form-input value="{{$blogItem['TITLE']??''}}">
            </div>
            <div class="input-wrapper">
                <label for=content class=form-label>Content</label>
                <textarea name=content id=content class=form-input>{{$blogItem['CONTENTS']??''}}</textarea>
            </div>
            <div class="input-wrapper">
                <label for=img class=form-label>Image</label>
                <div style=display:flex;justify-content:space-between;align-items:center>
                <span id=imgname>{{ltrim(strrchr($blogItem['IMAGE_URL']??'/No image','/'),'/')}}</span>
                <label class=icon-box><ion-icon name="cloud-upload-outline" role=img aria-label="Upload new icon&hellip;"></ion-icon>
                  <input type=file name=img id=img style=position:absolute;top:-999px onchange="document.getElementById('imgname').textContent=this.files[0].name">
                </label></div>
            </div>

            <div>
                    <button type="submit" class="form-btn" style=margin-right:auto>
                        @if(isset($_GET['id']))
                        Save Item
                        @else
                        Add Item
                        @endif
                    </button>
                </div>
        </form>
</article>
@endsection
@extends('layouts.header')