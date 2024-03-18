@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">User</h1>
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
          @if(session('thongbao_add'))
              <div class="container">
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{session('thongbao_add')}}</strong> 
                </div> 
              </div>
          @endif
        <form method="POST" action="{{ route('postaddAdmin') }}">
            @csrf
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" id="" value="{{old('name')}}" >
          </div>
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror

          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" name="email" value="{{old('email')}}">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
            @error('email')
                <span style="color: red;">{{$message}}</span>
            @enderror

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" value="{{old('password')}}" >
          </div>
            @error('password')
                <span style="color: red;">{{$message}}</span>
            @enderror

          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password Confirm</label>
            <input type="password" class="form-control" name="password_confirm" value="{{old('password_confirm')}}">
          </div>
            @error('password_confirm')
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