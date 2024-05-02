@extends('users.layouts.master')
@section('content')

<form method="POST" action="{{ route('storeAccount') }}" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <?php 
                            if (Auth::user()->avatar) {
                            ?>
                            <img style="width:280px;height:300px;"src="{{asset('upload/user/'.Auth::user()->avatar)}}" alt="Maxwell Admin">
                            <?php
                            }else{
                            ?>
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                            <?php
                            }
                            ?>
                        </div>
                        <h5 class="user-name">{{Auth::user()->name}}</h5>
                        <h6 class="user-email">{{Auth::user()->email}}</h6>
                        <h6 class="user-phone">+84: {{Auth::user()->phone}}</h6>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="fullName">Full Name</label>
                            <input type="text" class="form-control" placeholder="Enter full name" value="{{Auth::user()->name}}" name="name">
                        </div>
                        @error('name')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="eMail">Email</label>
                            <input type="email" class="form-control" placeholder="Enter email ID" value="{{Auth::user()->email}}" name="email">
                        </div>
                        @error('email')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control"  placeholder="Enter password ID" value="" name="password">
                        </div>
                        @error('password')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>
                    

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="phone">Phone +84:</label>
                            <input type="number" class="form-control" placeholder="Enter phone number" value="{{Auth::user()->phone}}" name="phone">
                        </div>
                        @error('phone')
                            <span style="color: red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <div class="form-group">
                            <label for="image">Avatar</label>
                            <input type="file" class="form-control"   name="avatar">
                        </div>
                    </div>
                    
                </div>
                <div class="row gutters">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="text-right">
                            <button type="submit"class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
</form>

@endsection
