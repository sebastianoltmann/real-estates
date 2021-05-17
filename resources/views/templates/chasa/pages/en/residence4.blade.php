<x-guest-layout title="Residence 4 - very attractive 'all-in' living">
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
                                            <h2><strong> Residence 4 - very attractive “all-in” living.</strong></h2>
                                            <br/>

                                            <p>This residence offers value for money in a most efficient way.
                                                A huge garden terrace of about 18m<sup>2</sup> on the North for splendid
                                                but sheltered outdoor life features great windows and a balcony on the
                                                South to enjoy best panoramic views towards the Inn-valley and the
                                                Italian Alps.
                                                In this part modern living also meets history; during the village fire
                                                in 1921 the East part of the
                                                building was mainly destroyed.
                                                We will re-use this empty stable to realize a flexible
                                                living-working-sleeping-cooking and bathroom space of about
                                                80m<sup>2</sup>.
                                            </p>
                                            <p>
                                                To maintain the link between old and new a room of about 15m<sup>2</sup>
                                                in the old main building including fat original stone walls is now
                                                connected to Residence 4.
                                                A new kitchen and bathroom unit is positioned in the centre of the space
                                                leaving you the flexibility to locate your active living either to the
                                                North or the South.
                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities are available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                            </p>
                                            <p>
                                                Residence approx. 93m<sup>2</sup> with North-South location. Private
                                                indoor storage with arched ceiling #4 approx. 5m<sup>2</sup>.
                                                Garden terrace of about 18m<sup>2</sup>
                                                Balcony on the front with South orientation approx. 2m<sup>2</sup>
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
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/4/floorplan.jpg') }}"
                                 class="img-fluid"
                                 style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/4/floorplan.jpg') }}">
                                    <img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                        class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/4/gallery/1.jpg') }}"></a>
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
