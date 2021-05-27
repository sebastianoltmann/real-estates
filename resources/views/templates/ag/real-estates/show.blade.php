<x-app-layout>
    <x-slot name="header">
        <h1><small class="font-weight-bolder">{{ __('Real estate:') }}</small> {{ $realEstate->name }}</h1>
    </x-slot>

    @foreach($documentCategories as $documentCategory)
        <div class="card shadow-sm mb-5">
            <div class="card-header">
                <h3 class="mb-0">{{ $documentCategory->name }}</h3>
            </div>
            <div class="card-body">
                <ul class="list-group">
                @foreach($documentCategory->documents as $document)
                        <li class="list-group-item d-flex align-items-center">
                            <strong class="list-group-item-alias" style="width: 150px;">{{ $document->alias }}</strong>
                            <span class="list-group-item-name">{{ $document->name }}</span>

                            @can('view', $document)
                                <a class="btn btn-sm btn-dark ml-auto" download href="{{ route('realEstates.documents.show', [$realEstate, $document]) }}">download</a>
                            @endcan
                        </li>
                @endforeach
                </ul>
            </div>
        </div>
    @endforeach
</x-app-layout>
