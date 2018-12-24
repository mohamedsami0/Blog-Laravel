@extends('master.master')
@section('content')
<!--Start Add Post-->
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="add-post-title">Add a New Post</h2>
                    
                    <form method="Post" action="/store-tag">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input class="form-control" type="text" placeholder="Add a New Tag" required="" name="tag">
                        </div>
                        <div class="form-group">
                        <button class="form-control btn btn-info"  type="submit"> <i class="fa fa-tag"></i> Add A New Tag</button>
                    </div>
                    </form>
                
                        
        <form action="/posts/store" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Add Title :</label>
                        <input class="form-control" type="text" name="title" required="required" placeholder="Title">
                    </div>
                    <div class="form-group">
                        <label>Add Body :</label>
                        <textarea class="form-control ckeditor" type="text" name="body" required="required" placeholder="Body"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Add Image :</label>
                        <input class="form-control" type="file" name="img">
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
                        <input class="form-control btn btn-info" value="Publish" type="submit" name="">
                    </div>
                    </form>
                    
        </div>
        </div>
        </div>
                <!--End Add Post-->
            
        @endsection

    @section('javascript')
        <script type="text/javascript">

        $(document).ready(function() {
            $('.post-tag').select2();
        });

        </script>
    @endsection