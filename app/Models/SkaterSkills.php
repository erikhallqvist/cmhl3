<?php

namespace App\Models;
#
use Illuminate\Database\Eloquent\Model;
#
final class SkaterSkills extends Model
{
  protected $table = 'skater_skills';
  public $timestamps = false;

  public function skater()
  {
    return $this->belongsTo('Skater');
  }

}
