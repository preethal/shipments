

@section('content')
 <div class="table table-bordered table-responsive-lg">
      <ul class="my-2 my-md-0 mr-md-3">
        <form class="text-sm text-gray-700 dark:text-gray-500 underline" action="{{ url('listarticles')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
  <button type="submit"> Visit Homepage </button>
</form>
      <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="{{ url('showarticles') }}">Articles</a>
      <a class="text-sm text-gray-700 dark:text-gray-500 underline" href="#">About us</a>
     </ul>
  </div>
@foreach ($articles as $article)
<div class="col-md-4 grid-margin stretch-card">
<div class="">
  <div class="card-body">
  <h4 class="card-title">{{$article->title}}</h4>
  <b>Category:{{ $article->category->category }}</b>
    <div class="media">
     <img src="{{ url('images/articles.jpg') }}">
      </div>
     <?php
        $tag=explode(",", $article->tag)
      ?>                                      
       @foreach ($tag as $tags)
          <a href="#" class="btn btn-primary">{{$tags}}</a>
        @endforeach
      <div class="media-body">
        <p class="card-text">{{$article->content}}</p>
      </div>
     </div>
</div>
</div>
@endforeach

