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
                            <h3>Organizations</h3>
                            <a href="{{route('organization.create')}}">Add</a>
                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Tax ID</p> <p>Actions</p></li>
                            @foreach($organizations as $organization)
                                <li><h5>{{$organization->name}}</h5><p>{{$organization->tax_id}}</p>
                                <p>
                                    <form method="POST" action = "{{route('organization.delete', ['id' => $organization->id])}}">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" type="submit"> Usuń</button>
                                    </form>
                                    <form method="GET" action = "{{route('organization.edit', ['id' => $organization->id])}}">
                                        <button class="btn btn-warning" type="submit"> Edit</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=====================================
                PROFILE PART END
    =======================================-->
@endsection()
