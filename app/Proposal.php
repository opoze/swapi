<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'category', 'suplier', 'value', 'description'
  ];

  public function category()
		return $this->belongsTo('App\Category');
	}

  public function suplier()
    return $this->belongsTo('App\Suplier');
  }


}
