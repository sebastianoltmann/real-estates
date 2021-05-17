<x-guest-layout title="Residenze 6 - einfach Wow">
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
                                            <h2><strong> Residenze 6 - einfach “Wow”.</strong></h2>
                                            <br>
                                            <p>
                                                Nur einen Steinwurf vom Gipfel entfernt und ein absoluter „WOW-Effekt“, was das Panorama betrifft!
                                                <br>
                                                Hier genießen Sie beste Aussichten in Richtung Nord, Süd und auf das unmittelbar nahegelegene Schloss. Der Grund hierfür sind die extra großen Fenster auf beiden Seiten, sowie die beiden charakteristischen Sonnenbalkone auf der Südseite.
                                            </p>
                                            <p>
                                                Modernes Leben trifft auf die Geschichte dieses wundervollen Anwesens.
                                                <br>
                                                Die Wohnung verfügt über einen flexiblen und vielseitig nutzbaren Wohn, - Schlaf und Kochbereich. Hinzu kommt noch ein
                                                Badezimmer, woraus sich ein gesamter Wohnbereich von etwa 80m<sup>2</sup> ergibt. Diese großzügige Wohnfläche wird von großen
                                                <br>
                                                Glasfenstern auf der Nordseite und die für den Engadin typischen trichterförmig eingelassenen Fenster und einem Balkon auf der Südseite unterstrichen.
                                            </p>
                                            <p>
                                                Ein weiteres interessantes Merkmal ist der direkt mit dem Hauptgebäude verbundene 16m<sup>2</sup> große Raum, welcher über authentische Steinwände und einen weiteren südlich ausgerichteten Panoramabalkon verfügt.
                                                <br>
                                                Eine neue Küchen- und Badeinheit befindet sich im Zentrum der Wohnung, sodass das aktive Leben nach Ihrem Belieben nach Norden oder Süden ausgerichtet werden kann.
                                            </p>
                                            <p>
                                                Residenz 6
                                                <br>
                                                • 3. OG - Ca. 95m<sup>2</sup> ohnfläche  - Südnord Ausrichtung  - Zwei nach Süden ausgerichtete Balkone -  Stauraum #6 mit gewölbten Decken 7m<sup>2</sup>
                                                - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
                                                <br>
                                                • Optional: Parkplatz in nahegelegenen öffentlichen Garage (CHF 8.000,-). Option für eine Cheminee ist gegeben
                                            </p>
                                            <!-- Overlay -->
                                            <section class="animated bounceInLeft">
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
