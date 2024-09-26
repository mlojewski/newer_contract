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
                        <h2>Dual content edit</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->

    <!--=====================================
                        ADPOST PART START
            =======================================-->
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form class="adpost-form" id="blogForm" action="{{route('dual.update')}}" method="post">
                        @csrf
                        @method('put')
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Dual</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Title</label>
                                        <input type="text" class="form-control" value="{{$content->title}}" name="title">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Quote</label>
                                        <input type="text" class="form-control" name="quote" value="{{$content->quote}}">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">before quote</label>
                                        <input type="text" class="form-control" value="{{$content->before_quote}}" name="before_quote">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">After quote</label>
                                        <input type="text" class="form-control" name="after_quote" value="{{$content->after_quote}}">
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group text-right">
                            <button class="btn btn-inline">
                                <i class="fas fa-check-circle"></i>
                                <span>Publish</span>
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    <!--=====================================
                ADPOST PART END
    =======================================-->

@endsection
