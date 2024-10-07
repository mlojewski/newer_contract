@extends('layouts.user_panel')

@section('panel_content')
    <!--=====================================
                PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <h2>You have applied for the following:</h2>
                        <div class="account-title">

                            <h3>Active ads</h3>
                        </div>
                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Salary</th>
                                <th scope="col">City</th>
                            </tr>
                            </thead>

                            <tbody class="table-body">
                            @foreach($active as $ad)
                            <tr>
                                <td class="table-price"> <a href="/ad/{{$ad->id}}">{{$ad->title}}</a></td>
                                <td class="table-price">{{$ad->user->name}} </td>

                                <td class="table-price">{{$ad->salary}}</td>
                                <td class="table-number">{{$ad->city->name}} </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="account-title">
                            <h3>Inactive ads</h3>
                        </div>
                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Salary</th>
                                <th scope="col">City</th>
                            </tr>
                            </thead>

                            <tbody class="table-body">
                            @foreach($inactive as $ad)
                                <tr>
                                    <td class="table-price"> <a href="/ad/{{$ad->id}}">{{$ad->title}}</a></td>
                                    <td class="table-price">{{$ad->user->name}} </td>

                                    <td class="table-price">{{$ad->salary}}</td>
                                    <td class="table-number">{{$ad->city->name}} </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->
@endsection()
