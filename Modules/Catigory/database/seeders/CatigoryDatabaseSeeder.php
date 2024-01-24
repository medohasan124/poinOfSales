<?php

namespace Modules\Catigory\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Catigory\app\Models\catigory;

class CatigoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        for($i=0;$i<=10;$i++){
            catigory::create([
                'name' => 'معلبات'.$i ,
                'name_en' => 'boxes'.$i ,
            ]);
        }


    }
}
