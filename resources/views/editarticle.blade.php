@section('title', 'New Article')
@extends('layouts.app')

@section('content')

<h1 class="title">Create a new post</h1>

<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Article</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

<form method="post" action="{{ route('update', ['id' => $article->id]) }}" enctype="multipart/form-data">

    @csrf
    {{ method_field('PATCH') }}
    @include('partials.errors')

    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input type="text" name="title" value="{{ $article->title }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
        </div>
    </div>

    <div class="field">
        <label class="label">Content</label>
        <div class="control">
            <textarea name="content" class="textarea" placeholder="Content" minlength="5" maxlength="2000" required rows="10">{{ $article->content }}</textarea>
        </div>
    </div>


    <div class="field">
        <label class="label">Category</label>
        <div class="control">
            <div class="select">
                <select name="category_id" required>
                    <option value="" disabled selected>Select category</option>
                   <option selected value="{{$article->category_id}}">{{$article->category->category}}</option>
                  @foreach($categories as $cat)
                      @if($cat->id !== $article->category_id)
                          <option value="{{$cat->id}}">{{$cat->category}}</option>
                      @endif
                  @endforeach
                     
                </select>
             </div>
      </div>


    <div class="field">
    <label>Tags : </label>
        <?php
        $tag=explode(",", $article->tag);
        ?>
         <select class="form-control select2 select-tags" name="tag[]" id="tags" multiple>
        @foreach ($tag as $tags)
    
        <option value="{{$tags}}">{{$tags}}</option>
        @endforeach
        </select>
    </div>

    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined">Update</button>
        </div>
    </div>

</form>
@endsection
