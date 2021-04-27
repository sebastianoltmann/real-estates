<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    @foreach($documentCategories as $category)

        @if(!$category->documentsByUserAndProject->isEmpty())
            <div class="card shadow-sm mb-5">
                <div class="card-header">
                    <h4 class="mb-0 d-flex align-items-center justify-content-between">
                        {{ $category->name }}

                        @if($user->hasProjectPermission(\App\Services\Permissions\Permission::DOCUMENT_UPDATE()->getValue()))
                            <a href="{{ route('documents.create') }}" class="ml-auto btn btn-secondary">
                                {{ __('Enable for all users') }}
                            </a>
                        @endif

                        @if($user->hasProjectPermission(\App\Services\Permissions\Permission::DOCUMENT_CREATE()->getValue()))
                            <a href="{{ route('documents.create') }}" class="ml-2 btn btn-dark">
                                {{ __('Create new document') }}
                            </a>
                        @endif

                    </h4>
                </div>

                <div class="card-body">
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
                </div>

            </div>
        @endif
    @endforeach


</x-app-layout>
