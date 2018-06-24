<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'description'
  ];

  // public function proposals()
		// return $this->hasMany('App\Proposal');
	// }
}
