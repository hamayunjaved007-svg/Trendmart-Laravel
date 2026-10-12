@extends('layouts.head')
@section('title', 'Login')
@section('content')




    <style>
        /* --- Brand Color Variables --- */
        :root {
            --brand-orange: #FF6600;
            /* Extracted from logo/subscribe button */
            --brand-orange-hover: #e65c00;
            --brand-dark: #333333;
            --brand-grey: #666666;
        }

        /* --- Card Styling --- */
        .card {
            border: none;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            /* Soft shadow like footer */
            border-radius: 8px;
            margin-top: 2rem;
        }

        .card-header {
            background-color: var(--brand-dark);
            /* Dark grey header to match footer text */
            color: #ffffff;
            font-weight: 600;
            font-size: 1.1rem;
            border-bottom: 3px solid var(--brand-orange);
            /* Orange accent line */
            border-radius: 8px 8px 0 0 !important;
            padding: 15px 20px;
        }

        /* --- Form Labels --- */
        .col-form-label {
            color: var(--brand-dark);
            font-weight: 500;
        }

        /* --- Input Fields --- */
        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 10px 15px;
            transition: all 0.3s ease;
        }

        /* Input Focus State (Orange Glow) */
        .form-control:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.25);
        }

        /* --- Checkbox --- */
        .form-check-input:checked {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
        }

        .form-check-input:focus {
            border-color: var(--brand-orange);
            box-shadow: 0 0 0 0.25rem rgba(255, 102, 0, 0.25);
        }

        /* --- Buttons --- */
        .btn-primary {
            background-color: var(--brand-orange);
            border-color: var(--brand-orange);
            font-weight: 600;
            padding: 8px 25px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover,
        .btn-primary:focus,
        .btn-primary:active {
            background-color: var(--brand-orange-hover) !important;
            border-color: var(--brand-orange-hover) !important;
        }

        /* --- Links (Forgot Password) --- */
        .btn-link {
            color: var(--brand-orange);
            text-decoration: none;
            font-weight: 500;
        }

        .btn-link:hover {
            color: var(--brand-orange-hover);
            text-decoration: underline;
        }

        .signup-link {
            color: var(--brand-orange);
            text-decoration: none;
            font-weight: 500;
        }

        .signup-link:hover {
            color: var(--brand-orange-hover);
            text-decoration: underline;
        }
    </style>

    <br><br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div><br><br>
        <!-- Sign Up Section (Form ke bilkul neeche) -->
        <div class="signup-section text-center">
            Don't have an account?
            <a href="{{ route('register') }}" class="signup-link">
                Sign Up
            </a>
        </div>
    </div><br><br>
@endsection