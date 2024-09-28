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
                            <h3>Pages</h3>

                        </div>
                        <ul class="account-card-list">
                            <li><h4>Name</h4><p>Actions</p></li>
                                <li><h5>Home</h5>

{{--                                    <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">--}}
{{--                                        @csrf--}}
{{--                                        @method('delete')--}}
{{--                                        <button class="btn btn-danger" type="submit"> Delete</button>--}}
{{--                                    </form>--}}
                                    <form method="GET" action = "{{route('home.edit')}}">
                                        <button class="btn btn-warning" type="submit"> Edit</button>
                                    </form>
                                </li>
                            <li><h5>Dual</h5>

                                {{--                                    <form method="POST" action = "{{route('ad.delete', ['id' => $ad->id])}}">--}}
                                {{--                                        @csrf--}}
                                {{--                                        @method('delete')--}}
                                {{--                                        <button class="btn btn-danger" type="submit"> Delete</button>--}}
                                {{--                                    </form>--}}
                                <form method="GET" action = "{{route('dual.edit')}}">
                                    <button class="btn btn-warning" type="submit"> Edit</button>
                                </form>
                            </li>
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
