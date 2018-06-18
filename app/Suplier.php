<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'fone', 'fiscal'
  ];

  public function proposals()
		return $this->hasMany('App\Proposal');
	}
}
