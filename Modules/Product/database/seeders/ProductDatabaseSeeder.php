<?php

namespace Modules\Product\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Product\app\Models\product;

class ProductDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // $this->call([]);
        for($i=0;$i<=10;$i++){
            $price = rand(10,100);
            $last_price =  $price + rand(1,5);
        product::create([
            'name' => 'عسل'.$i ,
            'name_en' => 'hony'.$i ,
            'description' => 'عسل كبير'.$i ,
            'sreialNumber' => rand(12345678 ,123456789 ) ,
            'first_price' => $price ,
            'last_price' => $last_price ,
            'store' => rand(1,100) ,
            'cat_id' => rand(1,10) ,
        ]);
        }
    }
}
