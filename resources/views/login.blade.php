@extends('master.master')

@section('content')
 <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-12">

        <form class="form-style" method="POST" action="/login">
        	{{ csrf_field() }}
          <h1 class="text-center">Login</h1>
          <div class="form-group">
            <label>Enter Your Email : </label>
            <input class="form-control" type="Email" required="required" name="email" placeholder="Email">
          </div>
          <label>Enter Your Password :</label>
          <div class="form-group">
            <input class="form-control" type="password" name="password" placeholder="Password" >
          </div>
          <div class="form-group">
            <input class="form-control btn btn-info" value="Login" type="submit" name="">
          </div>
          
        </form>

        </div>

      </div>
      <!-- /.row -->

    </div>
    <!-- /.container -->
@endsection