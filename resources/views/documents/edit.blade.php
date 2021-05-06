<x-app-layout>
    <x-slot name="header">
        @section('header')
            <h2 class="h4 font-weight-bold">
                {{ __('Documents') }}
            </h2>
        @endsection

        @yield('header')
    </x-slot>

    <div class="card shadow-sm">


        <div class="card-header">

            @section('card-header')
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

                                <button class="btn btn-dark"
                                        type="submit"
                                        onclick="return confirm('{{ __('Are you sure you want to remove the ":name" document', ['name' => $document->name]) }}')"
                                >
                                    Delete
                                </button>
                            </form>
                        @endcan
                    @endif

                </h4>
            @endsection


            @yield('card-header')

        </div>

        @if(empty($action))
            @php
                $action = route($document->id ? 'admin.documents.update' : 'admin.documents.store', $document)
            @endphp
        @endif

        <x-form class="needs-validation"
                :action="$action"
                enctype="multipart/form-data"
                novalidate
        >

            <div class="card-body">

                <x-form-input id="name"
                              name="name"
                              :value="$document->name"
                              :placeholder="__('Name')"
                              :label="__('Name')"
                              :required="true"
                />

                <x-form-input
                    :label=" $document->hasFileDocument() ? $document->getFileDocument()->file_name :__('Document file')"
                    id="file"
                    type="file"
                    name="file"
                    accept=".doc,.docx,.pdf,.xls,.xlsx"
                    :required="!$document->hasFileDocument()"
                >
                    <x-slot name="help">
                        @if($document->hasFileDocument())
                            <a class="w-100 mt-2 btn btn-dark" href="{{ route('admin.documents.show', $document) }}">Download
                                file</a>
                        @endif
                    </x-slot>
                </x-form-input>


                @if(!$categories->isEmpty())
                    <hr class="my-4">

                    <x-form-group :label="__('Category')">
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

            <div class="card-footer d-flex align-items-center">

                @section('card-footer')
                    <a class="btn btn-secondary btn btn-lg d-flex align-items-center"
                       href="{{ route('admin.documents.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                             class="bi bi-chevron-left mr-3" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                        <span>{{ __('Back') }}</span>

                    </a>
                    <button class="btn btn-dark btn-lg ml-auto" style="min-width: 250px;">Save</button>
                @endsection

                @yield('card-footer')

                @if(!empty($document->id))
                    @method('patch')
                @endif

                @csrf

            </div>

        </x-form>
    </div>
</x-app-layout>
