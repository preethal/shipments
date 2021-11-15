@extends('layouts.app')

@section('content')

<h1 class="title">Create a new Tag</h1>

<form method="post" action="{{ url('storetag')}}" enctype="multipart/form-data">

    @csrf
    @include('partials.errors')
    
    <div class="field">
        <label class="label"> Tag Name</label>
        <div class="control">
            <input type="text" name="name" value="" class="input" placeholder="Tag" minlength="5" maxlength="100" required />
        </div>
    </div>
   
    <div class="field">
        <div class="control">
            <button type="submit" class="button is-link is-outlined">Save</button>
        </div>
    </div>

</form>

@endsection
