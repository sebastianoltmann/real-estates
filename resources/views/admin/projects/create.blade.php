<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Create Team') }}
        </h2>
    </x-slot>

    <div>
        @livewire('projects.create-project-form')
    </div>
</x-app-layout>
