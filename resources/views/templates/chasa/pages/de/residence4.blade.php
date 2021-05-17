<x-guest-layout title="Residenze 4 - sehr attraktives All-In">
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
                                            <h2><strong> Residenze 4 - sehr attraktives „All-In“.</strong></h2>
                                            <br>

                                            <p>Im Angesicht des Preis-Leistungs-Verhältnisses, bietet Ihnen die Residenz 4 eine ganze Menge und dies mit hoher Effizienz.
                                                Eine ca. 18 m<sup>2</sup> große Gartenterrasse im Norden sorgt für herrliches, aber geschütztes Leben im Freien. Diese bietet, mit ihren tollen Fenstern und einem Balkon im Süden, den besten Panoramablick auf das Inntal und die Engadiner Dolomiten.
                                            </p>
                                            <p>
                                                In dieser einzigartigen Immobilie trifft auch das Moderne auf Historie.
                                                Während des Ortsbrandes im Jahre 1921 wurde der im Osten gelegene Teil des Gebäudes zum Großteil zerstört.
                                                Wir konnten diese leeren Stallungen jedoch restaurieren und einen vielseitigen Wohn-, Arbeits-, Schlaf- und Badbereich von ca. 80 m<sup>2</sup> schaffen. Um eine Verbindung zwischen alt und neu zu wahren, befindet sich noch ein 15 m<sup>2</sup> großer Verbindungsraum in originalen Hauptgebaude.
                                            </p>
                                            <p>
                                                Eine neue Bad- und Kücheneinheit ist zentral in diesem Objekt gelegen, um Ihnen die Freiheit zu gewähren, Ihr aktives Leben in Richtung Norden oder Süden dieser Immobilie auszurichten.
                                            </p>
                                            <p>
                                                Residenz 4
                                                <br>
                                                • 2.OG - Ca. 93 m<sup>2</sup> Wohnfläche  - Südnord Ausrichtung  - Ca. 18 m<sup>2</sup> große Gartenterrasse - Eine nach Süden ausgerichtete Balkone - Stauraum #4 mit gewölbten Decken  (5 m<sup>2</sup>) - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
                                                <br>
                                                • Optional: Parkplatz in nahegelegenen öffentlichen Garage (CHF 8.000,-).  Option für eine Cheminee ist gegeben
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
