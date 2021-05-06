@extends('documents.edit',[
    'action' => route($document->id ? 'admin.realEstates.documents.update' : 'admin.realEstates.documents.store', [$realEstate, $document])
])

@section('header')
<h2 class="h4 font-weight-bold">
    {{ __('Real estates') }} / {{ __('Documents') }}
</h2>
@endsection

@section('card-header')
    <h4 class="mb-0 d-flex align-items-center justify-content-between">
        @if($document->id)
            {{ __('Edit document of') }} "{{ $realEstate->name | title }}" {{ __('real estate') }}:  {{ $document->name | title }}
        @else
            {{ __('Create new document for') }} "{{ $realEstate->name | title }}" {{ __('real estate') }}

        @endif

        @if($document->getKey())
            @can('delete', $document)
                <form method="post" action="{{ route('admin.realEstates.documents.destroy', [$realEstate, $document]) }}">
                    @method('delete')
                    @csrf

                    <button class="btn btn-dark" type="submit">
                        Delete
                    </button>
                </form>
            @endcan
        @endif

    </h4>
@endsection


@section('card-footer')
    <a class="btn btn-secondary btn btn-lg d-flex align-items-center"
       href="{{ route('admin.realEstates.edit', $realEstate) }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
             class="bi bi-chevron-left mr-3" viewBox="0 0 16 16">
            <path fill-rule="evenodd"
                  d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
        </svg>
        <span>{{ __('Back') }}</span>

    </a>
    <button class="btn btn-dark btn-lg ml-auto" style="min-width: 250px;">Save</button>
@endsection
