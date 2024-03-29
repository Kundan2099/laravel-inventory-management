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
                <form action="{{ route('handle.login') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <h1 class="h3 fw-semibold">Admin Login</h1>
                        <p class="small">Please fill the required fields</p>
                    </div>

                    @if (session('message'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="form-floating mb-3">
                        <input type="email" value="{{ old('email') }}" class="form-control" name="email"
                            placeholder="Enter Email Address" required>
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <span class="mt-1 small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                        <label for="floatingPassword">Password</label>
                        @error('password')
                            <span class="mt-1 small text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-check text-start my-3">
                        <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Remember me
                        </label>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary w-100 py-2" type="submit">Sign up</button>
                    </div>
                </form>
            </figure>

        </div>

    </section>
@endsection
