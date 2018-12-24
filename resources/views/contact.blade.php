@extends('master.master')
@section('content')
<!-- Page Content -->
<div class="container">

<div class="row">

  <!-- Post Content Column -->
  <div class="col-lg-12">

  <form class="form-style" method="POST" action="/contact/send_mail">
      {{ csrf_field() }}
    <h1 class="text-center">Contact Us</h1>
    <div class="form-group">
      <label>Enter Your Name : </label>
      <input class="form-control" type="text" required="required" name="name" placeholder="Enter Your Name">
    </div>
    <div class="form-group">
      <label>Enter Your Email : </label>
      <input class="form-control" type="email" required="required" name="email" placeholder="Email">
    </div>
    <div class="form-group">
      <label>Enter Your Email : </label>
      <textarea class="form-control"  required="required" name="body" placeholder="Enter Your Message ..."></textarea>
    </div>
    <div class="form-group">
      <button class="form-control btn btn-info" type="submit"><i class="fa fa-send"></i> Send</button>
    </div>
    
  </form>

  </div>

</div>
<!-- /.row -->

</div>
<!-- /.container -->
@endsection