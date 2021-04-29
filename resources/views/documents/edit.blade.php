<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-header">

            <h4 class="mb-0 d-flex align-items-center justify-content-between">
                @if($document->id)
                    {{ __('Edit document:') }} {{ $document->name | title }}
                @else
                    {{ __('Create new document') }}

                @endif

                @if($document->getKey())
                    @can('delete', $document)
                        <form method="post" action="{{ route('admin.documents.destroy', $document) }}">
                            @method('delete')
                            @csrf

                            <button class="btn btn-dark" type="submit">
                                Delete
                            </button>
                        </form>
                    @endcan
                @endif

            </h4>
        </div>

        <x-form class="needs-validation"
                :action="route($document->id ? 'admin.documents.update' : 'admin.documents.store', $document)"
                enctype="multipart/form-data"
                novalidate
        >

            <div class="card-body">

                <x-form-input id="name"
                              name="name"
                              :value="$document->name"
                              :placeholder="__('Document name')"
                              :label="__('Document name')"
                              :required="true"
                />

                <x-form-input
                    :label=" $document->hasFileDocument() ? $document->getFileDocument()->file_name :__('Document file')"
                    id="file"
                    type="file"
                    name="file"
                    accept=".doc,.docx,.pdf,.xls,.xlsx"
                    :required="!$document->hasFileDocument()"
                />


                @if(!$categories->isEmpty())
                    <hr class="my-4">

                    <x-form-group :label="__('Document category')">
                        @foreach($categories as $c)
                            <x-form-radio :id="'users_'.$c->uuid"
                                          :name="'category'"
                                          :value="$c->uuid"
                                          :checked="$document->category && $c->id === $document->category->id"
                                          autocomplete="off"
                                          :label="$c->name"
                                          :required="true"
                            />
                        @endforeach
                    </x-form-group>
                @endif

            </div>

            <div class="card-footer text-right">
                <button class="btn btn-dark btn-lg" style="min-width: 250px;">Save</button>

                @if(!empty($document->id))
                    @method('patch')
                @endif

                @csrf

            </div>

        </x-form>
    </div>
</x-app-layout>
