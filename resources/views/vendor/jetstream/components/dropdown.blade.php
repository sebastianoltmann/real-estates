@props(['id' => 'navbarDropdown', 'active', 'align'])

@php
    $classes = ($active ?? false)
                ? 'nav-link active font-weight-bolder'
                : 'nav-link';
    $dropdownAlignClass = !empty($align)
                            ? "dropdown-menu-{$align}"
                            : ''
@endphp

<li class="nav-item @if(!empty($content))dropdown @endif">
    @if(!empty($content))
        <a id="{{ $id }}" {!! $attributes->merge(['class' => $classes]) !!}
        role="button"
           data-toggle="dropdown"
           aria-expanded="false">
            @else
                <span id="{{ $id }}" {!! $attributes->merge(['class' => $classes]) !!}>
            @endif

            {{ $trigger }}

            @if(!empty($content))
        </a>
        @else
        </span>
    @endif


    @if(!empty($content))
        <div class="dropdown-menu animate slideIn {{ $dropdownAlignClass }}" aria-labelledby="{{ $id }}">
            {{ $content }}
        </div>
    @endif
</li>
