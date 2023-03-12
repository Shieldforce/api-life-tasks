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
            'password' => "sa",
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
            'password' => "user",
        ];

        $data2b = $data2;

        unset($data2["password"]);

        if(!User::where("email", "user@becompliance.com")->first()) {
            $user2 = User::updateOrCreate($data2, $data2b);
            $user2->roles()->sync([2], true);
        }

        $data3 = [
            'name'     => 'Alexandre Ferreira',
            'email'    => 'shieldforce2@gmail.com',
            'password' => "cnsa@020459",
        ];

        $data3b = $data3;

        unset($data3["password"]);

        if(!User::where("email", "shieldforce2@gmail.com")->first()) {
            $user3 = User::updateOrCreate($data3, $data3b);
            $user3->roles()->sync([2], true);
        }
    }
}
