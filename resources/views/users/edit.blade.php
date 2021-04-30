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
                    {{ __('Edit user:') }} {{ $user->name | title }}
                @else
                    {{ __('Create new user') }}

                @endif

                @if($user->getKey())
                    @can('delete', $user)
                        <form method="post" action="{{ route('admin.users.destroy', $user) }}">
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
                :action="route($user->id ? 'admin.users.update' : 'admin.users.store', $user)"
                enctype="multipart/form-data"
                novalidate
        >

            <div class="card-body">

                <x-form-input id="name"
                              name="name"
                              :value="$user->name"
                              :placeholder="__('User name')"
                              :label="__('User name')"
                              :required="true"
                />

                <x-form-input id="email"
                              name="email"
                              :value="$user->email"
                              :placeholder="__('User email')"
                              :label="__('User email')"
                              :required="true"
                />

                @if(!$projects->isEmpty())
                    <hr class="my-4">
                    <x-form-group>
                        <p class="d-flex align-items-center justify-content-between">
                            {{ __('User projects') }}
                        </p>

                        @foreach($projects as $project)
                            <x-form-checkbox :id="'project_'.$project->getUuidKey()"
                                             :name="'projects[]'"
                                             :value="$project->getUuidKey()"
                                             :checked="$user->projects && $user->projects->contains($project)"
                                             autocomplete="off"
                                             :label="$project->name"

                            />
                        @endforeach

                    </x-form-group>

                @endif

            </div>

            <div class="card-footer text-right">
                <button class="btn btn-dark btn-lg" style="min-width: 250px;">Save</button>

                @if(!empty($user->id))
                    @method('patch')
                @endif

                @csrf

            </div>

        </x-form>
    </div>

</x-app-layout>
