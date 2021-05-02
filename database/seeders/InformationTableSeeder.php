<?php

namespace Database\Seeders;

use App\Models\Information;
use Illuminate\Database\Seeder;

class InformationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Information::create([
            "phone" => "test123456",
            "email" => "test@gmail.com",
            "wilaya" => "test@gmail.com",
            "province" => "test@gmail.com",
            "address" => "test@gmail.com",
            "logo" => asset('logo/mk_logo.png'),
        ]);
    }
}
