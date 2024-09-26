<form method="POST" action="{{ route('organization_type.store') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <x-input-label for="name" value="name" />
        <input id="name" class="block mt-1 w-full" type="text" name="name" required = "required"/>

    </div>

    <div class="flex items-center justify-end mt-4">

        <x-primary-button class="ml-3">
            {{ __('Send') }}
        </x-primary-button>
    </div>
</form>
