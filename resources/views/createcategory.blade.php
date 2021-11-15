@extends('layouts.app')

@section('content')

<h1 class="title">Create a new category</h1>

<form method="post" action="{{ url('insert')}}" enctype="multipart/form-data">

    @csrf
    @include('partials.errors')
    
    <div class="field">
        <label class="label">Name</label>
        <div class="control">
            <input type="text" name="category" value="" class="input" placeholder="Title" minlength="5" maxlength="100" required />
        </div>
    </div>

     <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined">Save</button>
        </div>
    </div>

</form>

@endsection
