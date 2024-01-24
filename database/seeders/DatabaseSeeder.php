<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(LaratrustSeeder::class);
        $this->call(\Modules\Users\Database\Seeders\UsersDatabaseSeeder::class);
        $this->call(\Modules\catigory\Database\Seeders\CatigoryDatabaseSeeder::class);
        $this->call(\Modules\product\Database\Seeders\ProductDatabaseSeeder::class);
        $this->call(\Modules\client\Database\Seeders\ClientDatabaseSeeder::class);
        $this->call(\Modules\order\Database\Seeders\OrderDatabaseSeeder::class);
    }
}
