<x-guest-layout title="Residenze 1 - der Hammer">
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
                                            <h2><strong> Residenze 1 -„der Hammer”</strong></h2>
                                            <br>
                                            <p>Suchen Sie nach etwas ganz Besonderem? Diese Unterkunft bietet all denen das gewisse Extra, die auf der Suche nach historischem Flair sind. Die Decke, der Boden und der Wandschrank des Hauptzimmers, inklusive des Familienwappens der ursprünglichen Besitzer, sind im typischen Engadiner Holz Stil handgefertigt. Der Kaminofen wird auch nach dem Bauprozess erhalten bleiben, um seinen ursprünglichen Platz in dieser Unterkunft zu wahren.
                                                In der Küche, die über einzigartige doppelt gewölbte Decken und alte Haken zur einstigen Trocknung von Fleisch verfügt, entdeckten wir original handgefertigte und wunderschöne Fliesen, die es unbedingt zu erhalten galt.
                                                Das Anwesen verfügt außerdem über einen weiteren Kaminofen, der damals zur Herstellung von Käse verwendet wurde. Auch dieser bleibt dem Objekt selbstverständlich erhalten. Zu guter Letzt ist die riesige Sonnenterrase ein wahres Goldstück; 55 m<sup>2</sup> Terrasse mit besten Panoramablick.
                                            </p>
                                            <p>
                                                Durch den respektvollen Umgang mit dem „Alten“ und der Integration von modernem Design wird anregend-gemütliches Wohnen in dem Hauptgebäude realisiert. Direkt hinter dem Eingang befindet sich die Wohn- und Kochlandschaft, die sich auf etwa 28 m<sup>2</sup> aufteilt. Direkt im Anschluss an diesen Bereich befindet sich die frei begehbare Aussichtsterrasse, von der das atemberaubende Panorama genossen werden kann.
                                                Auf der Südseite mit einer Fläche von ca. 43 m<sup>2</sup> bleibt die Ursprünglichkeit des Raumgefüges erhalten und bietet die Möglichkeit einen Master-Raum mit 1 oder 2 Zimmern zum Arbeiten oder Schlafen herzurichten. Das 7 m<sup>2</sup> große Badezimmer ist auf der Nordseite ausgestattet.
                                            </p>
                                            <p>
                                                Residenz 1
                                                <br>
                                                • 1.OG – Ca. 78 m<sup>2</sup> Wohnfläche  - Südwest Ausrichtung  - Ca. 55 m<sup>2</sup> großer Privatgelegener Terasse - Stauraum #1 (6 m<sup>2</sup>) - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
                                                <br>
                                                • Optional: Parkplatz in nahegelegenen öffentlichen Garage (CHF 8.000,-).
                                            </p>
                                            <!-- Overlay -->
                                            <section class="animated bounceInLeft">
                                                <p><button id="trigger-overlay" type="button">Klicken Sie hier für die Preise</button></p>
                                            </section>
                                            <!-- Overlay -->
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
