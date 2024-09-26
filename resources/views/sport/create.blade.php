@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('sport.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <input id="name" class="block mt-1 w-full" type="text" name="name" required="required"/>
        <x-input-label for="sport_logo" value="sport_logo" />
        <input id="sport_logo" class="block mt-1 w-full" type="file" name="sport_logo" required="required"/>
    </div>


    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
@endsection
