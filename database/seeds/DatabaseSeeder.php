<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(AdminTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(SettingTableSeeder::class);
         $this->call(AttributesTableSeeder::class);
//         $this->call(AttributeValuesTableSeeder::class);
         $this->call(BrandsTableSeeder::class);
    }
}
