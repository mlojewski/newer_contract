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
                        <div class="account-title">
                            <h3>Received</h3>

                        </div>
                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Sender</th>
                                <th scope="col">Was read?</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody class="table-body">
                            @foreach($received as $message)

                                <tr>
                                    <td class="table-price"> @if($message->is_viewed == 0) <a href="/message/show/{{$message->id}}"><b>{{$message->title}}</b></a> @else <a href="/message/show/{{$message->id}}">{{$message->title}} @endif</td>
                                    <td class="table-number"> <a href="/user/show/{{$message->sender_id}}">{{$message->sender->name}}</a></td>
                                    <td class="table-number"><p>@if($message->is_viewed == 1) Yes @else No @endif</p></td>
                                    <td class="table-number">
                                        <form method="POST" action = "{{route('message.delete', ['id' => $message->id])}}">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger" type="submit"> Delete</button>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>

                        </table>

                        <div class="account-title">
                            <h3>Sent</h3>

                        </div>
                        <table class="table-list">
                            <thead class="table-head">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Sender</th>
                                <th scope="col">Was read?</th>

                            </tr>
                            </thead>
                            <tbody class="table-body">
                            @foreach($sent as $message)

                                <tr>
                                    <td class="table-price"> @if($message->is_viewed == 0) <a href="/message/show/{{$message->id}}"><b>{{$message->title}}</b></a> @else <a href="/message/show/{{$message->id}}">{{$message->title}} @endif</td>
                                    <td class="table-number"> <a href="/user/show/{{$message->recipient_id}}">{{$message->recipient->name}}</a></td>
                                    <td class="table-number"><p>@if($message->is_viewed == 1) Yes @else No @endif</p></td>

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
