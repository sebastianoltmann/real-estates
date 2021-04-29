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
                        <form method="post" action="{{ route('documents.destroy', $document) }}">
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
                :action="route($document->id ? 'documents.update' : 'documents.store', $document)"
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

                @if(!$users->isEmpty())
                    <hr class="my-4">
                    <x-form-group x-data="users()">
                        <p class="d-flex align-items-center justify-content-between">
                            {{ __('Document users') }}
                            <button class="btn btn-secondary" type="button" @click="toggleCheck"
                                    x-text="label"></button>
                        </p>

                        @foreach($users as $u)
                            <x-form-checkbox :id="'users_'.$u->uuid"
                                             :name="'users[]'"
                                             :value="$u->uuid"
                                             :checked="$document->users && $document->users->contains($u)"
                                             x-model="selectedUsers"
                                             autocomplete="off"
                                             :label="sprintf('%s (%s)', $u->name, $u->email)"
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

    <script>
        function users() {
            return {
                users: {!! $users->pluck('uuid')->toJson() !!},
                selectedUsers: [{!! $document->users ? $document->users->pluck('uuid')->toJson() : null !!}],
                label: 'Enable for all',
                toggleCheck() {
                    if (this.users.length !== this.selectedUsers.length) {
                        this.selectedUsers = this.users;
                        this.label = 'Disable for all';
                    } else {
                        this.selectedUsers = []
                        this.label = 'Enable for all';
                    }
                },
            }
        }
    </script>
</x-app-layout>
