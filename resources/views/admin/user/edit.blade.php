@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        
        <form method="POST" action="{{ route('posteditUser', [$user->id]) }}">
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{$user->name}}" >
          </div>
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{$user->email}}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
            @error('email')
              <span style="color: red;">{{$message}}</span>
            @enderror

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password"  >
          </div>
            @error('password')
              <span style="color: red;">{{$message}}</span>
            @enderror
        </br>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
	