<?php

// TODO: add a column to determine if the stats refer to
//       pro or minors, and then make the parser deal 
//       with the weird naming.
namespace App\Models;
#
use Illuminate\Database\Eloquent\Model;
#
final class CmhlGoalieStats extends Model
{
  protected $table = 'cmhl_goalie_stats';
}
