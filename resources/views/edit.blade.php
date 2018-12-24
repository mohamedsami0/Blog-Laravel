@extends('master.master')

@section('content')
<!-- Page Content -->
    <div class="container">
      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-12">
           <!--Start Add Post-->
            <form action="/posts/{{ $post->id }}/edit/updated" method="POST">
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <h2 class="add-post-title">Edit The Post</h2>
              <div class="form-group">
                <label>Add Title :</label>
                <input class="form-control" value="{{ $post->title }}" type="text" name="title" required="required" placeholder="Title">
              </div>
               <div class="form-group">
                <label>Add Body :</label>
                <textarea class="form-control ckeditor"  type="text" name="body"  required="required">{!! $post->body !!}</textarea>
              </div>
              <div class="form-group">
              <label>Choose Tags :</label>
                <select class="form-control post-tag" name="tags[]" multiple="multiple" >
                @foreach($tags as $tag)
                  <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                 @endforeach
                </select>
              </div>
              <div class="form-group">
                <input class="form-control btn btn-info" value="Update" type="submit">
              </div>
            </form>
           
          <!--End Add Post-->
        </div>
      </div>
    </div>

  @endsection

   @section('javascript')
        <script type="text/javascript">
          $(document).ready(function() {

              $('.post-tag').select2().val({!! json_encode($post->tags()->pluck('id'))!!}).trigger('change');
          });
    </script>
  @endsection