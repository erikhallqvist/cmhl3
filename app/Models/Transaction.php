<?php

namespace App\Models;
#
use Illuminate\Database\Eloquent\Model;
#
final class Transaction extends Model
{
  protected $table = 'transaction';
  public $timestamps = false;
}
