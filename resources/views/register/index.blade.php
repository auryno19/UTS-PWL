@extends('layout.login')

@section('content')

<section class="vh-100" >
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="img/login.jpg"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form action="/register" method="post">
                    @csrf
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <span class="h1 fw-bold mb-0">
                        <img src="img/logo.png" height="50" alt="logo"></span>
                    </div>
  
                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Register your account</h5>
                    
                    <div class="form-floating mb-2">
                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="name" value="{{ old('name') }}"/>
                        <label for="name" >Name</label>
                        @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
                    
                      <div class="form-floating mb-2">
                        <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username" value="{{ old('username') }}"/>
                        <label for="username" >Username</label>
                        @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="form-floating mb-2">
                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="email Address" value="{{ old('email') }}"/>
                        <label for="email" >Email Address</label>
                        @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>

                      <div class="form-floating mb-2">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="password"/>
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                      </div>
  
                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="submit">Register</button>
                    </div>
                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
@endsection