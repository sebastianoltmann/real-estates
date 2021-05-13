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
                @can('viewAny', \App\Services\Documents\Models\Document::class)
                    <x-jet-nav-link href="{{ route('admin.documents.index') }}"
                                    :active="request()->routeIs('admin.documents.index', 'admin.documents.edit', 'admin.documents.create')">
                        {{ __('Documents') }}
                    </x-jet-nav-link>
                @endcan

                @can('viewAny', \App\Models\User::class)
                    <x-jet-nav-link href="{{ route('admin.users.index') }}"
                                    :active="request()->routeIs('admin.users.index','admin.users.create','admin.users.edit')">
                        {{ __('Users') }}
                    </x-jet-nav-link>
                @endcan

                @can('viewAny', \App\Services\RealEstates\Models\RealEstate::class)
                    <x-jet-nav-link href="{{ route('admin.realEstates.index') }}"
                                    :active="request()->routeIs('admin.realEstates.index', 'admin.realEstates.edit','admin.realEstates.create',
                                    'admin.realEstates.documents.create', 'admin.realEstates.documents.edit'
                                    )">
                        {{ __('Real estates') }}
                    </x-jet-nav-link>
                @endcan

                @can('viewAny-trash')
                    <x-jet-nav-link href="{{ route('admin.trash.index') }}"
                                    :active="request()->routeIs('admin.trash.index')">
                        {{ __('Trash') }}
                    </x-jet-nav-link>
                @endcan
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto align-items-baseline">
                <!-- Teams Dropdown -->
                @auth
                    @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                        <x-jet-dropdown id="teamManagementDropdown">
                            <x-slot name="trigger">
                                {{ Auth::user()->currentProject->name }}

                                <svg class="ml-2" width="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                     fill="currentColor">
                                    <path fill-rule="evenodd"
                                          d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z"
                                          clip-rule="evenodd"/>
                                </svg>
                            </x-slot>

                            <x-slot name="content">
                                <!-- Team Management -->
                                <h6 class="dropdown-header">
                                    {{ __('Manage project') }}
                                </h6>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link
                                    href="{{ route('admin.projects.show', ['project' => Auth::user()->currentProject]) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('admin.projects.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan


                                @php $projects = Auth::user()->allProjects(); @endphp
                                @if($projects->count() > 1)
                                    <hr class="dropdown-divider">
                                    <!-- Team Switcher -->
                                    <h6 class="dropdown-header">
                                        {{ __('Switch projects') }}
                                    </h6>

                                    @foreach (Auth::user()->allProjects() as $project)
                                        <x-jet-switchable-team :team="$project"/>
                                    @endforeach
                                @endif
                            </x-slot>
                        </x-jet-dropdown>
                    @endif
                @endauth
            <!-- Settings Dropdown -->
                @auth
                    <x-jet-dropdown id="settingsDropdown">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <img class="rounded-circle" width="32" height="32"
                                     src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}"/>
                            @else
                                {{ Auth::user()->name }}

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
                @endauth

                <x-jet-dropdown id="settingsDropdown">
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
