<x-app-layout>
    <x-slot name="header">
        <h1><small class="font-weight-bolder">{{ __('Real estates') }}</small></h1>
    </x-slot>

    @if(!$realEstates->isEmpty())
    <div class="row mt-5">
        @foreach($realEstates as $realEstate)
            <div class="col-3">

                @can('view', $realEstate)
                <a class="card shadow-sm text-center" href="{{ route('realEstates.show', $realEstate) }}">
                @else
                <div class="card shadow-sm text-center" style="opacity: 0.4">
                @endcan

                    <div class="card-body">

                        <h5 class="card-title h3 d-flex justify-content-between align-items-center mb-0">
                        {{ $realEstate->name }}

                        @if($realEstate->sold && Auth::user()->id == $realEstate->owner->id)
                            <span class="py-1 badge text-white bg-success" style="font-size: 60%">
                                {{ __('My') }}
                            </span>
                        @else
                            <span class="py-1 badge text-white bg-{{ $realEstate->sold ? 'danger' : 'success' }}"
                            style="font-size: 60%">
                                {{ __($realEstate->sold ? 'Sold' : 'Available') }}
                            </span>
                        @endif
                    </div>

                @can('view', $realEstate)
                </a>
                @else
                </div>
                @endcan
            </div>
        @endforeach
    </div>
    @endif
</x-app-layout>
