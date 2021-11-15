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
 <table class="table table-bordered table-responsive-lg">
<tr>
<td>
<a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ url('home') }}">Homepage</a>
</td>
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

<form action="{{ url('create')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
  <button type="submit"> Create Category </button>
</form>
<table class="table table-bordered table-responsive-lg" border = "1">
<tr>
<th>Categories</th>
<th>Actions</th>
</tr>
@foreach ($categories as $key=>$value)
<tr>
<td>{{ $value->category }}</td>
<td>
<form action="" method="POST">
<a class="btn btn-primary" href="">Edit</a>
@csrf
@method('delete')      
<button type="submit" class="btn btn-danger">Delete</button>   
</form>  
</td>
</tr>
@endforeach
</table>
@endsection