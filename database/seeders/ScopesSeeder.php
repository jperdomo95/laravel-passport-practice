<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Scope;
use DB;

class ScopesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $scopes = [
          // Category Scopes
          ['name' => 'create-categories', 'description' => 'Create categories'],
          ['name' => 'read-categories', 'description' => 'Read categories'],
          ['name' => 'update-categories', 'description' => 'Update categories'],
          ['name' => 'delete-categories', 'description' => 'Delete categories'],
          // Classification Scopes
          ['name' => 'create-classifications', 'description' => 'Create classifications'],
          ['name' => 'read-classifications', 'description' => 'Read classifications'],
          ['name' => 'update-classifications', 'description' => 'Update classifications'],
          ['name' => 'delete-classifications', 'description' => 'Delete classifications'],
          // Hierarchy Scopes
          ['name' => 'create-hierarchies', 'description' => 'Create hierarchies'],
          ['name' => 'read-hierarchies', 'description' => 'Read hierarchies'],
          ['name' => 'update-hierarchies', 'description' => 'Update hierarchies'],
          ['name' => 'delete-hierarchies', 'description' => 'Delete hierarchies'],
          // Campus Scopes
          ['name' => 'create-campus', 'description' => 'Create campus'],
          ['name' => 'read-campus', 'description' => 'Read campus'],
          ['name' => 'update-campus', 'description' => 'Update campus'],
          ['name' => 'delete-campus', 'description' => 'Delete campus'],
          // Weapons Scopes
          ['name' => 'create-weapons', 'description' => 'Create weapons'],
          ['name' => 'read-weapons', 'description' => 'Read weapons'],
          ['name' => 'update-weapons', 'description' => 'Update weapons'],
          ['name' => 'delete-weapons', 'description' => 'Delete weapons'],
          ['name' => 'assign-weapons', 'description' => 'Assign weapons'],
          // Officer Scopes
          ['name' => 'create-officers', 'description' => 'Create officers'],
          ['name' => 'read-officers', 'description' => 'Read officers'],
          ['name' => 'update-officers', 'description' => 'Update officers'],
          ['name' => 'delete-officers', 'description' => 'Delete officers'],
          // Users Scopes
          ['name' => 'create-users', 'description' => 'Create users'],
          ['name' => 'read-users', 'description' => 'Read users'],
          ['name' => 'update-users', 'description' => 'Update users'],
          ['name' => 'delete-users', 'description' => 'Delete users'],
        ];
        DB::table('scopes')->insert($scopes);
    }
}
