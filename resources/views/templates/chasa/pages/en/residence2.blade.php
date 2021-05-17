<x-guest-layout title="Residence 2 - from Wallflower to Sunflower">
    <div class="content-fluid">

        <div class="row no-gutter header_residence" style="background-color: #727272; min-height: 100vh;">
            <div class="col-sm-6">
                <div class="col-height">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="flex-column article-left-p">
                                    <div class="p-1 ontop  animated bounceInLeft">

                                        <div class="myBoxResidence">
                                            <h2><strong> Residence 2 - from Wallflower to Sunflower. <span
                                                        color="orange">Reservation</span></strong></h2>
                                            <br/>


                                            <p>
                                                No doubt the actual condition of this residence was in the best way a
                                                “hidden beauty”.
                                                The basement part was hard to reach, very dark due to sealed windows,
                                                the first floor level was locked away with all kinds of cheap plywood.
                                                This challenge must have aroused the fantasy of our designers; they
                                                transformed this lonely wallflower into a sparkling bouquet of
                                                sunflowers.
                                                The century old heavy beams in the basement are highlighted by cutting
                                                them half way creating a spacious mezzanine.

                                            </p>

                                            <p>
                                                The immense beauty of the natural rock in the basement is literally
                                                pointed up. The huge South front windows on the first floor are open to
                                                let the sun shine through two levels of unusual living.
                                                The result is a smile in design, creating an unusual cosy live and
                                                workspace of about 56m<sup>2</sup> in the basement with additional
                                                storage and toilet (about 7m<sup>2</sup>).
                                                Via the spiral staircase, you reach the upper level of the mezzanine
                                                with a great view over both the natural features of the living area and
                                                the South outdoor panorama.
                                                On the upper level, another toilet and bathroom are located leaving
                                                ample free space (about 30m<sup>2</sup>) for flexible use.

                                            </p>

                                            <p>
                                                Last but not least, an additional room of about 14m<sup>2</sup> from the
                                                old main building is added to the residence #2.
                                                A real jewel including original fat stone walls and a wide arched
                                                ceiling.
                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities are available.
                                                Option for fire-place available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                                Residence with mezzanine approx. 111m<sup>2</sup>, South location and
                                                Northern daylight via 2 wall-pits. Internal storage approx.
                                                4m<sup>2</sup>.
                                                Additional; parking space in a nearby public garage (CHF 8,000,-)
                                            </p>
                                            <!-- Overlay -->
                                            <section class="animated bounceInLeft">
                                                <p>
                                                    <button id="trigger-overlay" type="button">Click here for price
                                                    </button>
                                                </p>
                                            </section>
                                            <!-- Overlay -->
                                            <br/>
                                            <br/>
                                            <br/>
                                            <br/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <!-- Gallery -->
            <div class="col-lg-6 col-sm-6 gallerymobile">
                <div class="col-height">
                    <section class="gallery-block cards-gallery">
                        <!--<a href="#"><img src="img/gallery_icon.png"  class="img-fluid" width="10%" height="auto">  see gallery penthouse </a>-->
                        <div class="container">
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center;">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/floorplan.jpg') }}">
                                    <img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                        class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/gallery/1.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/gallery/2.jpg') }}"></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </section>

                </div>
            </div>
            <!-- Gallery End -->

        </div>
    </div>


    <div class="overlay overlay-hugeinc">
        <button type="button" class="overlay-close">Close</button>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    @livewire('chasa.residence-form')
                </div>
            </div>
        </div>
    </div>


</x-guest-layout>
