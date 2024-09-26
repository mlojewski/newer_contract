@extends('layouts.app')

@section('content')


    <link rel="stylesheet" href="{{asset('css/custom/ad-post.css')}}">
    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>Blog edit</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">{{$gender->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->

<form method="POST" action="{{ route('gender.update', ['id' => $gender->id]) }}">
    @csrf
    @method('put')

    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <x-text-input id="name" value="{{$gender->name}}" class="block mt-1 w-full" type="text" name="name" />

    </div>

    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
@endsection
