@extends('layouts.user_panel')
@section('panel_content')
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
                                <a href="#"><img src="{{Storage::url($user->organization->logo->path)}}" alt="avatar"></a>
                            </div>
                            <div class="dash-intro">
                                <h4>{{$user->name}} </h4>
                                <h5></h5>
                                <ul class="dash-meta">
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>{{$user->email}}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="dash-header-right">
                            <div class="dash-focus dash-list">
                                <h2>{{$user->organization->OrganizationType->name}}</h2>
                                <p>Type</p>
                            </div>
                            <div class="dash-focus dash-book">
                                <h2>{{$user->organization->location}}</h2>
                                <p>Location</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="dash-menu-list">
                            <ul>
                                <li><a href="{{route('profile')}}">Your profile</a></li>
                                <li><a href="{{route('organization.edit', ['id' => $user->organization->id])}}">Edit</a></li>
                                <li><a href="{{route('organization.ads', ['id' =>$user->id])}}">Your Ads</a></li>
                                <li><a href="/logout">logout</a></li>
                            </ul>
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
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Languages</h3>
                        </div>
                        @foreach($user->organization->languages as $language)
                            {{$language->name}}
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Company description</h3>
                        </div>
                        {{$user->organization->description}}
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Social Media</h3>
                        </div>
                        @if($user->organization->fb_url)
                                <i class="fas fa-envelope"> Facebook </i>
                                <span>{{$user->organization->fb_url}}</span> <br>

                        @endif
                        @if($user->organization->ig_url)
                                <i class="fas fa-map-marker-alt">Instagram </i>
                                <span>{{$user->organization->ig_url}}</span><br>
                        @endif
                        @if($user->organization->li_url)

                                <i class="fas fa-map-marker-alt">LinkedIn</i>
                                <span>{{$user->organization->li_url}}</span> <br>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->

@endsection
