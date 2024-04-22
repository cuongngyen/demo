@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Product</h1>
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
              <th scope="col">Eidt</th>
              <th scope="col">Detele</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $key => $value)
            <tr>
              <th scope="row">{{$value->id}}</th>
              <td><img style="width:60px;height:60px;" src="{{asset('upload/product/'.$value->image)}}"></td>
              <td>{{$value->name}}</td>
              <td>{{$value->price}}</td>
              <td>{{$value->quantity}}</td>
              <td>{{$value->description}}</td>
              <td>{{$value->category->name}}</td>
              <td><a href="{{ route('editProduct', [$value->id]) }}">Edit</a></td>
              <td><a href="{{ route('deleteProduct', [$value->id]) }}">Detele</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection