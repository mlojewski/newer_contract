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
                        <h2>User Panel</h2>
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

                                <h4><a href="#">{{auth()->user()->organization->name}} </a></h4>
{{--                                <h5>{{auth()->user()->organization->sport->name}}</h5>--}}
                                <ul class="dash-meta">
                                    <li>
                                        <i class="fas fa-phone-alt"></i>
                                        <span>(123) 000-1234</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>{{auth()->user()->email}}</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>{{auth()->user()->organization->location}}, {{auth()->user()->organization->billing_address}}</span>
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
                            <p>This panel allows you to modify your data, read and send messages, view your blank CV and the job postings you applied for.  </p>
                            <button data-dismiss="alert"><i class="fas fa-times"></i></button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="dash-menu-list">
                            <ul>
                                <li><a href="/organization/panel/{{auth()->user()->id}}">Your data</a></li>
                                <li><a href="#">Your messages</a></li>
                                <li><a href="{{route('organization_panel.ad_panel')}}">Your ads</a></li>
                                <li><a href="#">Your invoices</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @yield('panel_content')
@endsection()
