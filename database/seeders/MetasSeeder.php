<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\Metas\MetasDefaultService;
use Illuminate\Database\Seeder;

class MetasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MetasDefaultService::get(User::where("email", "shieldforce2@gmail.com")->first());
    }
}
