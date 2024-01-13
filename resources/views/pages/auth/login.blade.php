@extends('layouts.auth')

@section('auth-style')
    <style>
        .auth-form {
            width: 30%;
        }
        @media (max-width: 767px) {
            .auth-form {
                width: 90%;
            }
        }
    </style>
@endsection

@section('auth-section')
<section>

    <div class="container py-5 d-flex justify-content-center align-items-center" style="height: 100vh;">

        <figure class="m-auto auth-form">
            <form>
              <div class="text-center">
                <h1 class="h3 fw-semibold">Admin Login</h1>
                <p class="small">Please fill the required fields</p>
              </div>
          
              <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
              </div>
          
              <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Remember me
                </label>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
              </div>
              <div class="text-center">
                <a href="#">Forgot Password ?</a>
              </div>
            </form>
        </figure>

    </div>

</section>
@endsection