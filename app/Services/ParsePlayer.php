<?php
namespace App\Services;
  /*
   * This is essentially a helper class to keep too much logic
   * out of the controller. It's used to save/update player
   * information coming from CSV and potentially xml files.
   */
use App\Models\CmhlStats;
use App\Models\Skater;
use App\Models\SkaterSkills;


class ParsePlayer
{

  /*
   * There are better ways to do this, but it's not fun having
   * to look at a table with 100+ columns and find what you
   * need. We just have to work with what SimonT v3 outputs.
   *
   * This is a subset consisting of the fields our league is
   * interested in, and this way we get smaller tables with
   * different usages.
   *
   * TODO: Add storing of farm stats.
   *
   */
  public function storeSkater($row)
  {
    $skater = new Skater;
    $skills = new SkaterSkills;
    $stats  = new CmhlStats;

    $skater->number   = $row['Number'];
    $skater->name     = $row['Name'];
    $skater->team     = $row['Team'];
    $skater->country  = $row['Country'];
    $skater->agedate  = $row['AgeDate'];
    $skater->weight   = $row['Weight'];
    $skater->height   = $row['Height'];
    $skater->posc     = $row['PosC'];
    $skater->poslw    = $row['PosLW'];
    $skater->posrw    = $row['PosRW'];
    $skater->posd     = $row['PosD'];
    $skater->contract = $row['Contract'];
    $skater->rookie   = $row['Rookie'];
    $skater->salary   = $row['Salary1'];

    $skater->save();

    $skills->skater_id  = $skater->id;
    $skills->condition  = $row['Condition'];
    $skills->suspension = $row['Suspension'];
    $skills->injury     = (strlen($row['Injury']) == 0) ? 0 : $row['Injury'];
    $skills->CK         = $row['CK'];
    $skills->FG         = $row['FG'];
    $skills->DI         = $row['DI'];
    $skills->SK         = $row['SK'];
    $skills->ST         = $row['ST'];
    $skills->EN         = $row['EN'];
    $skills->DU         = $row['DU'];
    $skills->PH         = $row['PH'];
    $skills->FO         = $row['FO'];
    $skills->PA         = $row['PA'];
    $skills->SC         = $row['SC'];
    $skills->DF         = $row['DF'];
    $skills->PS         = $row['PS'];
    $skills->EX         = $row['EX'];
    $skills->LD         = $row['LD'];
    $skills->PO         = $row['PO'];
    $skills->MO         = $row['MO'];

    $skills->save();

    $stats->skater_id       = $skater->id;
    $stats->progp           = $row['ProGP'];
    $stats->proshots        = $row['ProShots'];
    $stats->prog            = $row['ProG'];
    $stats->proa            = $row['ProA'];
    $stats->proplusminus    = $row['ProPlusMinus'];
    $stats->propim          = $row['ProPim'];
    $stats->profivepim      = $row['Pro5Pim'];
    $stats->proshotsblocked = $row['ProShotsBlock'];
    $stats->prohits         = $row['ProHits'];
    $stats->prohitstook     = $row['ProHitsTook'];
    $stats->progw           = $row['ProGW'];
    $stats->profaceoffwon   = $row['ProFaceOffWon'];
    $stats->profaceofftotal = $row['ProFaceOffTotal'];
    $stats->propenaltygoals = $row['ProPenalityShotsScore'];
    $stats->propenaltyshots = $row['ProPenalityShotsTotal'];
    $stats->proppg          = $row['ProPPG'];
    $stats->proppa          = $row['ProPPA'];
    $stats->propkg          = $row['ProPKG'];
    $stats->propka          = $row['ProPKA'];
    $stats->progva          = $row['ProGiveAway'];
    $stats->protka          = $row['ProTakeAway'];

    $stats->save();

    return $skater->id;
  }




}
