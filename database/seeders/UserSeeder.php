<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use Hash;

class UserSeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    $admin = Role::where('name', 'admin')->first();
    $admin->user()->create([
      'email' => 'jperdomo@gmail.com',
      'name' => 'Julio Perdomo',
      'password' => Hash::make('123qweAS'),
      'email_verified_at' => now()
    ]);

    $director = Role::where('name', 'director')->first();
    $director->user()->create([
      'email' => 'director@gmail.com',
      'name' => 'Director',
      'password' => Hash::make('123qweAS'),
      'email_verified_at' => now()
    ]);

    $aux = Role::where('name', 'aux')->first();
    $aux->user()->create([
      'email' => 'aux@gmail.com',
      'name' => 'Aux',
      'password' => Hash::make('123qweAS'),
      'email_verified_at' => now()
    ]);

    $campusDirector = Role::where('name', 'campus-director')->first();
    $campusDirector->user()->create([
      'email' => 'campusdirector@gmail.com',
      'name' => 'Campus Director',
      'password' => Hash::make('123qweAS'),
      'email_verified_at' => now()
    ]);
  }
}