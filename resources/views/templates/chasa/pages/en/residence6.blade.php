<x-guest-layout title="Residence 6 - one step away from the very Top">
    <div class="content-fluid">

        <div class="row no-gutter header_residence" style="background-color: #727272; min-height: 100vh;">


            <div class="col-sm-6 col-lg-6 col-md-6">
                <div class="col-height">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="flex-column article-left-p">
                                    <div class="p-1 animated bounceInLeft">
                                        <div class="myBoxResidence">
                                            <h2><strong> Residence 6 - one step away from the very Top.</strong></h2>
                                            <br/>
                                            <p>A big “Wow” in panoramas; Offering the best views towards the North,
                                                South and the Castle due to its location just under the top floor and
                                                its big windows on both sides, not to forget the 2 characteristic
                                                balconies on the South front.
                                                Modern living meets history in this part of the building which was
                                                partly destroyed during the village fire in 1921 resulting in a flexible
                                                living-working-sleeping-cooking and bathroom space of about
                                                80m<sup>2</sup> with huge new glass windows on the North side and the
                                                typical Engadin windows plus balcony on the South side.
                                            </p>
                                            <p>
                                                An interesting feature is the connecting room of about 16m<sup>2</sup>
                                                in the old main building including stone walls and again a South
                                                oriented panorama balcony.
                                                A new kitchen and bathroom unit is positioned in the centre of the space
                                                leaving flexibility to position the active living areas either to the
                                                North or the South.
                                                Use of the central washing and drying facilities in the basement is
                                                standard. Option for fireplace available.
                                                Limited drive-in facility on the ground floor for loading/unloading.
                                            </p>
                                            <p>
                                                Residence approx. 95m<sup>2</sup> with South-West location. Two
                                                balconies on the front with South orientation approx. 4m<sup>2</sup>
                                                Private indoor storage with arched ceiling #6 approx. 7m<sup>2</sup>.
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
            <div class="col-sm-6 col-lg-6 col-md-6">
                <div class="col-height">
                    <section class="gallery-block cards-gallery">
                        <!--<a href="#"><img src="img/gallery_icon.png"  class="img-fluid" width="10%" height="auto">  see gallery penthouse </a>-->
                        <div class="container">
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/6/floorplan.jpg') }}" class="img-fluid"
                                 style="margin-top:15vw;" width="98%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/6/floorplan.jpg') }}"><img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}" class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/6/gallery/1.jpg') }}"></a>
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
