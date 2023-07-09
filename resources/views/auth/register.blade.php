@extends('layouts.auth')

@section('content')
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
                <h3 class="mb-3 text-center">Sign Up</h3>
              <form method="POST" action="{{ route('register') }}">
                        @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <!-- Name input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="name">Full Name</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="email">Email address</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <!-- Phone Number input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="phone_number">Phone Number</label>
                    <input id="phone_number" type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" required autocomplete="current-phone_number">
                    
                    @error('phone_number')
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

                <!-- Confirm Password input -->
                <div class="form-outline mb-4">
                    <label class="form-label" for="password-confirm">Password Confirmation</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Select Unit -->
                <div class="form-outline mb-4">
                    <label class="form-label @error('unit_id') is-invalid @enderror" for="unit_id">Select Unit</label>
                        <select name="unit_id" id="unit_id" class="form-control">
                            <option value="">Type or Select your unit</option>
                            @foreach($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                            @endforeach
                        </select>
                    @error('unit_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                {{-- <!-- Checkbox -->
                <div class="form-check d-flex justify-content-start mb-4">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33" />
                  <label class="form-check-label" for="form2Example33">
                    Remember Me
                  </label>
                </div> --}}

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Sign Up
                </button>
              </form>
              @if(Route::has('login'))
              <div class="text-center">
                    <a href="{{ route('login') }}" class="text-center">Have an Account?</a>
              </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
@endsection
