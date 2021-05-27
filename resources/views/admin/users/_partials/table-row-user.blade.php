<tr class="user-table-row @if($user->trashed())d-none @endif">
    <td class="user-table-column">
        {{ $user->id }}
    </td>
    <td class="user-table-column">
        {{ $user->full_name }}
    </td>
    <td class="user-table-column">
        <a href="mailto:{{ $user->email }}">
            {{ $user->email }}
        </a>
    </td>
    <td class="user-table-column">
        {{ $user->created_at }}
    </td>
    <td class="user-table-column text-right">
        @can('update', $user)
            <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-secondary">
                Edit
            </a>
        @endcan

        @if($user->id !== Auth::user()->id)

            @can('delete', $user)
                <button type="button" class="btn btn-danger" data-toggle="modal"
                        data-target="#users-modal-{{ $user->getUuidKey() }}">Delete
                </button>

                <!-- Modal -->
                <div wire:ignore.self class="modal fade" id="users-modal-{{ $user->getUuidKey() }}" tabindex="-1"
                     role="dialog"
                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete Confirm</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true close-btn">×</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure want to delete?</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close
                                </button>
                                <button type="button" wire:click.prevent="delete()" class="btn btn-danger close-modal"
                                        data-dismiss="modal">Yes, Delete
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
        @endif
    </td>
</tr>
