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
        
        <form method="POST" action="{{ route('posteditProduct', [$product->id]) }}" enctype="multipart/form-data">
            @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control" name="name" value="{{$product->name}}" >
        </div>
            @error('name')
                <span style="color: red;">{{$message}}</span>
            @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Image</label>
            
            <input type="file" class="form-control" name="image">
        </br>
            <img style="width:60px;height:60px;" src="{{url('upload/product/'.$product->image)}}">
        </div>
            @error('image')
              <span style="color: red;">{{$message}}</span>
            @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantily</label>
            <input type="number" class="form-control" name="quantily" value="{{$product->quantily}}"  >
        </div>
            @error('quantily')
              <span style="color: red;">{{$message}}</span>
            @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="number" class="form-control" name="price" value="{{$product->price}}" >
        </div>
            @error('price')
                <span style="color: red;">{{$message}}</span>
            @enderror

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Description Product</label>
            <textarea class="form-control" value="{{$product->description}}" name="description"  placeholder="Describe your product
                "></textarea>
        </div>
            @error('description')
                <span style="color: red;">{{$message}}</span>
            @enderror

        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Category Product</label>
                <select class="form-control form-control-line" name="id_category">
                    @foreach($category as $key => $value)
                    <?php
                        if ($product->id_category == $key) {
                    ?>
                        <option value="" selected>{{$value->name}}</option>
                    <?php
                        }else{
                    ?>
                        <option value="{{$key}}" >{{$value->name}}</option>
                    <?php
                        }
                    ?>
                        
                    
                        
                    @endforeach
                </select>
        </div>
            @error('category')
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
	