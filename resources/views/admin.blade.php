@extends('master.master')
@section('content')
 <!-- Page Content -->
 <div class="container">

<div class="row">

  <!-- Post Content Column -->
  
  <div class="col-lg-12">
    <div class="dashbord-admin">
    <h1 class="user-role">User Roles</h1>

            <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">User</th>
          <th scope="col">Author</th>
          <th scope="col">Admin</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <form method="Post" action="add-Role">
          {{ csrf_field() }}

          <input type="hidden" value="{{ $user->email }}" name="email">
        <tr>
          <th scope="row"> {{ $user->id }} </th>
          <td> {{ $user->name }} </td>
          <td>{{   $user->email }}</td>
          <td>
            <input type="checkbox" onChange="this.form.submit()" name="role-user" {{ $user->hasRole('user') ? 'checked' : ' ' }}>
          </td>
          <td>
            <input type="checkbox" onChange="this.form.submit()" name="role-author" {{ $user->hasRole('author') ? 'checked' : ' ' }}>
          </td>
          <td>
            <input type="checkbox" onChange="this.form.submit()" name="role-admin" {{ $user->hasRole('admin') ? 'checked' : ' ' }}>
          </td>
        </tr>
        </form>
        @endforeach
      </tbody>
    </table>
    </form>
</div>
  </div>
</div>
<!-- /.row -->

</div>
<!-- /.container -->

@endsection