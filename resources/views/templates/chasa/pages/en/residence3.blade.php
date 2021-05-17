<x-guest-layout title="Residence 3 - still the heart of the matter">
    <div class="content-fluid">

        <div class="row no-gutter header_residence" style="background-color: #727272; min-height: 100vh;">
            <div class="col-sm-6">
                <div class="col-height">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="flex-column article-left-p">
                                    <div class="p-1 animated bounceInLeft">

                                        <div class="myBoxResidence">

                                            <h2><strong> Residence 3 - still the heart of the matter. <span
                                                        color="orange">Reservation</span></strong></h2>
                                            <br/>

                                            <p>Due to its location in the centre of the main building and its
                                                characteristic front balcony this was the place where the VIP guests
                                                originally stayed.
                                                In the future this residence will remain a central focus offering a
                                                balance of features.
                                                The century old beams of the original building are used here again, now
                                                clearly visible in the ceiling of the living area. Also,
                                                a beautiful and typical Engadin wall cabinet stays where it it was
                                                discovered under some layers of dust.
                                                The balcony on the North-West edge is not just a splendid space for a
                                                romantic outdoor dinner, but also enables
                                                entrance to the higher level of the garden behind the main building.
                                            </p>

                                            <p>
                                                Both balconies feature great panoramic views towards the South West
                                                Alps.
                                                Located in the very centre of the main building front, it is a key focal
                                                point when entering the village.
                                                Modern living is realized between old and original walls often 60+cm
                                                thick.
                                                Just behind the entrance the living and cooking area with its
                                                century-old beams is located on about 30m<sup>2</sup> to create a good
                                                connection with the outdoor life on the great balcony.
                                                On the South side there is space of about 43m<sup>2</sup> for 2 or
                                                alternatively 3 rooms to work, live or sleep.
                                                The bathroom of about 7m<sup>2</sup> is on the North side to keep all
                                                views clear for great panoramas.
                                            </p>

                                            <p>

                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities are available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                                Residence approx. 80m<sup>2</sup> with South-West location. Private
                                                indoor storage with arched ceiling #3 approx. 6m<sup>2</sup>.
                                                Two private balconies approx. 10m<sup>2</sup>
                                                Additional; parking space in nearby public garage (CHF 8.000,-)
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
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/floorplan.jpg') }}">
                                    <img src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                         class="img-fluid img-responsive" width="30vh" height="auto"> see gallery
                                    penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/gallery/1.jpg') }}"></a>
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
