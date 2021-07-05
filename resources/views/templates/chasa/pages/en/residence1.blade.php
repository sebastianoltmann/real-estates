<x-guest-layout title="Residence 1 - simply the 'Hammer'">
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
                                            <h2><strong> Residence 1 - simply the “Hammer”. <span color="orange">Reservation</span></strong>
                                            </h2>
                                            <br/>

                                            <p>Looking for something very special? This Residence offers an
                                                extraordinary dwelling for those who want to savour pure history.
                                                The ceiling, floor and a wall cabinet in the master room are handcrafted
                                                in typical Engadin wood style including the family crest of the original
                                                owners. Also, the traditional stove will be secured to retain its
                                                position after the building process.
                                                In the kitchen space with its unique double arched ceiling and hooks for
                                                drying meat, we uncovered beautiful floor tiles showing many decades of
                                                hard work.
                                            </p>
                                            <p>
                                                Another stove used for making cheese is a beauty which we also plan to
                                                retain.
                                                Last but not least, the sunny XL terrace (55m<sup>2</sup>) at the front
                                                is worth a “million” - probably the best viewing terrace in Engadin.
                                                Cosy living in the front of the main building is realised by
                                                respectfully blending the old with the new.
                                                Behind the entrance, the living and cooking area of about
                                                28m<sup>2</sup> is planned to maintain a clear path to access the large
                                                viewing terrace.
                                                On the South side all spaces of about 43m<sup>2</sup> will retain the
                                                original look and features as much as possible to re-establish a master
                                                room with 1 or alternatively 2 rooms to work or sleep.
                                            </p>
                                            <p>

                                                The bathroom of about 7m<sup>2</sup> is on the North side to keep views
                                                clear for great panoramas.
                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities are available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                                Residence approx. 78m<sup>2</sup> with South-West location. Private
                                                indoor storage #1 approx. 6m<sup>2</sup>.
                                                Private terrace approx. 55m<sup>2</sup>.
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

                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/1/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/1/floorplan.jpg') }}">
                                    <img src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                         class="img-fluid img-responsive" width="30vh" height="auto">
                                    see gallery penthouse
                                </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/1/gallery/1.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/1/gallery/2.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/1/gallery/3.jpg') }}"></a>
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
