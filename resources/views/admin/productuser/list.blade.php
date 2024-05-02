@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">List product member</h1>
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
          <tfoot>
              <tr>
                <a href="{{route('createProduct')}}"><button class="btn btn-success" type="submit">ADD Product</button></a>
              </tr>
          </tfoot>
          <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Description</th>
                <th scope="col">Category</th>
                <th scope="col">User</th>
                <th scope="col">Status</th>
                <th scope="col">Browse product</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($productUser as $key => $value)
            <tr>
                <th scope="row">{{$value->id}}</th>
                <td><img style="width:60px;height:60px;" src="{{asset('upload/product/'.$value->image)}}"></td>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->category->name}}</td>
                <td>{{$value->id_users}}</td>
                <?php
                if ($value->status == 0) {
                ?>
                <td style="color: rgb(28, 98, 159)"> Pending </td>
                <?php
                } elseif ($value->status == 1) {
                ?>
                <td style="color: rgb(12, 163, 14)">accepted</td>
                <?php
                } elseif($value->status == 2) {
                ?>
                <td style="color: rgb(190, 18, 18)">declined</td>
                <?php
                }
                ?>
                <td><a href="{{ route('updateMember', [$value->id]) }}">Browse</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

@endsection