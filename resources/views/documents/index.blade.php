<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 font-weight-bold d-flex align-items-center justify-content-between">
            {{ __('Documents') }}

            @can('create', \App\Services\Documents\Models\Document::class)
                <a href="{{ route('admin.documents.create') }}" class="ml-2 btn btn-dark">
                    {{ __('Create new document') }}
                </a>
            @endcan
        </h2>
    </x-slot>

    <div class="alert alert-info">
        <p class="mb-0 d-flex align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                 class="bi bi-info-circle mr-3" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path
                    d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
            </svg>
            <span>
                Documents added directly for the project will be available for all properties subject to this project.
            </span>
        </p>
    </div>

    @foreach($documentCategories as $category)

        <div class="card shadow-sm mb-5">
            <div class="card-header">
                <h4 class="mb-0 d-flex align-items-center justify-content-between">
                    {{ $category->name }}
                </h4>
            </div>

            <div class="card-body">
                @if(!$category->documentsByUserAndProject->isEmpty())
                    <table class="table document-table table-borderless">
                        <thead>
                        <tr>
                            <th class="h5 font-weight-bolder document-table-column-id"
                                width="200px">{{ __('No.') }}</th>
                            <th class="h5 font-weight-bolder document-table-name">{{ __('Name') }}</th>
                            <th class="h5 font-weight-bolder document-table-actions text-right">{{ __('Actions') }}</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($category->documentsByUserAndProject as $document)
                            @livewire('documents.table-row-document', [
                                'document' => $document,
                                'category' => $category,
                                'user' => $user
                            ])
                        @endforeach

                        </tbody>
                    </table>
                @else
                    <div class="alert alert-info mb-0">
                        <p class="mb-0">
                            {{ __('No documents in this category.') }}
                        </p>
                    </div>
                @endif

            </div>

        </div>
    @endforeach


</x-app-layout>
