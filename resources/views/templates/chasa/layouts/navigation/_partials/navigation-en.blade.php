<div id="menuhidden">
    <nav class="navbar-my fixed-top animated fadeInDown">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('themes/chasa/assets/img/ChasaChau-Logo.png') }}" width="160"
                 class="d-inline-block align-top " alt="ChasaCHAU">
        </a>
    </nav>
</div>

<div id="menu" @if(request()->routeIs('pages.index'))style="display: none" @endif>

    <nav
        class="navbar navbar-fixed-top navbar-expand-lg navbar-light bg-primary justify-content-between fixed-top animated fadeInDown">
        {{--
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        --}}

        <a class="navbar-brand"
           href="{{ request()->routeIs('pages.index') ? url('page/7-objectsDart') : route('pages.index') }}">
            <img src="/themes/chasa/assets/img/ChasaChau-Logo.png"
                 class="d-inline-block align-top img-responsive"
                 alt="ChasaCHAU">

        </a>
        <div class="welcome-left animated bounce @if(!request()->routeIs('pages.index'))d-none d-lg-block @endif">
            <ul class="navbar-nav flex-column ml-5">
                <li class="nav-item">
                    <x-jet-nav-link href="{{ url('page/7-objectsDart') }}"
                                    :active="request()->is('page/7-objectsDart')">
                        {{ __("7 Objects D'art") }}
                    </x-jet-nav-link>
                    @if(request()->is('page/7-objectsDart', 'page/welcome'))
                        <x-jet-nav-link href="{{ url('page/welcome') }}"
                                        :active="request()->is('page/welcome')">
                            {{ __('Welcome') }}
                        </x-jet-nav-link>
                    @endif
                </li>
            </ul>
        </div>


        @if(!request()->routeIs('pages.index'))
            <div class="navbar-collapse collapse justify-content-end animated bounceIn" id="collapsingNavbar">
                <ul class="navbar-nav">
                    <x-jet-nav-link href="{{ url('page/7-objectsDart') }}"
                                    :active="request()->is('page/7-objectsDart')"
                                    class="d-lg-none"
                    >
                        {{ __("7 Objects D'art") }}
                    </x-jet-nav-link>
                    @if(request()->is('page/7-objectsDart', 'page/welcome'))
                        <x-jet-nav-link href="{{ url('page/welcome') }}"
                                        :active="request()->is('page/welcome')"
                                        class="d-lg-none">
                            {{ __('Welcome') }}
                        </x-jet-nav-link>
                    @endif


                    <x-jet-nav-link href="{{ url('page/secret') }}"
                                    :active="request()->is('page/secret')">
                        {{ __('Secret') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ url('page/history') }}"
                                    :active="request()->is('page/history')">
                        {{ __('History') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ url('page/vivre-a-la-carte') }}"
                                    :active="request()->is('page/vivre-a-la-carte')">
                        {{ __('Vivre a la carte') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ url('page/gallery') }}"
                                    :active="request()->is('page/gallery')">
                        {{ __('Residences') }}
                    </x-jet-nav-link>
                </ul>
            </div>
        @endif

        @if(!request()->routeIs('pages.index'))
            <div class="nav navbar-nav navbar-contact flex-column animated bounceIn ml-auto ml-lg-0">
                <ul class="navbar-nav">
                    {{--
                    <ul class="navbar-nav">

                         <li class="nav-item">
                             <a class="nav-link" href="secret.html">Secret</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="history.html" data-toggle="collapse">History</a>
                         </li>
                         <li class="nav-item">
                             <a class="nav-link" href="vivre_a_la_carte.html" data-toggle="collapse">Vivre a la carte</a>
                         </li>
                     </ul>
                     --}}

                    <x-jet-nav-link href="{{ url('page/contact') }}"
                                    :active="request()->is('page/contact')">
                        <i class="fa fa-envelope"></i>
                    </x-jet-nav-link>
                </ul>
            </div>
        @endif
        {{--
                <ul class="nav navbar-nav hidden-sm-contact flex-column animated bounceIn">

                    <!-- Social media -->
                        <li class="nav-item dropdown"><a class="nav-link p-1" id="socialmedia" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">
                            <i class="fa fa-share-alt"></i></a>

                            <ul class="dropdown-menu sub-menu-parent" aria-labelledby="socialmedia">

                                <li>
                                    <a data-original-title="Facebook" rel="tooltip"  href="#" class="btn btn-facebook" data-placement="left">
                                        <i class="fa fa-lg fa-facebook"></i>
                                    </a>
                                    <br/>
                                    <a data-original-title="Twitter" rel="tooltip"  href="#" class="btn btn-twitter" data-placement="left">
                                        <i class="fa fa-lg fa-twitter"></i>
                                    </a>
                                    <br/>
                                    <a data-original-title="Pinterest" rel="tooltip"  href="#"  class="btn btn-pinterest" data-placement="left">
                                        <i class="fa fa-lg fa-pinterest"></i>
                                    </a>
                                    <br/>
                                    <a data-original-title="Instagram" rel="tooltip"  href="#" class="btn btn-instagram" data-placement="left">
                                        <i class="fa fa-lg fa-instagram"></i>
                                    </a>
                                    <br/>
                                    <a data-original-title="LinkedIn" rel="tooltip"  href="#" class="btn btn-linkedin" data-placement="left">
                                        <i class="fa fa-lg fa-linkedin"></i>
                                    </a>
                                    <br/>
                                    <a data-original-title="Youtube" rel="tooltip"  href="#" class="btn btn-youtube" data-placement="left">
                                        <i class="fa fa-lg fa-youtube"></i>
                                    </a>
                                </li>

                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link p-1" href="contact.html"><i class="fa fa-envelope"></i></a></li>

                </ul>--}}

        @if(!request()->routeIs('pages.index'))
            <ul class="nav navbar-nav navbar-lang flex-column animated bounceIn">

                @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                    <x-jet-nav-link hreflang="{{ $localeCode }}"
                                    href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, request()->route()->parameters) }}"
                                    :active="LaravelLocalization::getCurrentLocale() === $localeCode">
                        {{ $localeCode | upper }}
                    </x-jet-nav-link>
                @endforeach
            </ul>


            <button class="navbar-toggler navbar-toggler-right collapsed" type="button"
                    data-toggle="collapse" data-target="#collapsingNavbar">
                <span> </span>
                <span> </span>
                <span> </span>
            </button>
        @endif
    </nav>
</div>
