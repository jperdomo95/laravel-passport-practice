<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  use HasFactory;

  protected $fillable = ['name'];

  public function user()
  {
    return $this->hasMany(User::class);
  }

  public function scopes()
  {
    return $this->belongsToMany(Scope::class, 'roles_scopes', 'role_id', 'scope_id');
  }
}
