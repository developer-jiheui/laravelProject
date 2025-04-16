@extends('layouts.footer')
@extends('layouts.main')
@section('content')
    {{-- TODO check user is the same one who is allowed to edit the item --}}
    <article class=active data-page="portfolio">

        <header>
            <h2 class="h2 article-title">
                @if(isset($_GET['id']))
                Editing Item
                @else
                Adding Item
                @endif
            </h2>
        </header>
        <form class=form action="{{isset($_GET['id'])?route('edit.portfolio.update', ['id'=>$_GET['id']]):route('edit.portfolio.create')}}" method=post enctype=multipart/form-data>
            @csrf
            @if(isset($_GET['id']))
                @method('patch')
            @else
                @method('post')
            @endif
            <div class="input-wrapper">
                <label for=title class=form-label>Title</label>
                <input name=title id=title class=form-input>
            </div>
            <div class="input-wrapper">
                <label for=desc class=form-label>Description</label>
                <textarea name=desc id=desc class=form-input></textarea>
            </div>
            <div class="input-wrapper">
                <label for=url class=form-label>URL</label>
                <input name=url id=url class=form-input type=url>
            </div>
            <div class="input-wrapper">
                <label for=category class=form-label>Category</label>
                <input name=category id=category class=form-input list=categories>
            </div>
            <datalist id=categories>
            @foreach (\App\Models\Portfolio::categories() as $category)
                <option value="{{$category}}">
                @endforeach
            </datalist>
            <div class="input-wrapper">
                <label for=img class=form-label>Image</label>
                <div style=display:flex;justify-content:space-between;align-items:center>
                    <span>No image selected</span> <!-- TODO overflow when name too long -->
                <label class=icon-box><ion-icon name="cloud-upload-outline" role=img aria-label="Upload new icon&hellip;"></ion-icon>
                  <input type=file name=img id=img style=position:absolute;top:-999px>
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
