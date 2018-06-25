<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProposalStatus extends Model
{

  protected $table = 'proposal_status';

  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'status', 'user', 'created_at', 'proposal'
  ];

  public function proposal(){
    return $this->belongsTo('App\Proposal', 'proposal');
  }

}
