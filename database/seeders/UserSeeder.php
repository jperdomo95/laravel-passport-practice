<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
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
    $me = User::create([
      'email' => 'jperdomo@gmail.com',
      'name' => 'Julio Perdomo',
      'password' => Hash::make('123qweAS'),
      'email_verified_at' => now()
      ]);
    }
  }
