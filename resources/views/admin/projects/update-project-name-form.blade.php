<x-jet-form-section submit="updateTeamName">
    <x-slot name="title">
        {{ __('Team Name') }}
    </x-slot>

    <x-slot name="description">
        {{ __('The team\'s name and owner information.') }}
    </x-slot>

    <x-slot name="form">
        <x-jet-action-message on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <!-- Team Owner Information -->
        @if($team->owner)
        <div class="mb-4">
            <x-jet-label value="{{ __('Team Owner') }}" />

            <div class="d-flex mt-2">
                <div>
                    <div>{{ $team->owner->full_name }}</div>
                    <div class="text-muted">{{ $team->owner->email }}</div>
                </div>
            </div>
        </div>
        @endif

        <!-- Team Name -->
        <div class="w-md-75">
            <div class="form-group">
                <x-jet-label for="name" value="{{ __('Team Name') }}" />

                <x-jet-input id="name"
                             type="text"
                             class="{{ $errors->has('name') ? 'is-invalid' : '' }}"
                             wire:model.defer="state.name"
                             :disabled="! Gate::check('update', $team)" />

                <x-jet-input-error for="name" />
            </div>
        </div>
    </x-slot>

    @if (Gate::check('update', $team))
        <x-slot name="actions">
			<div class="d-flex align-items-baseline">
				<x-jet-button>
					{{ __('Save') }}
				</x-jet-button>
			</div>
        </x-slot>
    @endif
</x-jet-form-section>
