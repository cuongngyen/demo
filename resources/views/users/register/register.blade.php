@extends('users.layouts.master')
@section('content')

<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-4 col-xl-6 order-2 order-lg-1">
                  @if(session('msgError'))
                    <div class="container">
                      <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        <strong style="color: red">{{session('msgError')}}</strong> 
                      </div> 
                    </div>
                  @endif
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form class="mx-1 mx-md-4" method="POST" action="{{ route('storeRegister') }}">
                    @csrf
                    
                    <div class="d-flex flex-row align-items-center mb-2">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="text" id="form3Example1c" class="form-control" name="name" value="{{old('name')}}"/>
                        <label class="form-label" for="form3Example1c">Your Name</label>
                      </div>
                    </div>
                    @error('name')
                      <span style="color: red;">{{$message}}</span>
                    @enderror


                    <div class="d-flex flex-row align-items-center mb-2">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="email" id="form3Example3c" class="form-control" name="email" value="{{old('email')}}"/>
                        <label class="form-label" for="form3Example3c">Your Email</label>
                      </div>
                    </div>
                    @error('email')
                      <span style="color: red;">{{$message}}</span>
                    @enderror


                    <div class="d-flex flex-row align-items-center mb-2">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4c" class="form-control" name="password" value="{{old('password')}}"/>
                        <label class="form-label" for="form3Example4c">Password</label>
                      </div>
                    </div>
                    @error('password')
                      <span style="color: red;">{{$message}}</span>
                    @enderror


                    <div class="d-flex flex-row align-items-center mb-2">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div data-mdb-input-init class="form-outline flex-fill mb-0">
                        <input type="password" id="form3Example4cd" class="form-control" name="password_confirm" value="{{old('password_confirm')}}"/>
                        <label class="form-label" for="form3Example4cd">Repeat your password</label>
                      </div>
                    </div>
                    @error('password_confirm')
                      <span style="color: red;">{{$message}}</span>
                    @enderror


                    <div class="form-check d-flex justify-content-center mb-3">
                      <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3c" />
                      <label class="form-check-label" for="form2Example3">
                        I agree all statements in <a href="#!">Terms of service</a>
                      </label>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-2">
                      <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg">Register</button>
                    </div>
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
