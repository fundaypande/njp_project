<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
  protected $fillable = [
      'id', 'token',
  ];

  protected $table = 'token_register';
}
