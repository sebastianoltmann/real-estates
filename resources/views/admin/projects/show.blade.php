<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Project Settings') }}
        </h2>
    </x-slot>

    <div>
        @livewire('projects.update-project-name-form', ['team' => $project])

        @livewire('projects.project-member-manager', ['team' => $project])

        @if (Gate::check('delete', $project))
            <x-jet-section-border />

            <div>
                @livewire('projects.delete-project-form', ['team' => $project])
            </div>
        @endif
    </div>
</x-app-layout>
