@extends('layouts.auth')

@section('content')
<!-- Section: Design Block -->
<section class="row justify-content-center align-items-center" style="height: 100vh;">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start">
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-5 display-3 fw-bold ls-tight">
            DOMAINKU <br />
            <span class="text-primary">The Best Domain Management System</span>
          </h1>
          {{-- <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p> --}}
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
                <h3 class="mb-3 text-center">Login</h3>
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password">Password</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" />
                  <label class="form-check-label" for="form2Example33">
                    Remember Me
                  </label>
                </div>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign in
                </button>
              </form>
              @if(Route::has('register'))
              <div class="text-center">
                    <a href="{{ route('register') }}" class="text-center">Don't Have an Account?</a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
@endsection
