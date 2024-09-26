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
                            <li class="breadcrumb-item">{{$sport->name}}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->

<form method="POST" action="{{ route('sport.update', ['id' => $sport->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('put')
    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <x-text-input id="name" value="{{$sport->name}}" class="block mt-1 w-full" type="text" name="name" />
        <img style="max-height: 40px" src="{{Storage::url($sport->SportLogo->path)}}">
        <x-input-label for="sport_logo" value="sport_logo" />
        <x-text-input id="sport_logo" class="block mt-1 w-full" type="file" name="sport_logo" />

    </div>


    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
@endsection
