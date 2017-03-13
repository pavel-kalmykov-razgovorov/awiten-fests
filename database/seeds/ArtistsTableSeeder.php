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
                ['name' => 'Joris Voorn', 'soundcloud' => 'https://soundcloud.com/joris-voorn', 'website' => 'http://www.jorisvoorn.com/', 'country' => 'Holanda', 'permalink' => 'joris-voorn'],
                ['name' => 'Paco Osuna', 'soundcloud' => 'https://soundcloud.com/paco-osuna', 'website' => 'http://www.pacoosuna.com/', 'country' => 'España', 'permalink' => 'paco-osuna'],
                ['name' => 'Richie Hawtin', 'soundcloud' => 'https://soundcloud.com/richiehawtin', 'website' => 'http://plastikman.com/', 'country' => 'Canadá', 'permalink' => 'richie-hawtin'],
                ['name' => 'Carl Cox', 'soundcloud' => 'https://soundcloud.com/carl-cox', 'website' => 'http://www.carlcox.com/', 'country' => 'Estados Unidos', 'permalink' => 'carl-cox'],
                ['name' => 'Adam Beyer', 'soundcloud' => 'https://soundcloud.com/adambeyer', 'website' => 'http://www.drumcode.se/adambeyer.html', 'country' => 'Suecia', 'permalink' => 'adam-beyer'],
                ['name' => 'Marco Carola', 'soundcloud' => 'https://soundcloud.com/marcocarola', 'website' => 'https://www.residentadvisor.net/dj/marcocarola', 'country' => 'Italia', 'permalink' => 'marco-carola'],
                ['name' => 'Joseph Capriati', 'soundcloud' => 'https://soundcloud.com/joseph-capriati', 'website' => 'http://www.josephcapriati.com/', 'country' => 'Italia', 'permalink' => 'joseph-capriati'],
                ['name' => 'Loco Dice', 'soundcloud' => 'https://soundcloud.com/locodiceofc', 'website' => 'http://locodiceofc.tumblr.com/', 'country' => 'Alemania', 'permalink' => 'loco-dice'],
                ['name' => 'Paul Ritch', 'soundcloud' => 'https://soundcloud.com/paulritch', 'website' => 'http://www.paulritch.com/', 'country' => 'Francia', 'permalink' => 'paul-ritch'],
                ['name' => 'Pan-Pot', 'soundcloud' => 'https://soundcloud.com/pan-pot', 'website' => 'http://pan-pot.net/', 'country' => 'Alemania', 'permalink' => 'pan-pot'],
                ['name' => 'Armin van Buuren', 'soundcloud' => 'https://soundcloud.com/arminvanbuuren', 'website' => 'http://www.arminvanbuuren.com/', 'country' => 'Holanda', 'permalink' => 'armin-van-buuren'],
                ['name' => 'Paul van Dyk', 'soundcloud' => 'https://soundcloud.com/paulvandykofficial', 'website' => 'http://www.paulvandyk.com/', 'country' => 'Alemania', 'permalink' => 'paul-van-dyk'],
                ['name' => 'Sander van Doorn', 'soundcloud' => 'https://soundcloud.com/sandervandoorn', 'website' => 'http://www.sandervandoorn.com/', 'country' => 'Holanda', 'permalink' => 'sander-van-doorn'],
                ['name' => 'Don Diablo', 'soundcloud' => 'https://soundcloud.com/dondiablo', 'website' => 'http://www.dondiablo.com/', 'country' => 'Holanda', 'permalink' => 'don-diablo'],
                ['name' => 'Hardwell', 'soundcloud' => 'https://soundcloud.com/hardwell', 'website' => 'https://www.djhardwell.com/', 'country' => 'Holanda', 'permalink' => 'hardwell'],
                ['name' => 'Galantis', 'soundcloud' => 'https://soundcloud.com/wearegalantis', 'website' => 'http://www.wearegalantis.com/', 'country' => 'Suecia', 'permalink' => 'galantis'],
                ['name' => 'Coone', 'soundcloud' => 'https://soundcloud.com/coone', 'website' => 'http://www.djcoone.com/', 'country' => 'Bélgica', 'permalink' => 'coone'],
                ['name' => 'Zatox', 'soundcloud' => 'https://soundcloud.com/djzatox', 'website' => 'http://www.djzatox.com/', 'country' => 'Italia', 'permalink' => 'zatox'],
                ['name' => 'Brennan Heart', 'soundcloud' => 'https://soundcloud.com/brennanheart', 'website' => 'http://www.brennanheart.com/', 'country' => 'Holanda', 'permalink' => 'brennan-heart']

            ]
        );
    }
}
