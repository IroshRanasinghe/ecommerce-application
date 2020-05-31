<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create([
            'name'=>'Adidas',
            'logo'=>null,
        ]);

        Brand::create([
            'name'=>'Puma',
            'logo'=>null,
        ]);

        Brand::create([
            'name'=>'Nike',
            'logo'=>null,
        ]);

        Brand::create([
            'name'=>'Reeborn',
            'logo'=>null,
        ]);
    }
}
