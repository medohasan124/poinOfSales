<?php

namespace Modules\Order\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Order\app\Models\order;

class OrderDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
        order::create([
            'product_id' => 1 ,
            'client_id' => 1 ,
            'salary' => 12.5 ,
            'discount' => 1 ,
            'lastSalary' => 11.5 ,
            'payment' => 1,
        ]);
    }
}
