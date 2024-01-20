<?php

namespace Modules\Users\database\seeders;

use Illuminate\Database\Seeder;

class UsersDatabaseSeeder extends Seeder
{

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $this->call([]);
      //  \App\Models\User::factory(10)->create();
        $user = \App\Models\User::factory()->create([
            'name' => 'medo',
            'email' => 'medo@example.com',
            'Mobile' => '0533695541',
            'password' => bcrypt(123123),
        ]);

        $user->addRole('superAdmin');
    }
}
