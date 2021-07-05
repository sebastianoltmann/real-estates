<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0 d-flex align-items-center justify-content-between">
                @if($user->id)
                    {{ __('Edit user:') }} {{ $user->full_name | title }}
                @else
                    {{ __('Create new user') }}

                @endif

                @if($user->getKey())
                    @can('delete', $user)
                        <form method="post" action="{{ route('admin.users.destroy', $user) }}">
                            @method('delete')
                            @csrf

                            <button class="btn btn-dark"
                                    type="submit"
                                    onclick="return confirm('{{ __('Are you sure you want to remove the ":name" user', ['name' => $user->full_name]) }}')"
                            >
                                Delete
                            </button>
                        </form>
                    @endcan
                @endif

            </h4>
        </div>

        <x-form class="needs-validation"
                :action="route($user->id ? 'admin.users.update' : 'admin.users.store', $user)"
                enctype="multipart/form-data"
                novalidate
        >

            <div class="card-body">

                <x-form-group>
                    <label class="d-block">
                        {{ __('Attention') }}
                    </label>

                    @foreach(\App\Services\Users\Attention::values() as $attention)
                        <x-form-radio :id="'attention'.$attention->getValue()"
                                      name="attention"
                                      :value="$attention->getValue()"
                                      :checked="$user->attention === $attention->getValue()"
                                      autocomplete="off"
                                      :label='__("fields.attention.values.{$attention->getValue()}")'
                                      :inline="true"
                        />
                    @endforeach
                </x-form-group>

                <x-form-input id="first_name"
                              name="first_name"
                              :value="$user->first_name"
                              :placeholder="__('First name')"
                              :label="__('First name')"
                              :required="true"
                />

                <x-form-input id="last_name"
                              name="last_name"
                              :value="$user->last_name"
                              :placeholder="__('Last name')"
                              :label="__('Last name')"
                              :required="true"
                />

                <x-form-input id="email"
                              name="email"
                              :value="$user->email"
                              :placeholder="__('Email')"
                              :label="__('Email')"
                              :required="true"
                />

                @if(!$projects->isEmpty())
                    <hr class="my-4">
                    <x-form-group>
                        <p class="d-flex align-items-center justify-content-between">
                            {{ __('Projects') }}
                        </p>

                        @foreach($projects as $project)
                            <x-form-checkbox :id="'project_'.$project->getUuidKey()"
                                             :name="'projects[]'"
                                             :value="$project->getUuidKey()"
                                             :checked="$user->projects && $user->projects->contains($project)"
                                             autocomplete="off"
                                             :label="$project->name"

                            >
                                <x-slot name="help">
                                    @can('update', $project)
                                        <a class="btn btn-sm btn-link d-inline-flex align-items-center"
                                           href="{{ route('admin.projects.show', $project) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pen mr-2" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                            </svg>

                                            Edit
                                        </a>
                                    @endcan
                                </x-slot>
                            </x-form-checkbox>
                        @endforeach

                    </x-form-group>

                @endif

                @if(!$realEstates->isEmpty())
                    <hr class="my-4">
                    <x-form-group>
                        <p class="d-flex align-items-center justify-content-between">
                            {{ __('Real estates') }}
                        </p>

                        @foreach($realEstates as $realEstate)
                            <x-form-checkbox :id="'real_estate'.$realEstate->getUuidKey()"
                                             :name="'real_estates[]'"
                                             :value="$realEstate->getUuidKey()"
                                             :checked="$user->ownRealEstates && $user->ownRealEstates->contains($realEstate)"
                                             autocomplete="off"
                                             :label="$realEstate->name"

                            >
                                <x-slot name="help">
                                    @can('update', $realEstate)
                                        <a class="btn btn-sm btn-link d-inline-flex align-items-center"
                                           href="{{ route('admin.realEstates.edit', $realEstate) }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                 fill="currentColor" class="bi bi-pen mr-2" viewBox="0 0 16 16">
                                                <path
                                                    d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                            </svg>

                                            Edit
                                        </a>
                                    @endcan
                                </x-slot>
                            </x-form-checkbox>

                        @endforeach
                    </x-form-group>
                @endif

            </div>

            <div class="card-footer d-flex align-items-center">
                <a class="btn btn-secondary btn btn-lg d-flex align-items-center"
                   href="{{ route('admin.users.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-chevron-left mr-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                    </svg>
                    <span>{{ __('Back') }}</span>

                </a>
                <button class="btn btn-dark btn-lg ml-auto" style="min-width: 250px;">Save</button>

                @if(!empty($user->id))
                    @method('patch')
                @endif

                @csrf

            </div>

        </x-form>
    </div>

</x-app-layout>
