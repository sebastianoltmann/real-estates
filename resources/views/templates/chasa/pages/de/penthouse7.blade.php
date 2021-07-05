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
                                            <br>
                                            <p>Vermutlich eines der schönsten Penthäuser im gesamten Engadin. Prominente Lage, Sonnenlicht von den frühen Morgen- bis in die späten Abendstunden, eine atemberaubende Panoramaterrasse und die Holzdachkonstruktion als absoluter Blickfang.
                                                <br>
                                                Großzügiger Living auf etwa 77 m<sup>2</sup>, inklusive Cheminee und einer nach Westen ausgerichteten Küche - charakteristisch die abgerundeten Laibungen der Fenster und Balkontür. Auf der Ostseite etwa 52 m<sup>2</sup> für zwei Schlafzimmer und ein fantastisches, voll ausgestattetes Badezimmer.
                                                Das Penthaus verfügt außerdem über eine nach Süden ausgerichtete Dachterrasse von 12 m<sup>2</sup>, absolut privat gelegen und mit einem außergewöhnlich schönen Blick auf das Dorf, das Tal und die Italienischen Alpen.
                                            </p>
                                            <p>
                                                Zur Luxusausstattung des Penthauses gehören ein eigener Ausgang des Aufzuges und ein privater Garagenstellplatz.
                                                Die Nutzung der zentralen Wasch- und Trocknungseinrichtungen ist selbstverständlich möglich, jedoch haben Sie die Möglichkeit, ihre eigenen Geräte über entsprechend vorinstallierte Anschlüsse im Penthouse anzuschließen.
                                            </p>
                                            <p>
                                                Use of the central washing and drying facilities in the basement is standard, but connections for private laundry facilities in the penthouse are available.
                                            </p>
                                            <p>
                                                Penthouse.
                                                <br>
                                                • 4.OG - Ca. 131 m<sup>2</sup> Wohnfläche  - Südwestliche Ausrichtung  - Fabelhafte 12 m<sup>2</sup> Dachterrasse - Privater Zugang zum Aufzug - Cheminee.
                                                <br>
                                                • Optional: Privater Garagenstellplatz (CHF 30.000,-) - Optional: Privater Außenstellplatz (CHF 20.000,-) - Optional: Parkplatz in öffentlichen Garage (CHF 8.000,-)
                                            </p>
                                            <!-- Overlay -->
                                            <section>
                                                <p><button id="trigger-overlay" type="button">Klicken Sie hier für die Preise</button></p>
                                            </section>
                                            <!-- Overlay -->
                                            <br>
                                            <br>
                                            <br>
                                            <br>
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
