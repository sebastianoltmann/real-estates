<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 font-weight-bold d-flex align-items-center justify-content-between">
            {{ __('Real Estates') }}

            @can('create', \App\Services\RealEstates\Models\RealEstate::class)
                <a href="{{ route('admin.realEstates.create') }}" class="ml-2 btn btn-dark">
                    {{ __('Create new real estate') }}
                </a>
            @endcan
        </h2>
    </x-slot>


    <div class="card shadow-sm mb-5">
        <div class="card-header">
            <h4 class="mb-0">
                {{ __('Real Estates') | title }}
            </h4>
        </div>

        <div class="card-body">
            @if(!$realEstates->isEmpty())
                <table class="table document-table table-borderless">
                    <thead>
                    <tr>
                        <th class="h5 font-weight-bolder document-table-column-id">{{ __('No.') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Name') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Slug') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Type') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Owner') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Status') }}</th>
                        <th class="h5 font-weight-bolder document-table-name">{{ __('Created') }}</th>
                        <th class="h5 font-weight-bolder document-table-actions text-right">{{ __('Actions') }}</th>
                    </tr>

                    </thead>
                    <tbody>
                    @foreach($realEstates as $realEstate)
                        @livewire('real-estates.table-row-user', compact('realEstate'))
                    @endforeach

                    </tbody>
                </table>
            @else
                <div class="alert alert-info mb-0">
                    <p class="mb-0">
                        {{ __('No users in this project.') }}
                    </p>
                </div>
            @endif

        </div>

    </div>

</x-app-layout>
