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
                            <h2>Blog edit</h2>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">{{$person->name}}</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--=====================================
                  SINGLE BANNER PART END
        =======================================-->
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form class="adpost-form" id="blogForm" action="{{route('person.update', ['id' => $person->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="adpost-card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Last name</label>
                                        <input type="text" value="{{$person->last_name}}" class="form-control" name="last_name" placeholder="Type your last name here">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Your birth date</label>
                                        <input type="date" class="form-control" value="{{$person->birth_date}}" name="birth_date" >
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Residence</label>
                                        <input type="text" class="form-control" value="{{$person->residence}}" name="residence" placeholder="Your place of current residence">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Photo</label>
                                        <img style="max-height: 40px" src="{{Storage::url($person->photo->path)}}">
                                        <input type="file" name="photo" class="form-control">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Highlight video</label>
                                        <input type="text" class="form-control" value="{{$person->video_url}}" name="video_url" placeholder="Place link to your video here">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Facebook profile</label>
                                        <input type="text" class="form-control"  value="{{$person->fb_url}}" name="fb_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Instagram profile</label>
                                        <input type="text" class="form-control"  value="{{$person->ig_url}}" name="ig_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Gender</label> <br>
                                        <select class="form-label" name="gender" id="country">
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
                                                    <input type="checkbox" name="language[]" @if($person->languages->contains($language)) checked @endif value="{{$language->id}}" class="form-check" id="{{$language->name}}">
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
                                        <input type="text" class="form-control" value="{{$person->sport_additional}}"  name="sport_additional" placeholder="i.e. position, weight category, specific subcategory like shot put">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="body">Career and experience</label>
                                        <input type="text" class="form-control" value="{{$person->career}}" name="career" placeholder="Describe your career">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Achievements</label>
                                        <input type="text" class="form-control" name="achievements"  value="{{$person->achievements}}" placeholder="Milestones of your career">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Tax ID</label>
                                        <input type="text" name="tax_id" value="{{$person->tax_id}}" class="form-control" placeholder="Your Tax ID">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Billing address</label>
                                        <input type="text" name="billing_address" value="{{$person->billing_address}}" class="form-control" placeholder="Your Tax ID">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group text-right">
                                <button class="btn btn-inline">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Update</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
