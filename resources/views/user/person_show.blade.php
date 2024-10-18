@extends('layouts.app')

@section('content')
    <section class="single-banner">
{{--        @if(session()->has('pop_up'))--}}
{{--            <div class="alert alert-primary alert-dismissible fade show" role="alert">--}}
{{--                {{session()->get('pop_up')}}--}}
{{--                <button type="button" class="close" data-dismiss="alert" aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        @endif--}}
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="single-content">
                        <h2>{{$user->person->name}} {{$user->person->last_name}}</h2>
                        {{--                        <ol class="breadcrumb">--}}
                        {{--                            <li class="breadcrumb-item"><a href="index.html">Contact</a></li>--}}
                        {{--                            <li class="breadcrumb-item active" aria-current="page">contact</li>--}}
                        {{--                        </ol>--}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
            DASHBOARD HEADER PART START
    =======================================-->
    <section class="dash-header-part">
        <div class="container">
            <div class="dash-header-card">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="dash-header-left">
                            <div class="dash-avatar">

                                <a href="#"><img src="{{Storage::url($user->person->photo->path)}}" alt="avatar"></a>
                            </div>
                            <div class="dash-intro">
                                <h4>{{$user->person->name}} {{$user->person->last_name}}</h4>
                                <h5> {{$user->person->birth_date}}</h5>
                                <ul class="dash-meta">
{{--                                    <li>--}}
{{--                                        <i class="fab fa-instagram"></i>--}}
{{--                                        <span>{{$user->email}}</span>--}}
{{--                                    </li>--}}
                                    @if($user->person->fb_url)
                                        <li>
                                            <i class="fab fa-facebook"></i>
                                            <span>{{$user->person->fb_url}}</span>
                                        </li>
                                    @endif
                                    @if($user->person->ig_url)
                                        <i class="fab fa-instagram"></i>
                                        <span>{{$user->person->ig_url}}</span>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="dash-header-right">
                            <div class="dash-focus dash-list">
                                <h2>{{$user->person->PersonType->name}}</h2>
                                <p>Person type</p>
                            </div>
                            <div class="dash-focus dash-book">
                                <h2>{{$user->person->gender->name}}</h2>
                                <p>Gender</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
            DASHBOARD HEADER PART END
    =======================================-->

    <!--=====================================
               PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Nationality</h3>
                        </div>
                        {{$user->person->country->name}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Languages</h3>
                        </div>
                        @foreach($user->person->languages as $language) {{$language->name}} @endforeach
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Sport</h3>
                        </div>
                        {{$user->person->sport->name}}, @if(!is_null($user->person->sport_additional)) {{$user->person->sport_additional}} @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Current Residence</h3>
                        </div>
                        {{$user->person->residence}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Career</h3>
                        </div>
                        {{$user->person->career}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Achievements</h3>
                        </div>
                        {{$user->person->achievements}}
                    </div>
                </div>
            </div>
            @if($user->person->video_url)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-card">
                            <div class="account-title">
                                <h3>Highlight video</h3>
                            </div>
                            {{$user->person->video_url}}
                        </div>
                    </div>
                </div>
            @endif
        </div>

    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->

@endsection
