<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(25)->male()->create();
        // User::factory(25)->female()->create();
        $this->call([
          RolesSeeder::class,
          ScopesSeeder::class,
          UserSeeder::class,
        ]);
    }
}
