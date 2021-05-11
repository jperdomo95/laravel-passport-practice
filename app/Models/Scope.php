<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'description'];

  public function roles()
  {
    return $this->belongsToMany(Role::class, 'roles_scopes', 'scope_id', 'role_id');
  }
}
