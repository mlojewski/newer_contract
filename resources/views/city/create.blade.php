@extends('layouts.app')

@section('content')


    <form method="POST" action="{{ route('city.store') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <input id="name" class="block mt-1 w-full" type="text" name="name" required = "required"/>
        <select name="country" id="country" required = "required">
            @foreach($countries as $country)
                <option value="{{$country->id}}">{{$country->name}}</option>
            @endforeach

        </select>
    </div>


    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
@endsection
