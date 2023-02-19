<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeders extends Seeder
{
    public function run()
    {
        $data1 = [
            'name'     => 'SA',
            'email'    => 'sa@lifetasks.com',
            'password' => bcrypt("sa"),
        ];

        $data1b = $data1;

        unset($data1["password"]);

        if(!User::where("email", "sa@becompliance.com")->first()) {
            $user1 = User::updateOrCreate($data1, $data1b);
            $user1->roles()->sync([1], true);
        }

        $data2 = [
            'name'     => 'User',
            'email'    => 'user@lifetasks.com',
            'password' => bcrypt("user"),
        ];

        $data2b = $data2;

        unset($data2["password"]);

        if(!User::where("email", "user@becompliance.com")->first()) {
            $user2 = User::updateOrCreate($data2, $data2b);
            $user2->roles()->sync([2], true);
        }
    }
}
