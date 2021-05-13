@if(Auth::check() && Auth::user()->isAdmin())
    @include('layouts.navigation.navigation-admin')
@else
    @include('layouts.navigation.navigation')
@endif
