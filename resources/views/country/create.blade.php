@extends('layouts.app')

@section('content')

    <form method="POST" action="{{ route('country.store') }}" enctype="multipart/form-data">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name"   />
        <x-input-label for="flag" value="flag" />
        <input id="flag" class="block mt-1 w-full" type="file" name="flag" required = "required"/>
    </div>


    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
@endsection
