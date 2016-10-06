<?php

# database/seeds/UfaReasonSeeder.php
#
use App\Models\UfaReason;
use Illuminate\Database\Seeder;

class UfaReasonSeeder extends Seeder
{
  public function run()
  {
    UfaReason::create([
      'reason'  => 'He signs the contract and looks forward to playing with the team.'
    ]);
    UfaReason::create([
      'reason'  => 'He wants much more money than that.'
    ]);
    UfaReason::create([
      'reason'  => 'He wants a little bit more money than that.'
    ]);
    UfaReason::create([
      'reason'  => 'He likes the offer, but wants a shorter term contract.'
    ]);
    UfaReason::create([
      'reason'  => 'He likes the offer, but wants a longer term contract.'
    ]);
    UfaReason::create([
      'reason'  => 'He does not want to risk having to play in the ICHF.'
    ]);
    UfaReason::create([
      'reason'  => 'He feels his market value is higher as he has received multiple competitive offers.'
    ]);
                                                                                                                                                        }
}
