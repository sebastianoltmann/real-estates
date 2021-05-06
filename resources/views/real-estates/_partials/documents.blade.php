<h5 class="d-flex align-items-center justify-content-between m-0">
    <span>{{ __('Documents') }}</span>
    <a class="btn-secondary btn" href="{{ route('admin.realEstates.documents.create', $realEstate) }}">
        {{ __('Add document') }}
    </a>
</h5>

@if(!$realEstate->documents->isEmpty())
    <div class="row">
        @foreach($documentCategories as $category)
            @php
                $documents = $category->documentsWithRealEstates->filter(function($doc) use ($realEstate){
                    return $realEstate->documents->contains($doc);
                })
            @endphp
            @if(!$documents->isEmpty())
                <div class="col-6 mt-3">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <h6 class="mb-0">{{ $category->name | title }}</h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                @foreach($documents as $document)
                                    <tr>
                                        <td>{{ $document->alias }}</td>
                                        <td>{{ $document->name }}</td>
                                        <td class="text-right">
                                            <div class="mb-0 d-flex align-items-center justify-content-end">
                                                @can('view', $document)
                                                    <a class="btn btn-sm btn-link"
                                                       href="{{ route('admin.documents.show', $document) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-cloud-arrow-down mr-2"
                                                             viewBox="0 0 16 16">
                                                            <path fill-rule="evenodd"
                                                                  d="M7.646 10.854a.5.5 0 0 0 .708 0l2-2a.5.5 0 0 0-.708-.708L8.5 9.293V5.5a.5.5 0 0 0-1 0v3.793L6.354 8.146a.5.5 0 1 0-.708.708l2 2z"/>
                                                            <path
                                                                d="M4.406 3.342A5.53 5.53 0 0 1 8 2c2.69 0 4.923 2 5.166 4.579C14.758 6.804 16 8.137 16 9.773 16 11.569 14.502 13 12.687 13H3.781C1.708 13 0 11.366 0 9.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383zm.653.757c-.757.653-1.153 1.44-1.153 2.056v.448l-.445.049C2.064 6.805 1 7.952 1 9.318 1 10.785 2.23 12 3.781 12h8.906C13.98 12 15 10.988 15 9.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 4.825 10.328 3 8 3a4.53 4.53 0 0 0-2.941 1.1z"/>
                                                        </svg>

                                                        Download
                                                    </a>
                                                @endcan
                                                @can('update', $document)
                                                    <a class="btn btn-sm btn-link"
                                                       href="{{ route('admin.realEstates.documents.edit', [$realEstate, $document]) }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                             fill="currentColor" class="bi bi-pen mr-2"
                                                             viewBox="0 0 16 16">
                                                            <path
                                                                d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z"/>
                                                        </svg>
                                                        Edit
                                                    </a>
                                                @endcan

                                                @can('delete', $document)
                                                    <form class="d-inline-flex align-items-center"
                                                          method="post"
                                                          action="{{ route('admin.realEstates.documents.destroy', [$realEstate,$document]) }}">
                                                        @method('delete')
                                                        @csrf
                                                        <button
                                                            class="btn btn-sm btn-link"
                                                            type="submit"
                                                            onclick="return confirm('{{ __('Are you sure you want to remove the ":name" document', ['name' => $document->name]) }}')"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                 height="16" fill="currentColor"
                                                                 class="bi bi-archive mr-2" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1V2zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5H2zm13-3H1v2h14V2zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z"/>
                                                            </svg>
                                                            Delete
                                                        </button>
                                                    </form>
                                                @endcan

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endif
