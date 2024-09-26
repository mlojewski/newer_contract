@extends('layouts/app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/contact.css')}}">

    <!--=====================================
                  SINGLE BANNER PART START
        =======================================-->
    <section class="single-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <div class="single-content">
                        <h2>contact us</h2>
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
              SINGLE BANNER PART END
    =======================================-->

    <!--=====================================
                    CONTACT PART START
        =======================================-->
    <section class="contact-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-info">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Find us</h3>
                        <p><span> Chmielna 2 / 31, Warsaw 00-020, Poland</span></p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="contact-info">
                        <i class="fas fa-envelope"></i>
                        <h3>Send Mail</h3>
                        <p><span>info@newcontract.eu</span></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="contact-map">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2443.5550267233725!2d21.01627807719558!3d52.233301671987554!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x471eccf42adbf31d%3A0xdf7af493ea658fdc!2sChmielna%202%2C%2000-033%20Warszawa!5e0!3m2!1spl!2spl!4v1682424804304!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <form class="contact-form" action="{{route('message.store')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Name">
                                    <input type="hidden" name="contact" value="contact">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="email"  name="email" class="form-control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <input type="text" name="title" class="form-control" placeholder="Your Subject">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <textarea class="form-control" name="message_content" placeholder="Your Message"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-btn">
                                    <button class="btn btn-inline">
                                        <i class="fas fa-paper-plane"></i>
                                        <span>send message</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                CONTACT PART END
    =======================================-->

@endsection
