@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
<form action="{{ url('listarticles')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
  <button type="submit"> Visit Homepage </button>
</form>
</div>
<table class="table table-bordered table-responsive-lg">
<tr>
<td>
<form action="{{ url('add')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
<button type="submit"> Create Article </button>
</form>  
</td>

<td>
<form action="{{ url('index')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
<button type="submit"> Manage Category </button>
</form>
</td>


<td>
<form action="{{ url('tagindex')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
<button type="submit"> Manage Tag </button>
</form>
</td>
</tr>
</table>
<table class="table table-bordered table-responsive-lg">
<tr>
<td>Title</td>
<td>Content</td>
<td>Category</td>
<td>Tags</td>
<td>Actions</td>
</tr>
@foreach ($articles as $article)
<tr>
<td>{{ $article->title }}</td>
<td>{{ $article->content }}</td>
<td>{{ $article->category->category }}</td>
<?php
$tag=explode(",", $article->tag)
?>
<td>
@foreach ($tag as $tags)
@if(!empty($tags))
<a href="#" class="btn btn-primary">{{$tags}}</a>
@endif
@endforeach
</td>
<td>
<form action="{{ route('destroy',$article->id) }}" method="POST">                
<a class="btn btn-primary" href="{{ route('edit',$article->id) }}">Edit</a>
@csrf
@method('delete')
<button type="submit" class="btn btn-danger">Delete</button>  
</form>  
</td>
</tr>
@endforeach
</table>

{!! $articles->links() !!}
@endsection

