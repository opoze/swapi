<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'category', 'suplier', 'value', 'description'
  ];

  public function category(){
		return $this->belongsTo('App\Category', 'category');
	}

  public function suplier(){
    return $this->belongsTo('App\Suplier', 'suplier');
  }

  public function statuses(){
    return $this->hasMany('App\ProposalStatus', 'proposal')->orderBy('created_at');
  }


}
