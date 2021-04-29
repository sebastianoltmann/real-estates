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

    @foreach($documentCategories as $category)

        <div class="card shadow-sm mb-5">
            <div class="card-header">
                <h4 class="mb-0 d-flex align-items-center justify-content-between">
                    {{ $category->name }}

                    @if(!$category->documentsByUserAndProject->isEmpty())
                        @can('update', \App\Services\Documents\Models\Document::class)
                            <a href="{{ route('admin.documents.create') }}" class="ml-auto btn btn-secondary">
                                {{ __('Enable for all users') }}
                            </a>
                        @endcan
                    @endif

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
