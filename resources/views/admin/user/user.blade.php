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
        {{-- <form>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Check me out</label>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form> --}}
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">email</th>
              <th  scope="col">Edit</th>
              <th  scope="col">Detele</th>
            </tr>
          </thead>
          <tbody>
            @foreach($user as $key => $value)
            <tr>
              <th scope="row">{{$value->id}}</th>
              <td>{{$value->name}}</td>
              <td>{{$value->email}}</td>
              {{-- <td>{{$value->password}}</td> --}}
              <td><a href="{{url('admin/user/edit/'.$value->id)}}">Edit</a></td>
              <td><a href="{{url('admin/user/delete/'.$value->id)}}">Detele</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <tfoot>
          <td>
            <tr>
              <a href="{{url('admin/user/add')}}"><button class="btn btn-success" type="submit">ADD</button></a>
            </tr>
          </td>
            
        </tfoot>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection