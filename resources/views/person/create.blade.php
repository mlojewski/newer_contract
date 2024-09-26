@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="{{asset('css/custom/ad-post.css')}}">
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form class="adpost-form" id="blogForm" action="{{route('person.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Hello {{$user->name}} please fill in your additional information.</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Last name</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Type your last name here" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Your birth date</label>
                                        <input type="date" class="form-control" name="birth_date" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Residence</label>
                                        <input type="text" class="form-control" name="residence" placeholder="Your place of current residence" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Photo</label>
                                        <input type="file" name="photo" class="form-control" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Highlight video</label>
                                        <input type="text" class="form-control" name="video_url" placeholder="Place link to your video here" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Facebook profile</label>
                                        <input type="text" class="form-control"  name="fb_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Instagram profile</label>
                                        <input type="text" class="form-control"  name="ig_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label> <br>
                                        <select class="form-label" name="gender" id="gender">
                                            @foreach($genders as $gender)
                                                <option value="{{$gender->id}}">{{$gender->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Country</label> <br>
                                        <select class="form-label" name="country" id="country">
                                            @foreach($countries as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Sport</label> <br>
                                        <select class="form-label" name="sport" id="sport">
                                            @foreach($sports as $sport)
                                                <option value="{{$sport->id}}">{{$sport->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                <div class="form-group">
                                    <ul class="form-check-list">
                                        <li>
                                            <label class="form-label">Languages</label>
                                        </li>
                                        @foreach($languages as $language)
                                            <li>
                                                <input type="checkbox" name="language[]" value="{{$language->id}}" class="form-check" id="{{$language->name}}">
                                                <label for="{{$language->name}}" class="form-check-text">{{$language->name}}</label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-label">Profile type</label> <br>
                                            <select class="form-label" name="type" id="type">
                                                @foreach($person_types as $type)
                                                    <option value="{{$type->id}}">{{$type->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Sport additional information</label>
                                        <input type="text" class="form-control"  name="sport_additional" placeholder="i.e. position, weight category, specific subcategory like shot put">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Career and experience</label>
                                        <textarea class="form-control" name="career" placeholder="Describe your career" required = "required"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Achievements</label>
                                        <textarea class="form-control" name="achievements" placeholder="Milestones of your career" required = "required"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Tax ID</label>
                                        <input type="text" name="tax_id" class="form-control" placeholder="Your Tax ID" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Billing address</label>
                                        <input type="text" name="billing_address" class="form-control" placeholder="Your billing address" required = "required">
                                    </div>
                                </div>
                                <div class="form-group text-right">
                                    <button class="btn btn-inline">
                                        <i class="fas fa-check-circle"></i>
                                        <span>published your ad</span>
                                    </button>
                                </div>
                            </div>

                        </div>

                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Safety Tips</h3>
                            <button data-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                            <li>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit debitis odio perferendis placeat at aperiam.</p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

    </section>
@endsection
