<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;

class Transfer extends Model
{
  protected $fillable = [
        'nominal', 'bank', 'keterangan', 'status', 'user_id',
    ];

  public function user()
  {
      return $this->belongsTo('App\User');
  }

}
