<x-guest-layout title="Residenze 3 - das Herzstück">
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

                                            <h2><strong> Residenze 3 - das Herzstück</strong></h2>
                                            <br>
                                            <p>Aufgrund der exklusiven Lage im Herzen des Hauptgebäudes und nicht zuletzt aufgrund seines wunderschönen Balkons, war diese Wohnung die erste Anlaufstelle für VIP Gäste im Vergangenheit. Für die Zukunft ist geplant, dass diese Residenz der Mittelpunkt des Hauses bleibt. Der Großteil der Features soll beibehalten werden.
                                            </p>
                                            <p>
                                                Hier werden die jahrhundertealten Balken des ursprünglichen Gebäudes erneut verwendet. Somit bleibt ein weiteres Stück der Geschichte des Hauses erhalten. Sichtbar sind diese im Wohnbereich. Auch der schöne und typische Engadiner Wandschrank bleibt an seinem Platz, wo wir ihn unter dicken Staubschichten einst aufspürten.
                                                Der Balkon im Nordwesten ist nicht nur ein großartiger Ort für ein romantisches Dinner im Freien, sondern ermöglicht Ihnen zudem den Zugang zur höher gelegenen Ebene des Gartens, welcher sich hinter dem Hauptgebäude befindet. Beide Balkone bieten außerdem einen herrlichen Panoramablick auf die südwestlichen Alpen.
                                            </p>
                                            <p>
                                                Auch hier wurde modernes Leben zwischen mehr als 60 cm dicken originellen Wänden eingerichtet.
                                                Gleich hinter dem Eingang befindet sich der schöne Wohn- und Kochbereich, der sich mit seinen jahrhundertealten Balken über etwa 30 m<sup>2</sup> erstreckt. In direkter Anbindung an den Wohn- und Kochbereich befindet sich der beeindruckende Balkon.
                                                Auf der Südseite gibt es ca. 43 m<sup>2</sup> Raum, der sich zum Wohnen, Leben, Arbeiten oder Schlafen auf zwei bis drei Zimmer aufteilen lässt. Auf der Nordseite befindet sich das 7 m<sup>2</sup> große Badezimmer.
                                            </p>
                                            <p>
                                                Residenz 3
                                                <br>
                                                • 2.OG - Ca. 80 m<sup>2</sup> Wohnfläche  - Südwest Ausrichtung  - Ca. 10 m<sup>2</sup> großer Privatgelegener Terasse - Eine nach Westen ausgerichtete Balkone - Stauraum #3 mit gewölbten Decken  (6 m<sup>2</sup>) - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
                                                <br>
                                                • Optional: Parkplatz in nahegelegenen öffentlichen Garage (CHF 8.000,-).
                                            </p>
                                            <!-- Overlay -->
                                            <section class="animated bounceInLeft">
                                                <p><button id="trigger-overlay" type="button">Klicken Sie hier für die Preise</button></p>
                                            </section>
                                            <br>
                                            <br>
                                            <br>
                                            <br>
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
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/floorplan.jpg') }}"
                                 class="img-fluid" style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/floorplan.jpg') }}">
                                    <img src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                         class="img-fluid img-responsive" width="30vh" height="auto"> see gallery
                                    penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/3/gallery/1.jpg') }}"></a>
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
