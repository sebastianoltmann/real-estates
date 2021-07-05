<x-guest-layout title="Residenze 5 - das wahre High Life">
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
                                            <h2><strong> Residenze 5 - das wahre High Life.</strong></h2>
                                            <br>

                                            <p>
                                                Dieses Anwesen ist das Nonplusultra für Outdoor Liebhaber und der großartigen Aussichten.
                                                Der außerordentlich großzügige Balkon, an der Nordwestseite des Gebäudes erstreckt sich über etwa 23m<sup>2</sup>)
                                                und ist somit nicht nur ein absoluter Blickfang, sondern durch seine Höhe im 4. Stockwerk auch noch ein hervorragender Punkt, um das herrliche Panorama zu genießen. Von hier lassen sich besonders gut das Schloss, der Not Vital Skulpturenpark, der Vastur-Trial und natürlich die wunderschönen Sonnenuntergänge im Westen der Alpen beobachten.
                                            </p>
                                            <p>
                                                An der Vorderseite, im obersten Stockwerk direkt unter dem Penthaus befindet sich dieses Schmuckstück, wo modernes Wohnen möglich ist, zwischen historischen und originären Wänden, welche teils dicker als 60 cm sind.
                                                Die Wohn- und Kochlandschaft verfügt über etwa 32m<sup>2</sup> und befindet sich direkt hinter dem Eingang des Objektes. Ein absoluter Mehrwert ist der direkte Zugang zum Balkon, der sich direkt an die Koch- und Wohnlandschaft anschließt. Auf der Südseite besteht die Möglichkeit zwei oder eventuell drei Räume zum Schlafen, Verweilen oder Arbeiten auf die gegebenen
                                                46m<sup>2</sup> zu verteilen. Der Kamin, welcher typisch für Engadin ist, bleibt dieser Fläche selbstverständlich erhalten.
                                                Auf der Nordseite befindet sich das 7m<sup>2</sup>
                                                große Badezimmer.
                                            </p>
                                            <p>
                                                Residenz 5
                                                <br>
                                                • 3.OG - Ca. 85m<sup>2</sup> Wohnfläche - Südwest Ausrichtung - Ca.23m<sup>2</sup> großer Privatgelegener Terasse - Stauraum #5 mit gewölbten Decken  (7 m<sup>2</sup>) - begrenzte Einfahrmöglichkeit im Erdgeschoss zum Be- und Entladen - benutzung der zentralen Wasch- und Trockenanlagen im Keller.
                                                <br>
                                                • Optional: Parkplatz in nahegelegenen öffentlichen Garage (CHF 8.000,-).
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
                        <div class="container">
                            <img src="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/floorplan.jpg') }}" class="img-fluid"
                                 style="margin-top:15vw;" width="90%" height="auto">


                            <div class="col-lg-12 col-sm-12" style="text-align:center">
                                <br/><br/>
                                <a href="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/floorplan.jpg') }}"><img
                                        src="{{ asset('themes/chasa/assets/img/gallery_icon.png') }}"
                                        class="img-fluid img-responsive" width="30vh"
                                        height="auto"> see gallery penthouse </a>
                            </div>

                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="card border-0 transform-on-hover">
                                        <a class="lightbox"
                                           href="{{ asset('themes/chasa/assets/img/Residences/apartaments/5/gallery/1.jpg') }}"></a>
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
