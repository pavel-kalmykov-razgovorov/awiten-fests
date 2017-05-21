<?php

namespace app\ServiceLayer;


use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AdminServices
{
    public static function deleteUser(User $user)
    {
        if (!is_null($user)) {
            if ($user->isPromoter()) {
                DB::transaction(function () use ($user) {
                    $user->festivals()->each(function ($festival, $key) {
                        Storage::deleteDirectory("festivals/$festival->permalink");
                    });
                    $user->delete();
                });
            } else if ($user->isManager()) {
                DB::transaction(function () use ($user) {
                    $user->artists()->each(function ($artist, $key) {
                        Storage::deleteDirectory("artists/$artist->permalink");
                    });
                    $user->delete();
                });
            } else if ($user->isAdmin()) {
                return redirect('/noPermision');
            }
        }
    }
}