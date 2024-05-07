@extends('admin.layout.master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Edit product member</h1>
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
        
        <form method="POST" action="{{ route('updateMember', [$productUser->id]) }}">
        @csrf
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Status product</label>
                <select class="form-control form-control-line" name="status">
                    <option value="0">pending</option>
                    <option value="1">accepted</option>
                    <option value="2">declined</option>
                </select>
        </div>
              <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
	