<!DOCTYPE html>
<!--
Template Name: Midone - HTML Admin Dashboard Template
Author: Left4code
Website: http://www.left4code.com/
Contact: muhammadrizki@left4code.com
Purchase: https://themeforest.net/user/left4code/portfolio
Renew Support: https://themeforest.net/user/left4code/portfolio
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
    <!-- BEGIN: Head -->
    <head>
        <meta charset="utf-8">
        <link href="dist/images/logo.svg" rel="shortcut icon">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Midone admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Midone admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="LEFT4CODE">
        <title>Login</title>
        <!-- BEGIN: CSS Assets-->
        <link rel="stylesheet" href="dist/css/app.css" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <!-- END: CSS Assets-->
        
    </head>
    <!-- END: Head -->
    
    <body class="login">
        {{-- @extends('layouts.app')

        @section('content') --}}
        <div class="container sm:px-10">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="block xl:grid grid-cols-2 gap-4">
                <!-- BEGIN: Login Info -->
                <div class="hidden xl:flex flex-col min-h-screen">
                    <a href="" class="-intro-x flex items-center pt-5">
                        <img alt="Midone Tailwind HTML Admin Template" class="w-6" src="dist/images/logo.svg">
                        <span class="text-white text-lg ml-3"> Lykoi</span>
                    </a>
                    <div class="my-auto">
                        <img alt="Midone Tailwind HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                        <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
                            SMK WIKRAMA 1 GARUT 
                            
                        </div>
                        <div class="-intro-x mt-5 text-lg text-white">Point Of Sales</div>
                    </div>
                </div>
                <!-- END: Login Info -->
                <!-- BEGIN: Login Form -->
                
                <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
                    <div class="my-auto mx-auto xl:ml-20 bg-white xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                        {{-- <div class="links" > --}}
                            @auth
                                <a  href="{{ url('/midoneadmin') }}">Home</a>
                            @else
                                {{-- <a href="{{ route('login') }}">Login</a> --}}
                                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                                    {{-- Sign In --}}{{ __('Sign In') }}
                                </h2>
                                <div class="intro-x mt-2 text-gray-500 xl:hidden text-center">A few more clicks to sign in to your account. Manage all your e-commerce accounts in one place</div>
                                <div class="intro-x mt-8">
                                    {{-- <input type="text" class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email"> --}}
                                    <input id="email" type="email"class="intro-x login__input input input--lg border border-gray-300 block" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    {{-- <input type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password"> --}}
                                    <input id="password" type="password" class="intro-x login__input input input--lg border border-gray-300 block mt-4" placeholder="Password" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                </div>
                                <div class="intro-x flex text-gray-700 text-xs sm:text-sm mt-4">
                                    <div class="flex items-center mr-auto">
                                        {{-- <input type="checkbox" class="input border mr-2" id="remember-me"> --}}
                                        {{-- <label class="cursor-pointer select-none" for="remember-me">Remember me</label> --}}
                                        <input class="input border mr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
        
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                    </div>
                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                </div>
                                <div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
                                    <button type="submit" class="button button--lg w-full xl:w-32 text-white bg-theme-1 xl:mr-3">{{ __('Login') }}</button>
                                    {{-- <button class="button button--lg w-full xl:w-32 text-gray-700 border border-gray-300 mt-3 xl:mt-0">Sign up</button> --}}
                                        
                                </div>
                                <div class="intro-x mt-10 xl:mt-24 text-gray-700 text-center xl:text-left">
                                    By signin up, you agree to our 
                                    <br>
                                    <a class="text-theme-1" href="">Terms and Conditions</a> & <a class="text-theme-1" href="">Privacy Policy</a> 
                                </div>
                            @endauth
                        {{-- </div> --}}
                        
                    </div>
                </div>
                <!-- END: Login Form -->
            </div>
        </form>
        </div>
        <!-- BEGIN: JS Assets-->
        <script src="dist/js/app.js"></script>
        <!-- END: JS Assets-->
        {{-- @endsection --}}
    </body>
</html>