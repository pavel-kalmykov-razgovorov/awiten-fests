<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\Artist;
use App\Festival;
use App\Genre;

class AssociationsTest extends TestCase
{
    /**
     * Checks the association Sponsor-Team
     *
     * @return void
     */
     /*
    public function testAssociationSponsorTeam()
    {
        $sponsor = new Sponsor();
        $sponsor->name = 'Nvidia';
        $sponsor->save();

        $team = new Team();
        $team->name = 'Morning Singers';
        $sponsor->teams()->save($team);

        $this->assertEquals($team->sponsor->name, 'Nvidia');
        $this->assertEquals($sponsor->teams[0]->name, 'Morning Singers');
        
        $team->delete();
        $sponsor->delete();
    }
    */

    /**
     * Checks the association Team-Player
     *
     * @return void
     */
     /*
    public function testAssociationTeamPlayer()
    {
        $sponsor = new Sponsor();
        $sponsor->name = 'Nvidia';
        $sponsor->save();

        $team = new Team();
        $team->name = 'Morning Singers';
        $team->sponsor()->associate($sponsor);
        $team->save();

        $player = new Player();
        $player->name = 'Billy Jean';
        $player->age = 20;
        $player->save();
        $player->teams()->attach($team->id);

        $this->assertEquals($team->players[0]->name, 'Billy Jean');
        $this->assertEquals($player->teams[0]->name, 'Morning Singers');

        $player->teams()->detach($team->id);
        $player->delete();
        $team->delete();
        $sponsor->delete();
    }
    */

    public function testAssociationArtistFestival()
    {
        $artist = new Artist();
        $artist->name = 'Suicidal Tendencies';
        $artist->save();

        $festival = new Festival();
        $festival->name = 'Download Festival';
        $festival->save();

        $festival->artists()->attach($artist->id);

        $this->assertEquals($artist->festivals[0]->name, 'Download Festival');
        $this->assertEquals($festival->artists[0]->name, 'Suicidal Tendencies');

        $festival->artists()->detach($artist->id);
        $festival->delete();
        $artist->delete();
    }

}
