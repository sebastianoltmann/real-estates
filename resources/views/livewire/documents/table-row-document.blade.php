<tr class="document-table-row @if($document->trashed())d-none @endif">
    <td class="document-table-column">
        {{ $document->alias }}
    </td>
    <td class="document-table-column">
        {{ $document->name }}
    </td>
    <td class="document-table-column text-right">
        @can('view', $document)
            <a href="{{ route('admin.documents.show', $document) }}" class="btn btn-dark" target="_blank">
                Download
            </a>
        @endcan
        @can('update', $document)
            <a href="{{ route('admin.documents.edit', $document) }}" class="btn btn-secondary">
                Edit
            </a>
        @endcan

        @can('delete', $document)

            <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#document-modal-{{ $document->getUuidKey() }}">Delete
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="document-modal-{{ $document->getUuidKey() }}" tabindex="-1"
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
    </td>
</tr>
