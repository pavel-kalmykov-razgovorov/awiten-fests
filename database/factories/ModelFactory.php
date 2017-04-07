<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Post::class, function (\Faker\Generator $faker) {
    $medusa = DB::table('festivals')->where('name', 'Medusa Sunbeach Festival')->first()->id;
    $arenal = DB::table('festivals')->where('name', 'Arenal Sound')->first()->id;
    $dreambeach = DB::table('festivals')->where('name', 'Dreambeach Festival')->first()->id;
    $awakenings = DB::table('festivals')->where('name', 'Awakenings')->first()->id;
    $sstory = DB::table('festivals')->where('name', 'A Summer Story')->first()->id;
    $aquasella = DB::table('festivals')->where('name', 'Aquasella')->first()->id;
    $wan = DB::table('festivals')->where('name', 'Wan Festival')->first()->id;
    $tomorrow = DB::table('festivals')->where('name', 'Tomorrowland')->first()->id;
    $umf = DB::table('festivals')->where('name', 'Ultra Music Festival')->first()->id;
    $jaco = DB::table('festivals')->where('name', 'The Jaco Festival')->first()->id;
    $festival_ids = [$medusa, $arenal, $dreambeach, $awakenings, $sstory, $aquasella, $wan, $tomorrow, $umf, $jaco,];
    $min = min($festival_ids);
    $max = max($festival_ids);
    $title = $faker->sentence(6);
    return [
        'title' => $title,
        'lead' => $faker->sentence(20),
        'body' => $faker->paragraph(40),
        'festival_id' => $faker->numberBetween($min, $max),
        'permalink' => str_slug($title),
    ];
});