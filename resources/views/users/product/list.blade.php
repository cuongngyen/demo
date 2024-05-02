@extends('users.layouts.master')
@section('content')
<div class="content-wrapper">
    
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
                <a href="{{ route('createsProduct') }}"><button class="btn btn-success" id="{{Auth::user()->id}}" type="submit">ADD Product</button></a>
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
              <th scope="col">Status</th>
              <th scope="col">Eidt</th>
              <th scope="col">Detele</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($product as $key => $value)
            <?php
              if ($value->status == 1) {
            ?>
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td><img style="width:60px;height:60px;" src="{{asset('upload/product/'.$value->image)}}"></td>
                <td>{{$value->name}}</td>
                <td>{{$value->price}}</td>
                <td>{{$value->quantity}}</td>
                <td>{{$value->description}}</td>
                <td>{{$value->category->name}}</td>
                <td style="color: rgb(12, 163, 14)">Product Accepted</td>
                <td><a href="{{ route('eidtsProduct', [$value->id]) }}">Edit</a></td>
                <td><a href="{{ route('deletesProduct', [$value->id]) }}">Detele</a></td>
              </tr>
            <?php
              }elseif ($value->status == 0) {
            ?>
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td></td>
                <td>{{$value->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="color: rgb(28, 98, 159)">Product Pending</td>
                <td><a href="{{ route('eidtsProduct', [$value->id]) }}">Edit</a></td>
                <td><a href="{{ route('deletesProduct', [$value->id]) }}">Detele</a></td>
              </tr>
            <?php
              }elseif ($value->status == 2) {
            ?>
              <tr>
                <th scope="row">{{$value->id}}</th>
                <td></td>
                <td>{{$value->name}}</td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th style="color: rgb(190, 18, 18)" scope="row">Product declined</th>
                <td><a href="{{ route('eidtsProduct', [$value->id]) }}">Edit</a></td>
                <td><a href="{{ route('deletesProduct', [$value->id]) }}">Detele</a></td>
              </tr>
            <?php
              }
            ?>
            
            @endforeach
          </tbody>
        </table>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
