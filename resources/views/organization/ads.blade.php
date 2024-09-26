@extends('layouts.user_panel')

@section('panel_content')
    <!--=====================================
                PROFILE PART START
    =======================================-->
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
                                <a href="#"><img src="{{Storage::url($user->Organization->logo->path)}}" alt="avatar"></a>
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
                                <li><a href="{{route('organization.edit', ['id' => $user->Organization->id])}}">Edit</a></li>
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
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Ads</h3>
                            <a href="{{route('ad.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Title</h4><p>Is the ad active</p><p>Actions</p></li>
                            @foreach($ads as $ad)
                                <li><h5><a href="/ad/{{$ad->id}}">{{$ad->title}}</a></h5><p>@if($ad->is_valid == 1) YES @else NO @endif </p>
                                    <p>
                                    <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </form>
                                    <form method="GET" action = "{{route('ad.edit', ['id' => $ad->id])}}">
                                        <button class="btn btn-warning" type="submit"> Edit</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->
@endsection()
