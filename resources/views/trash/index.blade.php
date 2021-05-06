<x-app-layout>
    <x-slot name="header">
        <div class="d-flex align-items-center justify-content-between">
            <h2 class="h4 mb-0 font-weight-bold ">
                {{ __('Trash:') }} <small class="ml-2">{{ $resource | slug:' ' | title }}</small>
            </h2>

            @if(!empty($trashableModels))
                <div class="list-group list-group-horizontal">
                    @foreach($trashableModels as $modelKey => $model)
                        <a class="list-group-item py-1 @if($resource === $modelKey)active @endif"
                           style="text-decoration: none !important;"
                           href="{{ route('admin.trash.index', $modelKey) }}"
                        >
                            {{ $modelKey | slug:' ' | title }}
                        </a>
                    @endforeach
                </div>
            @endif
        </div>

    </x-slot>


    <div class="card shadow-sm mb-5">
        <div class="card-body">
            @if(!$models->isEmpty())
                <table class="table document-table table-borderless">
                    <thead>
                    <tr>
                    <tr>
                        <th>{{ __('No') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Deleted at') }}</th>
                        <th class="text-right">{{ __('Actions') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($models as $model)
                        <tr>
                            <td>{{ $model->getKey() }}</td>
                            <td>{{ ($model->name || $model->title || $model->fullName || $model->email) }}</td>
                            <td>{{ $model->deleted_at }}</td>
                            <td class="text-right">
                                @can('restore', $model)
                                    <form method="post"
                                          class="d-inline-block"
                                          action="{{ route('admin.trash.restore', compact('resource', 'model')) }}">
                                        @method('patch')
                                        @csrf
                                        <button class="btn btn-dark">{{ __('Restore') }}</button>
                                    </form>
                                @endcan

                                @can('forceDelete', $model)
                                    <form method="post"
                                          class="d-inline-block"
                                          action="{{ route('admin.trash.forceDelete', compact('resource', 'model')) }}">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-secondary"
                                                onclick="return confirm('{{ __('You are sure you want to permanently delete this entity') }}')"
                                        >{{ __('Force delete') }}</button>
                                    </form>
                                @endcan
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
                {{ $models->links() }}
            @else
                <div class="alert alert-info mb-0">
                    <p class="mb-0">
                        {{ __('No entries in the trash.') }}
                    </p>
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
