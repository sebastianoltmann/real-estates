<x-guest-layout title="Residences">
    <div class="container-fluid" style="background-color: #727272;">
        <div class="row">
            <div class="col-sm-12">

                <section class="mobileversion">

                    <img src="{{ asset('themes/chasa/assets/img/background.jpg') }}"  id="container"  style="left:0; margin-left:0;width: 100%; height: auto;">
                    <ul class="residences">
                        <li class="marker p7" data-coordinates="757,314">
                            <a href="{{ url('page/penthouse7') }}" class="plus plus-white" title="Penthouse7"><i>+</i></a>
                        </li>
                        <li class="marker p6" data-coordinates="737,524">
                            <a href="{{ url('page/residence6') }}" class="plus plus-white" title="Residence6"><i>+</i></a>
                        </li>
                        <li class="marker p5" data-coordinates="828,854">
                            <a href="{{ url('page/residence5') }}" class="plus plus-white" title="Residence5"><i>+</i></a>
                        </li>
                        <li class="marker p4" data-coordinates="828,854">
                            <a href="{{ url('page/residence4') }}" class="plus plus-white" title="Residence4"><i>+</i></a>
                        </li>
                        <li class="marker p3" data-coordinates="828,854">
                            <a href="{{ url('page/residence3') }}" class="plus plus-white" title="Residence3"><i>+</i></a>
                        </li>
                        <li class="marker p2" data-coordinates="828,854">
                            <a href="{{ url('page/residence2') }}" class="plus plus-white" title="Residence2"><i>+</i></a>
                        </li>
                        <li class="marker p1" data-coordinates="828,854" >
                            <a href="{{ url('page/residence1') }}" class="plus plus-white" title="Residence1"><i>+</i></a>
                        </li>
                    </ul>
                </section>

                {{--
                <style>
                    /* These rules are for <add your description here> */

                    .hoverMap#Penthouse .mapLink {border: 2px outset #fa8c00;}
                    .hoverMap#Penthouse .mapLink.disableStuff {border: none; animation: none;}
                    .hoverMap#Penthouse:hover .mapLink {border: 2px outset #fa8c00;}

                    #Penthouse_1 { width: 150px; height: 81px; top: 234.992px; left: 1023.98px; border-radius: 100%; }



                </style>

                            <div class="hoverMap" id="Penthouse">
                                <img src="img/background.jpg" class="mapImage" />

                                <div class="overlay"></div>

                                <a class="mapLink" id="Penthouse_1" data-position.adjust.x="27" data-position.adjust.y="32" data-tooltip-atParent="true" title="Penthouse 7" href="#Penthouse 7">Penthouse7</a>
                            </div>

                            <div class="imageMapPop" id="Penthouse 7">
                                <p>Put something useful here.</p>
                            </div>

                --}}

            </div>
        </div>
    </div>
</x-guest-layout>
