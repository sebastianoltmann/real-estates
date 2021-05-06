<tr class="real-estate-table-row @if($realEstate->trashed())d-none @endif">
    <td class="real-estate-table-column">
        {{ $realEstate->id }}
    </td>
    <td class="real-estate-table-column">
        {{ $realEstate->name }}
    </td>
    <td class="real-estate-table-column">
        {{ $realEstate->getSlugKey() }}
    </td>
    <td class="real-estate-table-column">
        {{ $realEstate->type }}
    </td>
    <td class="real-estate-table-column">
        @if($realEstate->sold)
            @can('update', $realEstate->owner)
                <a href="{{ route('admin.users.edit', $realEstate->owner) }}">
                    @endcan
                    {{ $realEstate->owner->name }}

                    @can('update', $realEstate->owner)
                </a>
            @endcan

        @else
            --
        @endif

    </td>
    <td class="real-estate-table-column text-center">
        <span class="w-100 py-1 badge text-white bg-{{ $realEstate->sold ? 'danger' : 'success' }}">
            {{ __($realEstate->sold ? 'Sold' : 'Available') }}
        </span>

    </td>
    <td class="real-estate-table-column">
        {{ $realEstate->created_at }}
    </td>
    <td class="real-estate-table-column text-right">
        @can('update', $realEstate)
            <a href="{{ route('admin.realEstates.edit', $realEstate) }}" class="btn btn-secondary">
                Edit
            </a>
        @endcan

        @can('delete', $realEstate)
            <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#users-modal-{{ $realEstate->getUuidKey() }}">Delete
            </button>

            <!-- Modal -->
            <div wire:ignore.self class="modal fade" id="users-modal-{{ $realEstate->getUuidKey() }}" tabindex="-1"
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
