<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create(["username" => "admin",
            "email" => "admin@app.com",
            "password" => bcrypt("mk_shop_password")]);
    }
}
