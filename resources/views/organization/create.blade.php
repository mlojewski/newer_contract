@extends('layouts.app')

@section('content')

    <section class="adpost-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <form class="adpost-form" id="blogForm" action="{{route('organization.store')}}" method="POST" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="adpost-card">
                            <div class="adpost-title">
                                <h3>Hello {{$user->name}} please fill in your additional information.</h3>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Website address</label>
                                        <input type="text" name="www_url" class="form-control" required = "required" placeholder="Place your URL here.">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Logo</label>
                                        <input type="file" class="form-control" name="logo" required = "required">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label" id="category">Linkedin page</label>
                                        <input type="text" class="form-control" name="li_url" placeholder="Place link to your LinkedIn page here">
                                    </div>
                                </div>
                                <div class="col-lg-12">
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
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Location</label>
                                        <input type="text" class="form-control" required="required"  name="location" placeholder="Enter your location here, preferably City, Country">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Organization type</label> <br>
                                        <select class="form-label" name="organization_type" required = "required">
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
                                                    <input type="checkbox" name="language[]" value="{{$language->id}}" class="form-check" id="{{$language->name}}">
                                                    <label for="{{$language->name}}" class="form-check-text">{{$language->name}}</label>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="form-label">Description</label>
                                        <textarea class="form-control"  required = "required" name="description" placeholder="Briefly describe your organization"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Tax ID</label>
                                        <input type="text" name="tax_id" class="form-control" placeholder="Your Tax ID (not publicly shown)" required = "required">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-label">Billing address</label>
                                        <input type="text" name="billing_address" class="form-control" placeholder="Your billing address (not publicly shown)" required = "required">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="adpost-card">
                            <div class="form-group text-right">
                                <button class="btn btn-inline">
                                    <i class="fas fa-check-circle"></i>
                                    <span>Save and proceed</span>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="account-card alert fade show">
                        <div class="account-title">
                            <h3>Tips</h3>
                            <button data-dismiss="alert">close</button>
                        </div>
                        <ul class="account-card-text">
                            <li>
                                <p>Providing full access to your social media accounts makes you more credible for future employees</p>
                            </li>
                            <li>
                                <p>The portal will accept olny graphic files such as jpg and png as your logos.</p>
                            </li>
                            <li>
                                <p>Provide a square version of your logo if possible</p>
                            </li>
                            <li>
                                <p>Providing your tax information will make the invoicing process smoother. </p>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
