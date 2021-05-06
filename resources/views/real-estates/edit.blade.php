<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Real Estates') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0 d-flex align-items-center justify-content-between">
                @if($realEstate->getKey())
                    {{ __('Edit real estate:') }} {{ $realEstate->name | title }}
                @else
                    {{ __('Create new real estate') }}

                @endif

                @if($realEstate->getKey())
                    @can('delete', $realEstate)
                        <form method="post" action="{{ route('admin.realEstates.destroy', $realEstate) }}">
                            @method('delete')
                            @csrf

                            <button class="btn btn-dark"
                                    type="submit"
                                    onclick="return confirm('{{ __('Are you sure you want to remove the ":name" real estate', ['name' => $realEstate->name]) }}')"
                            >
                                Delete
                            </button>
                        </form>
                    @endcan
                @endif

            </h4>
        </div>

        <x-form class="needs-validation"
                :action="route($realEstate->getKey() ? 'admin.realEstates.update' : 'admin.realEstates.store', $realEstate)"
                enctype="multipart/form-data"
                novalidate
        >

            <div class="card-body">

                @include('real-estates._partials.form')

            </div>

            <div class="card-footer d-flex align-items-center">
                <a class="btn btn-secondary btn btn-lg d-flex align-items-center"
                   href="{{ route('admin.realEstates.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-chevron-left mr-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <span>{{ __('Back') }}</span>

                </a>
                <button class="btn btn-dark btn-lg ml-auto" style="min-width: 250px;">Save</button>

                @if(!empty($realEstate->getKey()))
                    @method('patch')
                @endif

                @csrf

            </div>

        </x-form>
    </div>

    @if($realEstate->getKey())
        <hr class="my-4">

        <div class="card shadow-sm">
            <div class="card-body">
                @include('real-estates._partials.documents')
            </div>
        </div>

        <hr class="my-4">

        <div class="card shadow-sm">
            <div class="card-body">
                @include('real-estates._partials.global-documents')
            </div>
        </div>
    @endif

</x-app-layout>
