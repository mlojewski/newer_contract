@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/profile.css')}}">

    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner dashboard-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="single-content">
                        <h2>Admin Panel</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
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
                                <a href="#"><img src="images/avatar/01.jpg" alt="avatar"></a>
                            </div>
                            <div class="dash-intro">
                                <h4><a href="#">gackon Honson</a></h4>
                                <h5>new seller</h5>
                                <ul class="dash-meta">
                                    <li>
                                        <i class="fas fa-phone-alt"></i>
                                        <span>(123) 000-1234</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>gackon@gmail.com</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Los Angeles, West America</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="dash-header-right">
                            <div class="dash-focus dash-list">
                                <h2>2433</h2>
                                <p>listing ads</p>
                            </div>
                            <div class="dash-focus dash-book">
                                <h2>2433</h2>
                                <p>total follower</p>
                            </div>
                            <div class="dash-focus dash-rev">
                                <h2>2433</h2>
                                <p>total review</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dash-header-alert alert fade show">
                            <p>From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and Edit your password and account details.</p>
                            <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dash-menu-list">
                            <ul>
                                <li><a href="{{route('panel')}}">Dashboard</a></li>
                                <li><a href="{{route('blog_panel')}}">Blog</a></li>
                                <li><a href="{{route('country_panel')}}">Countries</a></li>
                                <li><a href="{{route('city_panel')}}">Cities</a></li>
                                <li><a href="{{route('organization_panel')}}">Organizations</a></li>
                                <li><a href="{{route('player_panel')}}">People</a></li>
                                <li><a href="{{route('sport_panel')}}">Sports</a></li>
                                <li><a href="{{route('ad_panel')}}">Ads</a></li>
                                <li><a href="{{route('content_panel')}}">Pages</a></li>
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

@yield('panel_content')
@endsection()
