<x-guest-layout>
    <x-slot name="header">
        <h1><small class="font-weight-bolder">{{ $title }}</small></h1>

        @include('components.breadcrumbs')
    </x-slot>

    <div class="row">
        <div class="col">
            <address>
                <strong>OBJEKT</strong> <br>
                Chasa AlbGrisch, <br>
                Stron 129/131, <br>
                CH-7554 Sent.
            </address>
        </div>

        <div class="col">
            <address>
                <strong>PLANUNG</strong> <br>
                2021/2022
            </address>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <address>
                <strong>BAUHERR</strong> <br>
                CHAU sa, <br>
                Quadra Secha 95, <br>
                7556 Valsot – CH.
            </address>
        </div>

        <div class="col">
            <address>
                <strong>VERKAUF</strong> <br>
                Annamarie Piacente, <br>
                Via Maistra 10, <br>
                7500 St. Moritz – CH. <br>
                +41 81 413 06 36 <br>
                <a href="mailto:annamarie.piacente@lifestylehomes.ch">annamarie.piacente@lifestylehomes.ch</a>
            </address>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <address>
                <strong>REALISIERUNG</strong> <br>
                YASK.pro <br>
                Chasa Sotvi 319, <br>
                7550 Scuol – CH. <br>
                <a href="mailto:ronald@yask.ch">ronald@yask.ch</a>
            </address>
        </div>
    </div>

</x-guest-layout>
