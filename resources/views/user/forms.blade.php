{{--@extends('layouts.app')--}}

{{--@section('content')--}}
    <link rel="stylesheet" href="{{asset('css/custom/user-form.css')}}">

     <section class="user-form-part">
    <div class="user-form-banner">
        <div class="user-form-content">
            <a href="#"><img src="images/logo.png" alt="logo"></a>
            <h1>Advertise your assets <span>Buy what are you needs.</span></h1>
            <p>Biggest Online Advertising Marketplace in the World.</p>
        </div>
    </div>

    <div class="user-form-category">
        <div class="user-form-header">
            <a href="#"><img src="images/logo.png" alt="logo"></a>
            <a href="index.html"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="user-form-category-btn">
            <ul class="nav nav-tabs">
                <li><a href="#login-tab" class="nav-link active" data-toggle="tab">sign in</a></li>
                <li><a href="#register-tab" class="nav-link" data-toggle="tab">sign up</a></li>
            </ul>
        </div>

        <div class="tab-pane active" id="login-tab">
            <div class="user-form-title">
                <h2>Welcome!</h2>
                <p>Use credentials to access your account.</p>
            </div>
            <x-guest-layout>
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div>
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="current-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif

                        <x-primary-button class="ml-3">
                            {{ __('Log in') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>

            <div class="user-form-direction">
                <p>Don't have an account? click on the <span>( sign up )</span> button above.</p>
            </div>
        </div>

        <div class="tab-pane" id="register-tab">
            <div class="user-form-title">
                <h2>Register</h2>
                <p>Setup a new account in a minute.</p>
            </div>

{{--            <ul class="user-form-option">--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="fab fa-facebook-f"></i>--}}
{{--                        <span>facebook</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="fab fa-twitter"></i>--}}
{{--                        <span>twitter</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <a href="#">--}}
{{--                        <i class="fab fa-google"></i>--}}
{{--                        <span>google</span>--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--            <div class="user-form-devider">--}}
{{--                <p>or</p>--}}
{{--            </div>--}}
{{--            <form method="POST" action="{{ route('register') }}">--}}
{{--                @csrf--}}

{{--                <!-- Name -->--}}
{{--                <div class="row">--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                    <x-input-label for="name" :value="__('Name')" />--}}
{{--                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />--}}
{{--                    <x-input-error :messages="$errors->get('name')" class="mt-2" />--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                    <x-input-label for="email" :value="__('Email')" />--}}
{{--                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />--}}
{{--                    <x-input-error :messages="$errors->get('email')" class="mt-2" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                    <x-input-label for="password" :value="__('Password')" />--}}

{{--                    <x-text-input id="password" class="block mt-1 w-full"--}}
{{--                                  type="password"--}}
{{--                                  name="password"--}}
{{--                                  required autocomplete="new-password" />--}}

{{--                    <x-input-error :messages="$errors->get('password')" class="mt-2" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />--}}

{{--                    <x-text-input id="password_confirmation" class="block mt-1 w-full"--}}
{{--                                  type="password"--}}
{{--                                  name="password_confirmation" required autocomplete="new-password" />--}}

{{--                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-12">--}}
{{--                        <div class="form-group">--}}
{{--                    <select name="user_type" id="user_type">--}}
{{--                        <option value="organization">Organization</option>--}}
{{--                        <option value="Person">Person</option>--}}
{{--                    </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <div class="flex items-center justify-end mt-4">--}}
{{--                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">--}}
{{--                        {{ __('Already registered?') }}--}}
{{--                    </a>--}}

{{--                    <x-primary-button class="ml-4">--}}
{{--                        {{ __('Register') }}--}}
{{--                    </x-primary-button>--}}
{{--                </div>--}}
{{--            </form>--}}
            <x-guest-layout>
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <select name="user_type" id="user_type">
                            <option value="organization">Organization</option>
                            <option value="Person">Person</option>
                        </select>

                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </x-guest-layout>

            <div class="user-form-direction">
                <p>Already have an account? click on the <span>( sign in )</span> button above.</p>
            </div>
        </div>
    </div>
    </section>
{{--@endsection--}}
