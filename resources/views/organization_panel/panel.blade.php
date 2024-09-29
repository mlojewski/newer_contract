@extends('layouts.organization_panel')

@section('panel_content')
    <link rel="stylesheet" href="{{asset('css/custom/ad-post.css')}}">
    <!--=====================================
              SINGLE BANNER PART END
    =======================================-->
    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form method="POST" action="{{ route('organization.update', ['id' => $organization->organization->id]) }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="adpost-card">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Website address</label>
                                        <input type="text" value="{{$organization->organization->www_url}}" name="www_url" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Logo</label><img style="max-height: 40px" src="{{Storage::url($organization->organization->logo->path)}}">

                                        <input type="file" class="form-control"  name="logo" placeholder="Type your last name here">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Linkedin page</label>
                                        <input type="text" class="form-control" value="{{$organization->organization->li_url}}"name="li_url" placeholder="Place link to your LinkedIn page here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Facebook profile</label>
                                        <input type="text" class="form-control"  value="{{$organization->organization->fb_url}}" name="fb_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Instagram profile</label>
                                        <input type="text" class="form-control"  value="{{$organization->organization->ig_url}}" name="ig_url" placeholder="Enter your link here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control"  value="{{$organization->organization->location}}" name="location" placeholder="Enter your location here, preferably City, Country">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Organization type</label> <br>
                                        <select class="form-label" name="organization_type">
                                            @foreach($organization_types as $type)
                                                <option value="{{$type->id}}" @if($organization->organization->organization_type_id == $type->id) selected @endif>{{$type->name}}</option>
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
                                                    <input type="checkbox" name="language[]" @if($organization->organization->languages->contains($language)) checked @endif value="{{$language->id}}" class="form-check" id="{{$language->name}}">
                                                    <label for="{{$language->name}}" class="form-check-text">{{$language->name}}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" value="{{$organization->organization->description}}" name="description">

                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Tax ID</label>
                                        <input type="text" name="tax_id" value="{{$organization->organization->tax_id}}"class="form-control" placeholder="Your Tax ID">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Billing address</label>
                                        <input type="text" name="billing_address" value="{{$organization->organization->billing_address}}"class="form-control" placeholder="Your billing address">
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
@endsection()
