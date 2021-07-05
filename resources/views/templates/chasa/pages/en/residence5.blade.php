<x-guest-layout title="Residence 5 - the real high life">
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

                                            <h2><strong> Residence 5 - the real high life.</strong></h2>
                                            <br/>

                                            <p>
                                                This residence is the ultimate choice for lovers of great views and
                                                outdoor life.
                                                The outstanding and spacious balcony (about 23m<sup>2</sup>)
                                                on the North-West edge of the building is not only an eye-catcher but
                                                due to its level 4 positioning, offers perfect panoramic views to the
                                                South-West
                                                including the Castle, the Not Vital sculpture garden, the entrance to
                                                the Vastur trail and of course the magnificent sunset behind the Alps in
                                                the West.
                                            </p>
                                            <p>
                                                Located on the front and top floor of the main building just under the
                                                Penthouse,
                                                it sits in a prominent position at the village entrance where modern
                                                living is realized between old and original walls often 60+cm thick.
                                                Just behind the entrance the living and cooking area is located on about
                                                32m<sup>2</sup> to gain easy access to the great balcony.
                                                On the South side there is space of about 46m<sup>2</sup> for 2 or
                                                eventually 3 rooms to work, live or sleep.
                                                The original and typical Engadin stove which was situated in this room
                                                will be retained.
                                            </p>
                                            <p>
                                                The bathroom of about 7m<sup>2</sup> is on the North side to keep all
                                                views clear for the great panoramas.
                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities are available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                            </p>
                                            <p>
                                                Residence approx. 85m<sup>2</sup> with South-West location. Private
                                                indoor storage with arched ceiling #5 approx. 7m<sup>2</sup>.
                                                Private Balcony approx. 23m<sup>2</sup>.
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
                        <div class="container">
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/floorplan.jpg') }}" class="img-fluid"
                                 style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/floorplan.jpg') }}"><img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                        class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/gallery/1.jpg') }}"></a>
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
