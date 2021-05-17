<x-guest-layout>
    <x-slot name="header">
        <h1><small class="font-weight-bolder">{{ $title }}</small></h1>

        @include('components.breadcrumbs')
    </x-slot>

    <p>
        YASKpro is based in beautiful Engadin - Switzerland. <br>
        Despite local love we are keen to do co-developments in England, Denmark and Poland.


    </p>

    <address>
        <strong>Switzerland</strong> <br>
        YASK.sa,<br>
        Chasa Sotvi 319,<br>
        7550 Scuol - CH<br>
        +41 (81) 84000750<br>
        <a href="mailto:Art@Yask.com">Art@Yask.com</a>
    </address>

</x-guest-layout>
