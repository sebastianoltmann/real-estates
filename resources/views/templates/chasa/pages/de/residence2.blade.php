<x-guest-layout title="Residenze 2 - vom Mauerblümchen zum absoluten Hingucker">
    <div class="content-fluid">

        <div class="row no-gutter header_residence" style="background-color: #727272; min-height: 100vh;">
            <div class="col-sm-6">
                <div class="col-height">

                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="flex-column article-left-p">
                                    <div class="p-1 ontop  animated bounceInLeft">

                                        <div class="myBoxResidence">
                                            <h2><strong> Residenze 2 - vom Mauerblümchen zum absoluten Hingucker</strong></h2>
                                            <br>

                                            <p>
                                                Zweifellos war der Zustand dieser Residenz in jeder Hinsicht eine versteckte Schönheit. Tatsächlich ein wahres Mauerblümchen.
                                                Der Kellerbereich war mehr als verborgen, die Fenster verdunkelt, die erste Etage mit einer Menge Sperrholz verbarrikadiert, weshalb diese anfänglich nicht begehbar war. Doch diese Gegebenheiten zeigten sich als wahrer Antriebs-Booster für unsere Gestalter, sodass sie aus diesem Mauerblümchen sinnbildlich einen Strauß strahlender Blumen zauberten.
                                            </p>

                                            <p>
                                                Die jahrhundertealten Balken im Keller wurden geteilt, wodurch ein geräumiges Zwischengeschoss entstand und dem Raum so mehr Größe gegeben werden konnte.Die immense Schönheit des Naturfelsens im Keller wurde auf diese Art noch besser in Szene gesetzt.Auf der Südseite befinden sich die großen Fenster, die zwei Geschosse mit Tageslicht durchfluten.
                                                Das Resultat ist ein wahres Prachtstück, was unter anderem das Design betrifft!
                                            </p>

                                            <p>
                                                So wurden im Keller etwa 52 m<sup>2</sup> Wohn- und Arbeitsfläche geschaffen, zu welchen noch ein Badezimmer und Lagerfläche von ca. 7 m<sup>2</sup> gehören. Über die originelle Wendeltreppe erreichen Sie die zweite Ebene der Wohnung. Hier ist Raum für individuelles Wohnen und ein Blick auf das Südpanorama im Freien.
                                                In der oberen Etage befindet sich eine weitere Toilette und das Badezimmer, so dass noch mehr Raum (ca. 30 m<sup>2</sup>) zur flexiblen Nutzung zur Verfügung steht.
                                                Zu guter Letzt wurde noch ein 14 m<sup>2</sup> großes Zimmer vom alten Hauptgebäude zur Residenz hinzugefügt. Ein wahres Juwel, mit massiven Steinwänden und einer großzügig gewölbten Decke, die dem Raum noch mehr Größe verleiht.
                                            </p>
                                            <p>
                                                Residenz 2
                                                <br>
                                                • EG + 1.OG - Ca. 111 m<sup>2</sup>  Living  - Süd Ausrichtung  - Naturfels - Stauraum (4 m<sup>2</sup>) - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
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
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center;">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/floorplan.jpg') }}">
                                    <img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                        class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/gallery/1.jpg') }}"></a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/2/gallery/2.jpg') }}"></a>
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
