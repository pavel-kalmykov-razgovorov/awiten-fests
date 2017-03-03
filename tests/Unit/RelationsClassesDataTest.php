<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Festival;
use App\Artist;
use App\Genre;

class RelationsClassesDataTest extends TestCase
{

    public function testArtistFestival() {
        $get_artist_festivals = function ($artist_name) {
            return Artist::where('name', $artist_name)->first()
                ->festivals->map(function ($festival) {
                    return $festival->name;
                })->toArray();
        };

        $artist_festivals = [
            "Joris Voorn" => ["Medusa Sunbeach Festival", "Dreambeach Festival", "Awakenings", "The Jaco Festival"],
            "Paco Osuna" => ["Dreambeach Festival", "Awakenings", "A Summer Story", "Aquasella", "Wan Festival", "The Jaco Festival"],
            "Richie Hawtin" => ["Medusa Sunbeach Festival","Awakenings","Wan Festival","The Jaco Festival"],
            "Carl Cox" => ["Dreambeach Festival", "Awakenings", "Wan Festival", "Tomorrowland", "The Jaco Festival"],
            "Adam Beyer" => ["Awakenings", "A Summer Story", "Aquasella", "The Jaco Festival"],
            "Marco Carola" => ["Dreambeach Festival","Awakenings","Wan Festival"],
            "Joseph Capriati" => ["Medusa Sunbeach Festival", "Awakenings", "Aquasella", "The Jaco Festival"],
            "Loco Dice" => ["Dreambeach Festival", "Awakenings", "Aquasella", "The Jaco Festival"],
            "Paul Ritch" => ["Medusa Sunbeach Festival", "Awakenings", "Aquasella", "The Jaco Festival"],
            "Paul van Dyk" => ["A Summer Story", "Tomorrowland"],
            "Sander van Doorn" => ["Arenal Sound", "Dreambeach Festival", "Ultra Music Festival"],
            "Don Diablo" => ["Arenal Sound", "Dreambeach Festival", "Tomorrowland", "Ultra Music Festival"],
            "Hardwell" => ["Medusa Sunbeach Festival", "A Summer Story", "Tomorrowland", "Ultra Music Festival"],
            "Galantis" => ["Arenal Sound", "Tomorrowland"],
            "Coone" => ["Medusa Sunbeach Festival", "Tomorrowland", "Ultra Music Festival"],
            "Zatox" => ["A Summer Story", "Ultra Music Festival"],
            "Brennan Heart" => ["Dreambeach Festival", "A Summer Story", "Tomorrowland"],
            "Pan-Pot" => ["Medusa Sunbeach Festival", "Dreambeach Festival", "Awakenings", "Tomorrowland", "The Jaco Festival"],
            "Armin van Buuren" => ["Medusa Sunbeach Festival", "A Summer Story", "Tomorrowland", "Ultra Music Festival"],
        ];

        foreach ($artist_festivals as $artist => $festivals) {
            $this->assertEquals($festivals, $get_artist_festivals($artist));
        }
    }

    public function testArtistGenre() {
        $get_artist_genres = function($artist_name) {
            return Artist::where('name', $artist_name)->first()
                ->genres->map(function ($genre) {
                    return $genre->genre;
                })->toArray();
        };

        $artist_genres = [
            "Joris Voorn" => ["Techno"],
            "Paco Osuna" => ["Techno", "Tech House"],
            "Richie Hawtin" => ["Techno"],
            "Carl Cox" => ["Techno", "Tech House"],
            "Adam Beyer" => ["Techno"],
            "Marco Carola" => ["Techno", "Tech House"],
            "Joseph Capriati" => ["Techno"],
            "Loco Dice" => ["Techno", "Tech House"],
            "Paul Ritch" => ["Techno", "Tech House"],
            "Pan-Pot" => ["Techno", "Tech House"],
            "Armin van Buuren" => ["EDM", "Trance"],
            "Paul van Dyk" => ["Trance"],
            "Sander van Doorn" => ["EDM", "Trance"],
            "Don Diablo" => ["EDM", "Future House"],
            "Hardwell" => ["EDM"],
            "Galantis" => ["EDM", "Future House"],
            "Coone" => ["EDM", "Hardstyle"],
            "Zatox" => ["Hardstyle"],
            "Brennan Heart" => ["Hardstyle"]
        ];

        foreach ($artist_genres as $artist => $genres) {
            $this->assertEquals($genres, $get_artist_genres($artist));
        }
    }

    public function testFestivalGenre() {
        $get_festival_genres = function ($festival_name) {
            return Festival::where('name', $festival_name)->first()
                ->genres->map(function ($genre) {
                    return $genre->genre;
                })->toArray();
        };

        $festival_genres = [
            "Medusa Sunbeach Festival" => ["Techno", "Tech House", "EDM", "Future House", "Trance", "Hardstyle"],
            "Arenal Sound" => ["EDM", "Future House"],
            "Dreambeach Festival" => ["Techno", "Tech House", "EDM", "Future House", "Trance", "Hardstyle"],
            "Awakenings" => ["Techno", "Tech House"],
            "A Summer Story" => ["Techno", "Tech House", "EDM", "Hardstyle"],
            "Aquasella" => ["Techno", "Tech House"],
            "Wan Festival" => ["Techno", "Tech House"],
            "Tomorrowland" => ["Techno", "Tech House", "EDM", "Future House", "Trance", "Hardstyle"],
            "Ultra Music Festival" => ["Techno", "Tech House", "EDM", "Future House", "Trance", "Hardstyle"],
            "The Jaco Festival" => ["Techno"]
        ];

        foreach ($festival_genres as $festival => $genres) {
            $this->assertEquals($genres, $get_festival_genres($festival));
        }
    }
}
