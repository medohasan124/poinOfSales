<?php

namespace Modules\Client\database\seeders;

use Illuminate\Database\Seeder;
use Modules\Client\app\Models\client;

class ClientDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);

        client::create([
            'name' => 'Test cline' ,
            'mobile' =>'123456789' ,
        ]);

    }
}
