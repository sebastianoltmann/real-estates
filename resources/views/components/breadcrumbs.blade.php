@if(!$breadcrumbs->isEmpty())
    <nav aria-label="breadcrumb" class="d-inline-block">
        <ol class="breadcrumb mb-0">
            @foreach($breadcrumbs as $breadcrumb)
            <li class="breadcrumb-item" @if($loop->last)aria-current="page" @endif>
                @if(!$loop->last)
                    <a href="{{ $breadcrumb['url'] }}">
                        @endif
                        {{ $breadcrumb['title'] }}
                        @if(!$loop->last)
                    </a>
                @endif
            </li>
            @endforeach
        </ol>
    </nav>
@endif
