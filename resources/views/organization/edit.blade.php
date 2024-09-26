
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
                        <h2>Edit your data</h2>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><h2>{{$organization->name}}</h2></li>
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
    <form method="POST" action="{{ route('organization.update', ['id' => $organization->id]) }}" enctype="multipart/form-data">
@csrf
@method('put')
    <div class="adpost-card">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Website address</label>
                    <input type="text" value="{{$organization->www_url}}" name="www_url" class="form-control">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Logo</label><img style="max-height: 40px" src="{{Storage::url($organization->logo->path)}}">

                    <input type="file" class="form-control"  name="logo" placeholder="Type your last name here">
                </div>
            </div>

            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label" id="category">Linkedin page</label>
                    <input type="text" class="form-control" value="{{$organization->li_url}}"name="li_url" placeholder="Place link to your LinkedIn page here">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Facebook profile</label>
                    <input type="text" class="form-control"  value="{{$organization->fb_url}}" name="fb_url" placeholder="Enter your link here">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Instagram profile</label>
                    <input type="text" class="form-control"  value="{{$organization->ig_url}}" name="ig_url" placeholder="Enter your link here">
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Location</label>
                    <input type="text" class="form-control"  value="{{$organization->location}}" name="location" placeholder="Enter your location here, preferably City, Country">
                </div>
            </div>
            <div class="col-md-4 col-lg-4">
                <div class="form-group">
                    <label class="form-label">Organization type</label> <br>
                    <select class="form-label" name="organization_type">
                        @foreach($organization_types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
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
                                <input type="checkbox" name="language[]" @if($organization->languages->contains($language)) checked @endif value="{{$language->id}}" class="form-check" id="{{$language->name}}">
                                <label for="{{$language->name}}" class="form-check-text">{{$language->name}}</label>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="form-group">
                    <label class="form-label">Description</label>
                    <input type="text" class="form-control" value="{{$organization->description}}" name="description">

                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Tax ID</label>
                    <input type="text" name="tax_id" value="{{$organization->tax_id}}"class="form-control" placeholder="Your Tax ID">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label class="form-label">Billing address</label>
                    <input type="text" name="billing_address" value="{{$organization->billing_address}}"class="form-control" placeholder="Your billing address">
                </div>
            </div>
            <div class="form-group text-right">
                <button class="btn btn-inline">
                    <i class="fas fa-check-circle"></i>
                    <span>Update</span>
                </button>
            </div>
        </div>
    </div>

</form>
                </div>
            </div>
        </div>
    </section>
@endsection
