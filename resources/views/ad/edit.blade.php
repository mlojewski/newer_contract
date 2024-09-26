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
                            <li class="breadcrumb-item"><a href="index.html">Edit {{$ad->title}}</a></li>
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
                    <form class="adpost-form" id="adForm" action="{{route('ad.update', ['id' => $ad->id])}}" method="POST">
                        @csrf
                        @method('put')
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Post your ad</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Ad Title</label>
                                        <input name="title" type="text" class="form-control" value="{{$ad->title}}" placeholder="Type your product title here">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Content</label>
                                        <input name="ad_content" class="form-control"  value="{{$ad->ad_content}}" placeholder="General description">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Requirements</label>
                                        <input name="requirements" class="form-control"  value="{{$ad->requirements}}" placeholder="Job requirements - experience, level of play etc"></input>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Salary</label>
                                        <input type="number" class="form-control" name="salary" value="{{$ad->salary}}" placeholder="Enter your offer">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label" >Salary rate</label><br>
                                        Current = {{$ad->salary_per}}<br>
                                        <input type="radio" id="Hourly" name="salary_per" value="Hourly" >
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
                                        <label class="form-label">City</label><br>
                                        <select name="city" id="city">
                                            <option value={{$ad->city->id}}>{{$ad->city->name}}, {{$ad->city->country->name}}</option>
                                            @foreach($cities as $city)
                                                <option value="{{$city->id}}">{{$city->name}}, {{$city->country->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label class="form-label">Sport</label><br>
                                        <select name="sport" id="sport" >
                                            <option value="{{$ad->sport->id}}">{{$ad->sport->name}}</option>
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
                                                    <input type="checkbox" name="person_type[]" @if($ad->PersonTypes->contains($type)) checked  @endif value="{{$type->id}}" class="form-check" id="{{$type->name}}">
                                                    <label for="{{$type->name}}" class="form-check-text">{{$type->name}}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @if(auth()->user()->is_admin)

                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" >Author hidden</label><br>
                                            Current: @if($ad->is_author_hidden == 0) No @else  Yes @endif<br>
                                            <input type="radio" id="is_author_hidden" name="is_author_hidden" value="0" >
                                            <label for="0">No</label><br>
                                            <input type="radio" id="is_author_hidden" name="is_author_hidden" value="1" >
                                            <label for="1">Yes</label><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" >Ad promoted</label><br>
                                            Current: @if($ad->is_promoted == 0) No @else  Yes @endif<br>
                                            <input type="radio" id="is_promoted" name="is_promoted" value="0" >
                                            <label for="0">No</label><br>
                                            <input type="radio" id="is_promoted" name="is_promoted" value="1" >
                                            <label for="1">Yes</label><br>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label class="form-label" >Ad valid</label><br>
                                            Current: @if($ad->is_valid == 0) No @else  Yes @endif<br>
                                            <input type="radio" id="is_valid" name="is_valid" value="0" >
                                            <label for="0">No</label><br>
                                            <input type="radio" id="is_valid" name="is_valid" value="1" >
                                            <label for="1">Yes</label><br>
                                        </div>
                                    </div>
                                @endif

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
                                <p>Edit the necessary data. </p>
                            </li>
                            <li>
                                <p>The updated ad will turned off pending our approval.</p>
                            </li>
                            <li>
                                <p>After the approval it will be visible again. </p>
                            </li>
                            <li>
                                <p>As we approve within 24 hours, an extra day will be added to your 40 day visibility period.</p>
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
