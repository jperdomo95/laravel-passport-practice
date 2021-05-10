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
  }
}