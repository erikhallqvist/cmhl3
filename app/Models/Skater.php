<?php

namespace App\Models;
#
use Illuminate\Database\Eloquent\Model;
#
final class Skater extends Model
{
  protected $table = 'skaters';
  public $timestamps = false;

  public function skills()
  {
    return $this->hasOne('SkaterSkills');
  }
}
