<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::create([
            'name' => 'Iroshana',
            'email' => 'admin@admin.com',
            'password' => bcrypt('password')
        ]);
    }
}
