<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Role, Scope};
use DB, Log;

class RolesSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $roles = [
      ['name' => 'director'],
      ['name' => 'admin'],
      ['name' => 'aux'],
      ['name' => 'campus-director']
    ];
    DB::table('roles')->insert($roles);

    $director = Role::where('name', 'director')->first();
    $directorScopes = Scope::where('name', 'LIKE', '%read%')->pluck('id');
    $director->scopes()->attach($directorScopes);

    $admin = Role::where('name', 'admin')->first();
    $adminScopes = Scope::all();
    $admin->scopes()->attach($adminScopes);

    $aux = Role::where('name', 'aux')->first();
    $auxScopes = Scope::where('name', 'LIKE', '%create%')->pluck('id');
    $aux->scopes()->attach($auxScopes);

    $campusDirector = Role::where('name', 'campus-director')->first();
    $campusDirectorScopes = Scope::where('name', 'LIKE', '%create%')->orWhere('name', 'LIKE', '%assign%')->pluck('id');
    $campusDirector->scopes()->attach($campusDirectorScopes);
  }
}
