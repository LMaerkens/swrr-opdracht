<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HuisjeSeeder extends Seeder
{
    /**
     * Vul de database met voorbeeldhuisjes.
     * Draai via: php artisan db:seed --class=HuisjeSeeder
     *
     * @return void
     */
    public function run()
    {
        // Verwijder bestaande data om dubbelen te voorkomen
        DB::table('huisjes')->truncate();

        // Voorbeeldhuisjes – geen foto (foto veld blijft null)
        $huisjes = [
            [
                'naam'        => 'Boswachterswoning',
                'locatie'     => 'Drenthe, Nederland',
                'prijs'       => 129.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Een rustieke woning midden in het Drents bos. Perfect voor gezinnen die willen genieten van de natuur. De woning heeft een grote tuin, een barbecue en een gezellige open haard.',
                'aantal'      => 8,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'naam'        => 'Strandhuisje Texel',
                'locatie'     => 'Texel, Noord-Holland',
                'prijs'       => 175.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Vlak bij het strand gelegen knus huisje met uitzicht op de Noordzee. Inclusief fietsen en een eigen terras. Ideaal voor een romantisch weekendje weg.',
                'aantal'      => 4,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'naam'        => 'Chalet de Ardennen',
                'locatie'     => 'Ardennen, België',
                'prijs'       => 210.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Luxe houten chalet in de heuvels van de Ardennen. Inclusief sauna, hottub en een prachtig uitzicht. Geschikt voor grote groepen en bedrijfsuitjes.',
                'aantal'      => 12,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'naam'        => 'Tiny House Veluwe',
                'locatie'     => 'Veluwe, Gelderland',
                'prijs'       => 89.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Duurzaam tiny house verscholen tussen de bomen op de Veluwe. Off-grid, maar met alle comfort. Ervaar de stilte en de natuur op zijn best.',
                'aantal'      => 2,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'naam'        => 'Watermolen Friesland',
                'locatie'     => 'Friesland, Nederland',
                'prijs'       => 155.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Historische watermolen omgebouwd tot prachtig vakantieverblijf. Direct aan het water, inclusief roeiboot en kano. Een unieke ervaring voor het hele gezin.',
                'aantal'      => 6,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
            [
                'naam'        => 'Villa Toscane',
                'locatie'     => 'Toscane, Italië',
                'prijs'       => 395.00,
                'periode'     => 'per nacht',
                'beschrijving'=> 'Statige villa omringd door wijngaarden in het hart van Toscane. Met zwembad, wijntuin en panoramisch terras. De ultieme Italiaanse vakantie-ervaring.',
                'aantal'      => 10,
                'foto'        => null,
                'created_at'  => now(),
                'updated_at'  => now(),
            ],
        ];

        // Voeg alle huisjes in één keer in
        DB::table('huisjes')->insert($huisjes);
    }
}
