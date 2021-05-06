<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 font-weight-bold">
            {{ __('Trash:') }} <small class="ml-2">{{ __(\Illuminate\Support\Str::title($resource)) }}</small>
        </h2>
    </x-slot>
</x-app-layout>
