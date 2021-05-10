<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 mb-0 font-weight-bold d-flex align-items-center justify-content-between">
            {{ __('Users') }}

            @can('create', \App\Models\User::class)
                <a href="{{ route('admin.users.create') }}" class="ml-2 btn btn-dark">
                    {{ __('Create new user') }}
                </a>
            @endcan
        </h2>
    </x-slot>


        <div class="card shadow-sm mb-5">
            <div class="card-header">
                <h4 class="mb-0">
                    {{ __('Users') | title }}
                </h4>
            </div>

            <div class="card-body">
                @if(!$users->isEmpty())
                    <table class="table document-table table-borderless">
                        <thead>
                        <tr>
                            <th class="h5 font-weight-bolder document-table-column-id"
                                width="200px">{{ __('No.') }}</th>
                            <th class="h5 font-weight-bolder document-table-name">{{ __('Name') }}</th>
                            <th class="h5 font-weight-bolder document-table-name">{{ __('Email') }}</th>
                            <th class="h5 font-weight-bolder document-table-name">{{ __('Registered') }}</th>
                            <th class="h5 font-weight-bolder document-table-actions text-right">{{ __('Actions') }}</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            @livewire('users.table-row-user', [
                                'user' => $user,
                            ])
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
