<nav class="navbar navbar-expand-md navbar-light bg-white border-bottom sticky-top">
    <div class="container">
        <!-- Logo -->
        <a class="navbar-brand mr-4" href="/">
            <x-jet-application-mark width="36"/>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto align-items-center">
                <x-jet-nav-link href="{{ route('pages.index') }}"
                                :active="request()->routeIs('pages.index')">
                    {{ __('AlbGrisch') }}
                    <small class="d-block">Sent - Switzerland</small>
                </x-jet-nav-link>

                <x-jet-dropdown id="about"
                                :active="request()->is('page/5-objets-dart*')">
                    <x-slot name="trigger">
                        {{ __('5 Objets D’art') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/5-objets-dart') }}"
                                             :active="request()->is('page/5-objets-dart')">
                            {{ __('5 Objets D’art') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/5-objets-dart/the-chasa') }}"
                                             :active="request()->is('page/5-objets-dart/the-chasa')">
                            {{ __('The Chasa') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/5-objets-dart/lage') }}"
                                             :active="request()->is('page/5-objets-dart/lage')">
                            {{ __('Lage') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                <x-jet-dropdown id="geheimtipp"
                                :active="request()->is('page/geheimtipp*')">
                    <x-slot name="trigger">
                        {{ __('Geheimtipp ') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/geheimtipp') }}"
                                             :active="request()->is('page/geheimtipp')">
                            {{ __('Geheimtipp') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/geheimtipp/region') }}"
                                             :active="request()->is('page/geheimtipp/region')">
                            {{ __('Region') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/geheimtipp/sportangebot') }}"
                                             :active="request()->is('page/geheimtipp/sportangebot')">
                            {{ __('Sportangebot') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                <x-jet-dropdown :active="request()->is('page/vivre-a-la-carte*')">
                    <x-slot name="trigger">
                        {{ __('Vivre a la carte') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/vivre-a-la-carte') }}"
                                             :active="request()->is('page/vivre-a-la-carte')">
                            {{ __('Vivre a la carte') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/vivre-a-la-carte/baubeschrieb') }}"
                                             :active="request()->is('page/vivre-a-la-carte/baubeschrieb')">
                            {{ __('Baubeschrieb') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                @can('viewAny', \App\Services\RealEstates\Models\RealEstate::class)
                    <x-jet-nav-link href="{{ route('realEstates.index') }}"
                                    :active="request()->routeIs('realEstates.index')">
                        {{ __('Real estates') }}
                    </x-jet-nav-link>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto align-items-baseline">
                <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32"
                                     src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            @else
                                Account

                                <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <h6 class="dropdown-header small text-muted">
                                {{ __('Manage Account') }}
                            </h6>

                            <x-jet-dropdown-link
                                href="{{ route(auth()->user()->isAdmin() ? 'admin.profile.show' : 'profile.show') }}">
                                {{ __('Profile') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <hr class="dropdown-divider">

                            <!-- Authentication -->
                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                {{ __('Log out') }}
                            </x-jet-dropdown-link>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                @else
                    <x-jet-nav-link href="{{ route('login') }}"
                                    :active="request()->routeIs('login')">
                        {{ __('Login') }}
                    </x-jet-nav-link>
                @endauth

                <x-jet-nav-link href="{{ url('page/contact') }}"
                                :active="request()->is('page/contact')">
                    {{ __('Contact') }}
                </x-jet-nav-link>

                <x-jet-dropdown id="settingsDropdown" align="right">
                    <x-slot name="trigger">
                        {{ LaravelLocalization::getCurrentLocale() | upper }}

                        @if(count(LaravelLocalization::getSupportedLocales()) > 1)
                        <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                        @endif
                    </x-slot>

                    @if(count(LaravelLocalization::getSupportedLocales()) > 1)
                    <x-slot name="content">
                        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            @if($localeCode !== LaravelLocalization::getCurrentLocale())
                                <x-jet-dropdown-link hreflang="{{ $localeCode }}"
                                                     href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, request()->route()->parameters) }}">
                                    {{ $localeCode | upper }}
                                </x-jet-dropdown-link>
                            @endif
                        @endforeach
                    </x-slot>
                    @endif
                </x-jet-dropdown>
            </ul>
        </div>
    </div>
</nav>
