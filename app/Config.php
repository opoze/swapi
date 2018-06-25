<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{

  public $timestamps = false;
  protected $table = 'config';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'proposaltime'
  ];


}
