@extends('layouts.admin_panel')

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
                            <h3>Ads</h3>

                        </div>
                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Owner</th>
                                <th scope="col">Is promoted</th>
                                <th scope="col">Is active</th>
                                <th scope="col" colspan="2">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            @foreach($ads as $ad)
                                <tr>
                                    <td class="table-price"> <a href="/ad/{{$ad->id}}">{{$ad->title}}</a></td>
                                    <td class="table-price">{{$ad->user->name}} </td>
                                    <td class="table-number">{{$ad->is_promoted}} </td>
                                    <td class="table-number">{{$ad->is_valid}} </td>
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
