@extends('master.master')
@section('content')
<!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

          <!-- Title -->
          <h1 class="mt-4">{{ $post->title }}</h1>

          <!-- Author -->
          <p class="lead">
            by
            <span class="badge badge bg-info ">
            <a href="#" class=" text-white"> {{ $post->user->name }} </a>
        </span>
          </p>
           <!-- Date/Time -->
           <span class=" badge badge-secondary date-single">
          Posted on <i class="fa fa-calendar"></i> {{ $post->created_at->toDayDateTimeString() }}
          </span>
          <br>
          Tags :
             @foreach($post->tags as $tag)
              <span class="tags badge badge-info">
              <i class="fa fa-tag"></i>
              <a class="text-capitalize text-white" href=" {{ route('tags.show', $tag->id) }} "> {{ $tag->tag }} </a>
              </span>
            @endforeach

          <hr>
          @if(!Auth::guest() && (Auth::user()->id == $post->user_id)) 
          <a class="btn btn-success" href="/posts/{{ $post->id}}/edit"><i class="fa fa-edit"></i> Edit</a>
          <form class="pull-right" action="/posts/{{ $post->id }}/delete" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
          </form>
          <hr>
          @endif
          

          <!-- Preview Image -->
          @if($post->img)
          <img class="img-fluid img-responsive" src="/img/{{ $post->img }}" alt="post-img">
            @endif
          <hr>

          <!-- Post Content -->
          <p class="lead">{!! $post->body !!}</p>
          <hr>
          @guest
         <div class="alert alert-info">
           <i class="fa fa-info "> </i> You Have To Login To Leave a Comment
         </div>
          @else
           <!-- Comments Form -->
           <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
              <form action="/posts/{{ $post->id }}/storeComment" method="POST" >
              {{ csrf_field() }}
                <div class="form-group">
                  <textarea name="body" class="form-control" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-info">Submit</button>
              </form>
            </div>
          </div>
          @endguest

          <!-- Single Comment -->
          @if ($post->comments->count() < 2)
          <h3 class="comment-count"> {{ $post->comments->count() }}  comment</h3>
          @endif
          @if ($post->comments->count() > 1)
          <h3 class="comment-count"> {{ $post->comments->count() }}  comments</h3>
          @endif
          @foreach($post->comments as $comment)
          <div class="media mb-4">
            
            <div class="media-body">
              <h5 class="mt-0"><span class="badge badge-info"><i class="fa fa-user"></i> {{ $comment->user->name }}</span> <span class="badge badge-secondary"><i class="fa fa-calendar"> </i> {{ $comment->created_at->toDayDateTimeString() }}</span></h5>
              
              <p> <span> {{ $comment->body }} </span> </p>
            </div>
          </div>
          @endforeach
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
          @if(Auth::check())
         @if(Auth::user()->hasRole('admin'))
          <!-- Side Widget -->
          <div class="card my-4">
            <h5 class="card-header"><i class="fa fa-bar-chart"></i> Statistics</h5>
            <div class="card-body">
             <p>All Users : <strong>{{ $users_statistics }}</strong></p>
             <p>All Posts : <strong>{{ $posts_statistics }}</strong> </p>
             <p>All Comments : <strong>{{ $comments_statistics }}</strong> </p>
            </div>
          </div>
          @endif
          @endif

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
    @endsection