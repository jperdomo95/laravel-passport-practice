<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scope;

class ScopesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scope::create(
            // Category Scopes
            ['name' => 'create-categories'],
            ['name' => 'read-categories'],
            ['name' => 'update-categories'],
            ['name' => 'delete-categories'],
            // Classification Scopes
            ['name' => 'create-classifications'],
            ['name' => 'read-classifications'],
            ['name' => 'update-classifications'],
            ['name' => 'delete-classifications'],
            // Hierarchy Scopes
            ['name' => 'create-hierarchies'],
            ['name' => 'read-hierarchies'],
            ['name' => 'update-hierarchies'],
            ['name' => 'delete-hierarchies'],
            // Campus Scopes
            ['name' => 'create-campus'],
            ['name' => 'read-campus'],
            ['name' => 'update-campus'],
            ['name' => 'delete-campus'],
            // Weapons Scopes
            ['name' => 'create-weapons'],
            ['name' => 'read-weapons'],
            ['name' => 'update-weapons'],
            ['name' => 'delete-weapons'],
            ['name' => 'assign-weapons'],
            // Officer Scopes
            ['name' => 'create-officers'],
            ['name' => 'read-officers'],
            ['name' => 'update-officers'],
            ['name' => 'delete-officers'],
            // Users Scopes
            ['name' => 'create-users'],
            ['name' => 'read-users'],
            ['name' => 'update-users'],
            ['name' => 'delete-users'],

        );
    }
}
