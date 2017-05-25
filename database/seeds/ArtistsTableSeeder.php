<?php

use App\User;
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
        $managers_ids = array_flatten(User::where('typeOfUser', 'manager')->get(['id'])->toArray());

        DB::table('artists')->delete();
        DB::table('artists')->insert(
            [
                ['name' => 'Joris Voorn', 'soundcloud' => 'https://soundcloud.com/joris-voorn', 'website' => 'http://www.jorisvoorn.com/', 'country' => 'Holanda', 'permalink' => 'joris-voorn', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'DJ Tremor', 'soundcloud' => 'https://soundcloud.com/djtremoor', 'website' => 'http://www.pordede.com/', 'country' => 'España', 'permalink' => 'dj-tremor', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paco Osuna', 'soundcloud' => 'https://soundcloud.com/paco-osuna', 'website' => 'http://www.pacoosuna.com/', 'country' => 'España', 'permalink' => 'paco-osuna', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Richie Hawtin', 'soundcloud' => 'https://soundcloud.com/richiehawtin', 'website' => 'http://plastikman.com/', 'country' => 'Canadá', 'permalink' => 'richie-hawtin', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Carl Cox', 'soundcloud' => 'https://soundcloud.com/carl-cox', 'website' => 'http://www.carlcox.com/', 'country' => 'Estados Unidos', 'permalink' => 'carl-cox', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Adam Beyer', 'soundcloud' => 'https://soundcloud.com/adambeyer', 'website' => 'http://www.drumcode.se/adambeyer.html', 'country' => 'Suecia', 'permalink' => 'adam-beyer', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Marco Carola', 'soundcloud' => 'https://soundcloud.com/marcocarola', 'website' => 'https://www.residentadvisor.net/dj/marcocarola', 'country' => 'Italia', 'permalink' => 'marco-carola', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Joseph Capriati', 'soundcloud' => 'https://soundcloud.com/joseph-capriati', 'website' => 'http://www.josephcapriati.com/', 'country' => 'Italia', 'permalink' => 'joseph-capriati', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Loco Dice', 'soundcloud' => 'https://soundcloud.com/locodiceofc', 'website' => 'http://locodiceofc.tumblr.com/', 'country' => 'Alemania', 'permalink' => 'loco-dice', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paul Ritch', 'soundcloud' => 'https://soundcloud.com/paulritch', 'website' => 'http://www.paulritch.com/', 'country' => 'Francia', 'permalink' => 'paul-ritch', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Pan-Pot', 'soundcloud' => 'https://soundcloud.com/pan-pot', 'website' => 'http://pan-pot.net/', 'country' => 'Alemania', 'permalink' => 'pan-pot', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Armin van Buuren', 'soundcloud' => 'https://soundcloud.com/arminvanbuuren', 'website' => 'http://www.arminvanbuuren.com/', 'country' => 'Holanda', 'permalink' => 'armin-van-buuren', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paul van Dyk', 'soundcloud' => 'https://soundcloud.com/paulvandykofficial', 'website' => 'http://www.paulvandyk.com/', 'country' => 'Alemania', 'permalink' => 'paul-van-dyk', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Sander van Doorn', 'soundcloud' => 'https://soundcloud.com/sandervandoorn', 'website' => 'http://www.sandervandoorn.com/', 'country' => 'Holanda', 'permalink' => 'sander-van-doorn', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Don Diablo', 'soundcloud' => 'https://soundcloud.com/dondiablo', 'website' => 'http://www.dondiablo.com/', 'country' => 'Holanda', 'permalink' => 'don-diablo', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Hardwell', 'soundcloud' => 'https://soundcloud.com/hardwell', 'website' => 'https://www.djhardwell.com/', 'country' => 'Holanda', 'permalink' => 'hardwell', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Galantis', 'soundcloud' => 'https://soundcloud.com/wearegalantis', 'website' => 'http://www.wearegalantis.com/', 'country' => 'Suecia', 'permalink' => 'galantis', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Coone', 'soundcloud' => 'https://soundcloud.com/coone', 'website' => 'http://www.djcoone.com/', 'country' => 'Bélgica', 'permalink' => 'coone', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Zatox', 'soundcloud' => 'https://soundcloud.com/djzatox', 'website' => 'http://www.djzatox.com/', 'country' => 'Italia', 'permalink' => 'zatox', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Brennan Heart', 'soundcloud' => 'https://soundcloud.com/brennanheart', 'website' => 'http://www.brennanheart.com/', 'country' => 'Holanda', 'permalink' => 'brennan-heart', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
            ]
        );
    }
}
