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
        @if(session('msgSuccess'))
          <div class="container">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
              <strong>{{session('msgSuccess')}}</strong> 
            </div> 
          </div>
        @endif
        @if(session('msgError'))
              <div class="container">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                  <strong>{{session('msgError')}}</strong> 
                </div> 
              </div>
          @endif
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
              <td><a href="{{ route('geteditAdmin', [$value->id]) }}">Edit</a></td>
              <td><a href="{{ route('getdeleteAdmin', [$value->id]) }}">Detele</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        <tfoot>
          <td>
            <tr>
              <a href="{{route('getaddAdmin')}}"><button class="btn btn-success" type="submit">ADD</button></a>
            </tr>
          </td>
        </tfoot>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection