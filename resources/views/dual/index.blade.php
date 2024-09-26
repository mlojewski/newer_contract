@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="css/custom/main.css">
    <link rel="stylesheet" href="css/custom/about.css">
    <!--=====================================
                    ABOUT PART START
        =======================================-->
    <section class="about-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-content">
                        <h2>{{$content->title}}</h2>
                        <p>{{$content->before_quote}}</p>
                    </div>
                    <div class="about-quote">

                        <h5>{{$content->quote}}</h5>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="row about-image">
                        <div class="col-6 col-lg-6">
                            <img src="images/about/01.jpg" alt="about">
                        </div>
                        <div class="col-6 col-lg-6">
                            <img src="images/about/02.jpg" alt="about">
                        </div>
                        <div class="col-6 col-lg-6">
                            <img src="images/about/03.jpg" alt="about">
                        </div>
                        <div class="col-6 col-lg-6">
                            <img src="images/about/04.jpg" alt="about">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                ABOUT PART END
    =======================================-->


    <!--=====================================
                BEST PART START
    =======================================-->
    <section class="best-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-content">

                        <p>{{$content->after_quote}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                BEST PART END
    =======================================-->
@endsection
