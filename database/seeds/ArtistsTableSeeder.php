<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->delete();
        DB::table('artists')->insert(
            [
                ['name' => 'Joris Voorn', 'soundcloud' => 'https://soundcloud.com/joris-voorn', 'website' => 'http://www.jorisvoorn.com/', 'country' => 'Holanda'],
                ['name' => 'Paco Osuna', 'soundcloud' => 'https://soundcloud.com/paco-osuna', 'website' => 'http://www.pacoosuna.com/', 'country' => 'España'],
                ['name' => 'Richie Hawtin', 'soundcloud' => 'https://soundcloud.com/richiehawtin', 'website' => 'http://plastikman.com/', 'country' => 'Canadá'],
                ['name' => 'Carl Cox', 'soundcloud' => 'https://soundcloud.com/carl-cox', 'website' => 'http://www.carlcox.com/', 'country' => 'Estados Unidos'],
                ['name' => 'Adam Beyer', 'soundcloud' => 'https://soundcloud.com/adambeyer', 'website' => 'http://www.drumcode.se/adambeyer.html', 'country' => 'Suecia'],
                ['name' => 'Marco Carola', 'soundcloud' => 'https://soundcloud.com/marcocarola', 'website' => 'https://www.residentadvisor.net/dj/marcocarola', 'country' => 'Italia'],
                ['name' => 'Joseph Capriati', 'soundcloud' => 'https://soundcloud.com/joseph-capriati', 'website' => 'http://www.josephcapriati.com/', 'country' => 'Italia'],
                ['name' => 'Loco Dice', 'soundcloud' => 'https://soundcloud.com/locodiceofc', 'website' => 'http://locodiceofc.tumblr.com/', 'country' => 'Alemania'],
                ['name' => 'Paul Ritch', 'soundcloud' => 'https://soundcloud.com/paulritch', 'website' => 'http://www.paulritch.com/', 'country' => 'Francia'],
                ['name' => 'Pan-Pot', 'soundcloud' => 'https://soundcloud.com/pan-pot', 'website' => 'http://pan-pot.net/', 'country' => 'Alemania'],
                ['name' => 'Armin van Buuren', 'soundcloud' => 'https://soundcloud.com/arminvanbuuren', 'website' => 'http://www.arminvanbuuren.com/', 'country' => 'Holanda'],
                ['name' => 'Paul van Dyk', 'soundcloud' => 'https://soundcloud.com/paulvandykofficial', 'website' => 'http://www.paulvandyk.com/', 'country' => 'Alemania'],
                ['name' => 'Sander van Doorn', 'soundcloud' => 'https://soundcloud.com/sandervandoorn', 'website' => 'http://www.sandervandoorn.com/', 'country' => 'Holanda'],
                ['name' => 'Don Diablo', 'soundcloud' => 'https://soundcloud.com/dondiablo', 'website' => 'http://www.dondiablo.com/', 'country' => 'Holanda'],
                ['name' => 'Hardwell', 'soundcloud' => 'https://soundcloud.com/hardwell', 'website' => 'https://www.djhardwell.com/', 'country' => 'Holanda'],    
                ['name' => 'Galantis', 'soundcloud' => 'https://soundcloud.com/wearegalantis', 'website' => 'http://www.wearegalantis.com/', 'country' => 'Suecia'],
                ['name' => 'Coone', 'soundcloud' => 'https://soundcloud.com/coone', 'website' => 'http://www.djcoone.com/', 'country' => 'Bélgica'],
                ['name' => 'Zatox', 'soundcloud' => 'https://soundcloud.com/djzatox', 'website' => 'http://www.djzatox.com/', 'country' => 'Italia'],
                ['name' => 'Brennan Heart', 'soundcloud' => 'https://soundcloud.com/brennanheart', 'website' => 'http://www.brennanheart.com/', 'country' => 'Holanda']
 
            ]
        );
    }
}
