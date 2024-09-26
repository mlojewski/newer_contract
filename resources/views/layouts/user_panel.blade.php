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

    @yield('panel_content')
@endsection()
