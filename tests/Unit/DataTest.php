<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Artist;
use App\Festival;
use App\Genre;

class DataTest extends TestCase
{
    /**
     * Checks that some table has the specified entries
     * 
     * @param string $table the name of the table
     * @param callable $ass_arr_col a function that returns an associative array corresponding to the table's cols
     * @param $entries an array of arrays with all the entries that have to be checked.
     *        Every array must have the proper structure in order to fit with the $ass_arr_col's parameters!
     * @return void
     */
    public function checkTableEntries ($table, $ass_arr_col, $entries) {
        foreach ($entries as $entry) {
            $this->assertDatabaseHas($table, call_user_func_array($ass_arr_col, $entry));
        }
    }

    /**
     * Checks festivals' seeds
     * 
     * @return void
     */
    public function testFestivalsData() {
        $get_festival_array = function ($name, $address, $date, $province) {
            return [
                'name' => $name,
                'address' => $address,
                'date' => $date,
                'province' => $province
            ];
        };

        $this->assertEquals(7, Festival::all()->count());
        $this->checkTableEntries(
            'festivals',
            $get_festival_array,
            [
                ["Medusa", "Calle Doctor Marañon Nº21", "17/08/2017", "Valencia"],
                ["Arenal", "Avd Castellon Nº11", "27/08/2017", "Castellon"],
                ["Dreambeach", "Avd Jaume I Nº82", "17/07/2017", "Almeria"],
                ["Barcelona Beach Festival", "Calle Barceloneta", "11/07/2017", "Barcelona"],
                ["A summer story", "Calle Falsa 123", "14/07/2017", "Madrid"],
                ["Tomorrowland", "Calle Bredlak Nº12", "17/08/2017", "Boom"],
                ["Ultra Music Festival", "Green Street", "23/06/2017", "Miami"]
            ]
        );
    }

    /**
     * Checks artists' seeds
     * 
     * @return void
     */
    public function testArtistsData() {
        $get_artist_array = function ($name, $soundcloud, $website, $country) {
            return [
                'name' => $name,
                'soundcloud' => $soundcloud,
                'website' => $website,
                'country' => $country
            ];
        };

        $this->assertEquals(19, Artist::all()->count());
        $this->checkTableEntries(
            'artists',
            $get_artist_array,
            [
                ["Joris Voorn", "https://soundcloud.com/joris-voorn", "http://www.jorisvoorn.com/", "Holanda"],
                ["Paco Osuna", "https://soundcloud.com/paco-osuna", "http://www.pacoosuna.com/", "España"],
                ["Richie Hawtin", "https://soundcloud.com/richiehawtin", "http://plastikman.com/", "Canadá"],
                ["Carl Cox", "https://soundcloud.com/carl-cox", "http://www.carlcox.com/", "Estados Unidos"],
                ["Adam Beyer", "https://soundcloud.com/adambeyer", "http://www.drumcode.se/adambeyer.html", "Suecia"],
                ["Marco Carola", "https://soundcloud.com/marcocarola", "https://www.residentadvisor.net/dj/marcocarola", "Italia"],
                ["Joseph Capriati", "https://soundcloud.com/joseph-capriati", "http://www.josephcapriati.com/", "Italia"],
                ["Loco Dice", "https://soundcloud.com/locodiceofc", "http://locodiceofc.tumblr.com/", "Alemania"],
                ["Paul Ritch", "https://soundcloud.com/paulritch", "http://www.paulritch.com/", "Francia"],
                ["Pan-Pot", "https://soundcloud.com/pan-pot", "http://pan-pot.net/", "Alemania"],
                ["Armin van Buuren", "https://soundcloud.com/arminvanbuuren", "http://www.arminvanbuuren.com/", "Holanda"],
                ["Paul van Dyk", "https://soundcloud.com/paulvandykofficial", "http://www.paulvandyk.com/", "Alemania"],
                ["Sander van Doorn","https://soundcloud.com/sandervandoorn", "http://www.sandervandoorn.com/", "Holanda"],
                ["Don Diablo", "https://soundcloud.com/dondiablo", "http://www.dondiablo.com/", "Holanda"],
                ["Hardwell", "https://soundcloud.com/hardwell", "https://www.djhardwell.com/", "Holanda"],
                ["Galantis", "https://soundcloud.com/wearegalantis", "http://www.wearegalantis.com/", "Suecia"],
                ["Coone", "https://soundcloud.com/coone", "http://www.djcoone.com/", "Bélgica"],
                ["Zatox", "https://soundcloud.com/djzatox", "http://www.djzatox.com/", "Italia"],
                ["Brennan Heart", "https://soundcloud.com/brennanheart", "http://www.brennanheart.com/", "Holanda"]
            ]
        );
    }

    /**
     * Checks genres' seeds
     * 
     * @return void
     */
    public function testGenresData() {
        $get_genre_array = function ($genre) {
            return ['genre' => $genre];
        };

        $this->assertEquals(5, Genre::all()->count());
        $this->checkTableEntries(
            'genres',
            $get_genre_array,
            [
                ["Techno"],
                ["EDM"],
                ["House"],
                ["Trance"],
                ["Hardstyle"]
            ]
        );
    }
}