<tr class="document-table-row @if($document->trashed())d-none @endif">
    <td class="document-table-column">
        {{ $user->currentProject->alias | upper }} {{ $category->id }}
        .{{ $document->id }}
    </td>
    <td class="document-table-column">
        {{ $document->name }}
    </td>
    <td class="document-table-column text-right">
        @if($user->hasProjectPermission(\App\Services\Permissions\Permission::DOCUMENT_READ()->getValue()))
            <a href="{{ route('documents.show', $document) }}" class="btn btn-link" target="_blank">
                Download
            </a>
        @endif
        @if($user->hasProjectPermission(\App\Services\Permissions\Permission::DOCUMENT_UPDATE()->getValue()))
            <a href="{{ route('documents.edit', $document) }}" class="btn btn-link">
                Edit
            </a>
        @endif
        @if($user->hasProjectPermission(\App\Services\Permissions\Permission::DOCUMENT_UPDATE()->getValue()))
            <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#document-modal-{{ $document->getUuidKey() }}">Delete
            </button>
    @endif

    <!-- Modal -->
        <div wire:ignore.self class="modal fade" id="document-modal-{{ $document->getUuidKey() }}" tabindex="-1" role="dialog"
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
    </td>
</tr>
