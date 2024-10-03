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
                        <h2>ad post</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Ad Create</a></li>
                        </ol>
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
                <div class="col-lg-8">
                    <form class="adpost-form" id="adForm" action="{{route('ad.store')}}" method="POST">
                        @csrf
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Post your ad</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Ad Title</label>
                                        <input name="title" type="text" class="form-control" placeholder="Type your ad title here">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Content</label>
                                        <textarea name="ad_content" class="form-control" placeholder="General description"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Requirements</label>
                                        <textarea name="requirements" class="form-control" placeholder="Job requirements - experience, level of play etc"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Salary</label>
                                        <input type="number" class="form-control" name="salary" placeholder="Enter your offer">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" >Salary rate</label><br>
                                        <input type="radio" id="Hourly" name="salary_per" value="Hourly" required>
                                        <label for="Hourly">Hourly</label><br>
                                        <input type="radio" id="Weekly" name="salary_per" value="Weekly">
                                        <label for="Weekly">Weekly</label><br>
                                        <input type="radio" id="Monthly" name="salary_per" value="Monthly">
                                        <label for="Monthly">Monthly</label><br>
                                        <input type="radio" id="Fixed" name="salary_per" value="Fixed">
                                        <label for="Fixed">Fixed</label><br>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">City</label>
                                    <select name="city" id="city" required = "required">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}, {{$city->country->name}}</option>
                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Sport</label><br>
                                        <select name="sport" id="sport" required = "required">
                                            @foreach($sports as $sport)
                                                <option value="{{$sport->id}}">{{$sport->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <ul class="form-check-list">
                                            <li>
                                                <label class="form-label">Person types</label>
                                            </li>
                                            @foreach($person_types as $type)
                                                <li>
                                                    <input type="checkbox" name="person_type[]" value="{{$type->id}}" class="form-check" id="{{$type->name}}">
                                                    <label for="{{$type->name}}" class="form-check-text">{{$type->name}}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-inline">
                                        <i class="fas fa-check-circle"></i>
                                        <span>publish your ad</span>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>The process</h3>
                            <button data-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Fill in the form on the left.</p>
                            </li>
                            <li>
                                <p>No need to fill your organization data since those will be imported automatically.</p>
                            </li>
                            <li>
                                <p>You will receive an email with the cost estimate and payment data.</p>
                            </li>
                            <li>
                                <p>After receiving the money, your ad will be visible for 40 days or until you provide the information that the vacancy is filled.</p>
                            </li>
                            <li>
                                <p>You may modify your add in your company profile, but all changes will require our approval.</p>
                            </li>
                        </ul>
                    </div>
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Custom Offer</h3>
                            <button data-dismiss="alert">close</button>
                        </div>
                        <form class="account-card-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-inline">
                                    <i class="fas fa-paper-plane"></i>
                                    <span>send Message</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                ADPOST PART END
    =======================================-->
@endsection
