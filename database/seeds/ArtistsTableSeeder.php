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
                ['name' => 'Joris Voorn', 'soundcloud' => 'https://soundcloud.com/joris-voorn', 'website' => 'http://www.jorisvoorn.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'joris-voorn', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paco Osuna', 'soundcloud' => 'https://soundcloud.com/paco-osuna', 'website' => 'http://www.pacoosuna.com/', 'country' => 'España', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'paco-osuna', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Richie Hawtin', 'soundcloud' => 'https://soundcloud.com/richiehawtin', 'website' => 'http://plastikman.com/', 'country' => 'Canadá', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'richie-hawtin', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Carl Cox', 'soundcloud' => 'https://soundcloud.com/carl-cox', 'website' => 'http://www.carlcox.com/', 'country' => 'Estados Unidos', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'carl-cox', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Adam Beyer', 'soundcloud' => 'https://soundcloud.com/adambeyer', 'website' => 'http://www.drumcode.se/adambeyer.html', 'country' => 'Suecia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'adam-beyer', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Marco Carola', 'soundcloud' => 'https://soundcloud.com/marcocarola', 'website' => 'https://www.residentadvisor.net/dj/marcocarola', 'country' => 'Italia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'marco-carola', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Joseph Capriati', 'soundcloud' => 'https://soundcloud.com/joseph-capriati', 'website' => 'http://www.josephcapriati.com/', 'country' => 'Italia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'joseph-capriati', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Loco Dice', 'soundcloud' => 'https://soundcloud.com/locodiceofc', 'website' => 'http://locodiceofc.tumblr.com/', 'country' => 'Alemania', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'loco-dice', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paul Ritch', 'soundcloud' => 'https://soundcloud.com/paulritch', 'website' => 'http://www.paulritch.com/', 'country' => 'Francia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'paul-ritch', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Pan-Pot', 'soundcloud' => 'https://soundcloud.com/pan-pot', 'website' => 'http://pan-pot.net/', 'country' => 'Alemania', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'pan-pot', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Armin van Buuren', 'soundcloud' => 'https://soundcloud.com/arminvanbuuren', 'website' => 'http://www.arminvanbuuren.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'armin-van-buuren', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Paul van Dyk', 'soundcloud' => 'https://soundcloud.com/paulvandykofficial', 'website' => 'http://www.paulvandyk.com/', 'country' => 'Alemania', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'paul-van-dyk', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Sander van Doorn', 'soundcloud' => 'https://soundcloud.com/sandervandoorn', 'website' => 'http://www.sandervandoorn.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'sander-van-doorn', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Don Diablo', 'soundcloud' => 'https://soundcloud.com/dondiablo', 'website' => 'http://www.dondiablo.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'don-diablo', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Hardwell', 'soundcloud' => 'https://soundcloud.com/hardwell', 'website' => 'https://www.djhardwell.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'hardwell', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Galantis', 'soundcloud' => 'https://soundcloud.com/wearegalantis', 'website' => 'http://www.wearegalantis.com/', 'country' => 'Suecia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'galantis', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Coone', 'soundcloud' => 'https://soundcloud.com/coone', 'website' => 'http://www.djcoone.com/', 'country' => 'Bélgica', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'coone', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Zatox', 'soundcloud' => 'https://soundcloud.com/djzatox', 'website' => 'http://www.djzatox.com/', 'country' => 'Italia', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'zatox', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],
                ['name' => 'Brennan Heart', 'soundcloud' => 'https://soundcloud.com/brennanheart', 'website' => 'http://www.brennanheart.com/', 'country' => 'Holanda', 'pathProfile' => 'profile.jpg', 'pathHeader' => 'fondo.jpg', 'permalink' => 'brennan-heart', 'manager_id' => $managers_ids[rand(0, count($managers_ids) - 1)]],

            ]
        );
    }
}
