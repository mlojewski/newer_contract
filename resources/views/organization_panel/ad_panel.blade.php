@extends('layouts.organization_panel')

@section('panel_content')
    <!--=====================================
                PROFILE PART START
    =======================================-->
    <section class="profile-part">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-card">
                        <div class="account-title">
                            <h3>Your Ads</h3>
                            <a href="{{route('ad.create')}}">Add</a>
                        </div>


                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Is promoted</th>
                                <th scope="col">Is active</th>
                                <th scope="col">Is dual</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            @foreach($ads as $ad)
                                <tr>
                                    <td class="table-price"> <a href="/ad/show/{{$ad->id}}">{{$ad->title}}</a></td>
                                    <td class="table-number">@if($ad->is_promoted != 1)No @else Yes @endif </td>
                                    <td class="table-number">@if($ad->is_valid != 1) No @else Yes @endif</td>
                                    <td class="table-number">@if($ad->is_dual != 1) No @else Yes @endif</td>
                                    <td class="table-number">
                                        <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"> Delete</button>
                                        </form>
                                    </td>
                                    <td class="table-number">

                                        <form method="GET" action = "{{route('ad.edit', ['id' => $ad->id])}}">
                                            <button class="btn btn-warning" type="submit"> Edit</button>
                                        </form>
                                    </td>
                                </tr>

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
