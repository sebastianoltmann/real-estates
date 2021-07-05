<div class="myBoxForm">
    <form method="post" class="needs-validation" wire:submit.prevent="handleSubmit" novalidate>
        @csrf
        <div class="form-row">
            <div class="form-group col-md-12">
                {{ __('components.residenceForm.projectWillCome') }}
                <p>
                    {{ __('components.residenceForm.personalWishes') }}
                </p>
                <p>
                    <u>{{ __('components.residenceForm.mailMe') }}</u>.
                </p>
            </div>
        </div>

        <div class="form-group">
            <label class="d-block"><strong>{{ __('fields.attention.label') }}</strong></label>
            <div class="form-check-inline w-100 flex-wrap">

                <input id="attention-mr"
                       type="radio"
                       class="form-check-input @error('attention')is-invalid @enderror"
                       wire:model="attention"
                       value="{{ \App\Services\Users\Attention::MR()->getValue() }}">

                <label class="form-check-label" for="attention-mr">
                    {{ __('fields.attention.values.mr') }}
                </label>
                &nbsp;
                <input id="attention-mrs"
                       type="radio"
                       class="ml-2 form-check-input @error('attention')is-invalid @enderror"
                       wire:model="attention"
                       value="{{ \App\Services\Users\Attention::MRS()->getValue() }}">
                <label class="form-check-label" for="attention-mrs">
                    {{ __('fields.attention.values.mrs') }}
                </label>

                <input id="attention-ms"
                       type="radio"
                       class="ml-2 form-check-input @error('attention')is-invalid @enderror"
                       wire:model="attention"
                       value="{{ \App\Services\Users\Attention::MS()->getValue() }}">
                <label class="form-check-label" for="attention-ms">
                    {{ __('fields.attention.values.ms') }}
                </label>

                @error('attention') <span class="invalid-feedback d-block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="form-group">
            <label for="first_name"><strong>{{ __('fields.first_name.label') }}</strong></label>
            <input type="text"
                   class="form-control @error('firstName')is-invalid @enderror"
                   id="first_name"
                   placeholder="{{ __('fields.first_name.label') }}"
                   wire:model.lazy="firstName">
            @error('firstName') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group ">
            <label for="last_name"><strong>{{ __('fields.last_name.label') }}</strong></label>
            <input type="text"
                   class="form-control @error('lastName')is-invalid @enderror"
                   id="last_name"
                   placeholder="{{ __('fields.last_name.label') }}"
                   wire:model.lazy="lastName">
            @error('lastName') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email"><strong>{{ __('fields.email.label') }}</strong></label>
            <input type="email"
                   class="form-control @error('email')is-invalid @enderror"
                   id="email"
                   placeholder="{{ __('fields.email.label') }}"
                   wire:model.lazy="email">
            @error('email') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="country"><strong>{{ __('fields.country.label') }}</strong></label>
            <input type="text"
                   class="form-control @error('country')is-invalid @enderror"
                   id="country"
                   placeholder="{{ __('fields.country.label') }}"
                   wire:model.lazy="country">
            @error('country') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="city"><strong>{{ __('fields.city.label') }}</strong></label>
            <input type="text"
                   class="form-control @error('city')is-invalid @enderror"
                   id="city"
                   placeholder="{{ __('fields.city.label') }}"
                   wire:model.lazy="city">
            @error('city') <span class="invalid-feedback">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <button type="submit"
                    class="btn btn-primary">{{ __('general.send') }}
            </button>
        </div>

        <x-flash-message-bootstrap/>

    </form>
</div>
