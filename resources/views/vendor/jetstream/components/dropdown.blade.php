@props(['id' => 'navbarDropdown', 'active', 'align'])

@php
    $classes = ($active ?? false)
                ? 'nav-link active font-weight-bolder'
                : 'nav-link';
    $dropdownAlignClass = !empty($align)
                            ? "dropdown-menu-{$align}"
                            : ''
@endphp

<li class="nav-item dropdown">
    <a id="{{ $id }}" {!! $attributes->merge(['class' => $classes]) !!} role="button" data-toggle="dropdown"
       aria-expanded="false">
        {{ $trigger }}
    </a>

    <div class="dropdown-menu animate slideIn {{ $dropdownAlignClass }}" aria-labelledby="{{ $id }}">
        {{ $content }}
    </div>
</li>
