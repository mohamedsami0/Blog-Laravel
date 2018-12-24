@extends('master.master')

@section('content')

@if(isset($details))
<!-- Page Content -->
    <div class="container">
      <div class="row">
      <div class="col-md-8">
      <h2 class="tag-post">All Posts Of {{ $query }} Tag</h2>
          <!-- Blog Post -->
          
          @foreach($details as $post)
          <div class="card mb-4 post-view">
            @if($post->img)
            <img class="card-img-top img-responsive" src="/img/{{ $post->img }}" alt="Card image cap">
            @endif
            <div class="card-body">
              <h2 class="card-title">{{ $post->title }}</h2>
              <p class="card-text">{!!str_limit(strip_tags($post->body), 100, '(...)')!!}</p>
              <a href="/posts/{{ $post->id }}" class="btn btn-info">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
            <sapn class="badge badge-secondary text-white">
              Posted on <i class="fa fa-calendar"></i> {{ $post->created_at->toDayDateTimeString() }} by
              </sapn>
              <span class="badge badge-success">
              <i class="fa fa-user"></i>
              <a class="text-capitalize" href="/profile"> {{ $post->user->name }} </a> 
              </span>
              @foreach($post->tags as $tag)
              <span class="tags badge badge-danger">
              <i class="fa fa-tag"></i>
              <a class="text-capitalize" href="#">{{ $tag->tag }} </a>
              </span>
            @endforeach

            </div>
          </div>
          @endforeach
          <!-- Pagination -->
         

        </div>

       <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

          <!-- Search Widget -->
          <form method="Post" action="/search" role="search">
            {{ csrf_field() }}
          <div class="card my-4">
            <h5 class="card-header">Search</h5>
            <div class="card-body">
              <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-secondary" type="submit">Go!</button>
                </span>
              </div>
            </div>
          </div>
          </form>

          <!-- Categories Widget -->
          <div class="card my-4">
            <h5 class="card-header"><i class="fa fa-tags"></i> Tags</h5>
            <div class="card-body">
              <div class="row">
                <div class="col-lg-6">
                  <ul class="list-unstyled mb-0">
                  @foreach($tags as $tag)
                    <li class="badge badge-info">
                      <a class="text-white" href="{{ route('tags.show', $tag->id) }}"> <i class="fa fa-tag"></i> {{ $tag->tag }}</a>
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
      <!-- /.row -->

    </div>

    @endif

    <!-- /.container -->
    @endsection
