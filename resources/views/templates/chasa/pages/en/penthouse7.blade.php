<x-guest-layout title="Penthouse - probably the best">
    <div class="content-fluid">

        <div class="row col-12 no-gutter header_residence" style="background-color: #727272; min-height: 100vh;">
            <div class="col-sm-6">
                <div class="col-height">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="flex-column article-left-p">
                                    <div class="p-1 animated bounceInLeft">

                                        <div class="myBoxResidence">
                                            <h2><strong> Penthouse - probably the best</strong></h2>
                                            <br/>
                                            <p>Probably the best penthouse in the Engadin area; prominent location,
                                                sunshine from early morning till late evening, great panoramic terrace
                                                and traditional wooden roof construction as eye-catchers.
                                                <br/>
                                                <br/>No more words needed, just imagine how to live a great life here!
                                                <br>
                                                Spacious living and an entrance area of about 77m<sup>2</sup> with an
                                                open fire place and kitchen area on the West side including
                                                characteristic rounded windows and balcony door with old lifting wheel
                                                in the front.
                                            </p>
                                            <p>
                                                Great day light due to windows on the North and South side.
                                                <br/>On the East side a space of about 54m<sup>2</sup>
                                                for 2 bedrooms and a terrific bathroom with full facilities.
                                                <br/>
                                                <br/>
                                                In the centre a pure South oriented roof terrace of about
                                                12m<sup>2</sup>, fully private with stunning views over the village, the
                                                Inn-valley and the Italian Alps.
                                                <br/>
                                                In line with the status of a Penthouse; private elevator exit and
                                                private indoor parking are foreseen.
                                            </p>
                                            <p>
                                                Use of the central washing and drying facilities in the basement is
                                                standard, but connections for private laundry facilities in the
                                                penthouse are available.
                                            </p>
                                            <p>
                                                Penthouse approx. 131m<sup>2</sup> with South-West location on 5th
                                                floor.
                                                Roof terrace about 12m<sup>2</sup>.
                                                Option; parking indoor (CHF 30.000,-), parking outdoor (CHF 20.000,-) &
                                                parking in nearby public garage (CHF 8.000,-)
                                            </p>
                                            <!-- Overlay -->
                                            <section>
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
            <div class="col-lg-6 col-sm-6  gallerymobile">
                <div class="col-height">
                    <section class="gallery-block cards-gallery">
                        <!--<a href="#"><img src="img/gallery_icon.png"  class="img-fluid" width="10%" height="auto">  see gallery penthouse </a>-->
                        <div class="container">
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="98%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/floorplan.jpg') }}"><img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}" class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/1-1.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/1-2.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/3.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/4.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/5.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox" href="{{ asset('themes/chasa/assets/img/Residences/apartaments/7/gallery/6.jpg') }}"></a>
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
