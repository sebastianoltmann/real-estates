<x-guest-layout>
    <x-slot name="header">
        <h1><small class="font-weight-bolder">{{ $title }}</small></h1>

        @include('components.breadcrumbs')
    </x-slot>

    <p>
        Die Region war immer verbunden mit Wasser; sehr reines und reiches Wasser. <br>
        Nicht nur durch den Inn stromt das Wasser, aber rundum sprudeln über 20 Mineralquellen, <br>
        die in 1369 erstmals urkundlich erwähnt wurden. An die Dorfbrunnen kann das Mineralwasser selbst gekostet werden.
    </p>

    <p class="mb-0">
        Obwohl nicht allzulange her entschlossen bietet die Region absolut erstklassige Einrichtungen:
    </p>

    <ul>
        <li><a href="https://cseb.ch/" target="_blank">Ospidal</a> - Regionales Gesundheitszentrum mit alle Funktionalitäten;</li>
        <li><a href="https://www.bognengiadina.ch/de/baederlandschaft" target="_blank">Bogn Engiadina</a> - Wellness und Bäderlandschaft der Super Klasse;</li>
        <li><a href="http://www.schloss-tarasp.ch" target="_blank">Schloss-Tarasp</a> - Kultur durch die Augen von Not Vital;</li>
        <li><a href="https://www.muzeumsusch.ch" target="_blank">Muzeum Susch</a> - Moderne Kunst mit Grazyna Kulczyk;</li>
        <li><a href="https://www.aldier.ch/en/alberto-giacometti/alberto-giacometti-art-museum" target="_blank">Alberto Giacometti</a> - Museum mit Hotel;</li>
        <li><a href="http://www.hif.ch/" target="_blank">Hochalpin Institut Ftan</a> - Top bewertete Internationale Sportschule;</li>
        <li><a href="http://www.nationalpark.ch/en/" target="_blank">Schweizer Nationalpark</a> - Ein Unicum ;</li>
    </ul>
</x-guest-layout>
