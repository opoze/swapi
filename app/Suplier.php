<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suplier extends Model
{

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'fone', 'cpf', 'cnpj'
  ];

  // public function proposals()
	// 	return $this->hasMany('App\Proposal');
	// }
}
