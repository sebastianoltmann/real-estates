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
            <ul class="navbar-nav mr-auto">
                <x-jet-nav-link href="{{ url('page/realizing-dreams') }}"
                                :active="request()->is('page/realizing-dreams')">
                    {{ __('Realizing dreams') }}
                </x-jet-nav-link>

                <x-jet-dropdown id="about"
                                :active="request()->is('page/about*')">
                    <x-slot name="trigger">
                        {{ __('About') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/about') }}"
                                             :active="request()->is('page/about')">
                            {{ __('About') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/about/boutiques-only') }}"
                                             :active="request()->is('page/about/boutiques-only')">
                            {{ __('Boutique’s only') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/about/talents') }}"
                                             :active="request()->is('page/about/talents')">
                            {{ __('Talents') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/about/team') }}"
                                             :active="request()->is('page/about/team')">
                            {{ __('Team') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                <x-jet-dropdown id="pamperingProperties"
                                :active="request()->is('page/pampering-properties*')">
                    <x-slot name="trigger">
                        {{ __('Pampering Properties') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/pampering-properties') }}"
                                             :active="request()->is('page/pampering-properties')">
                            {{ __('Pampering Properties') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/pampering-properties/chasa-albgrisch') }}"
                                             :active="request()->is('page/pampering-properties/chasa-albgrisch')">
                            {{ __('Chasa AlbGrisch') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/pampering-properties/chasa-chau') }}"
                                             :active="request()->is('page/pampering-properties/chasa-chau')">
                            {{ __('Chasa Chau') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/pampering-properties/chasa-y') }}"
                                             :active="request()->is('page/pampering-properties/chasa-y')">
                            {{ __('Chasa Y') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>

                <x-jet-dropdown :active="request()->is('page/smart-lodging*')">
                    <x-slot name="trigger">
                        {{ __('Smart Lodging') }}
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ url('page/smart-lodging') }}"
                                             :active="request()->is('page/smart-lodging')">
                            {{ __('Smart Lodging') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/smart-lodging/friends-living') }}"
                                             :active="request()->is('page/smart-lodging/friends-living')">
                            {{ __('Friends living') }}
                        </x-jet-dropdown-link>
                        <x-jet-dropdown-link href="{{ url('page/smart-lodging/chillyhub') }}"
                                             :active="request()->is('page/smart-lodging/chillyhub')">
                            {{ __('ChillyHub') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto align-items-baseline">
                <!-- Settings Dropdown -->
                <x-jet-nav-link href="http://yask.com" target="_blank">
                    {{ __('Yask.com') }}
                </x-jet-nav-link>
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

                        <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                             fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </x-slot>

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
                </x-jet-dropdown>
            </ul>
        </div>
    </div>
</nav>
