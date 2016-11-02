<?php
namespace App\Services;
  /*
   * This is essentially a helper class to keep too much logic
   * out of the controller. It's used to save/update player
   * information coming from CSV and potentially xml files.
   */
use App\Models\TeamInfo;
use App\Models\ProTeamStats;

class ParseTeam
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
   *
   */
  public function storeProTeam(&$row)
  {
    // Yeah, id isn't a primary key...
    // This is what happens when you have to deal with 
    // poorly designed legacy database tables. :)
    $ti = TeamInfo::where('id', $row['Number'])->first();

    $ti->team_id            = $row['Number'];
    $ti->team               = $row['Name'];
    $ti->teamshortname      = $row['Abbre'];
    $ti->gmname             = $row['GM Name'];
    $ti->coach              = $row['CoachID'];
    $ti->venue              = $row['Arena'];

    $ti->save();

    $stats = ProTeamStats::where('team_id', $ti->team_id)->first();
    $stats->gp            = $row['GP'];
    $stats->w             = $row['W'];
    $stats->l             = $row['L'];
    $stats->t             = $row['T'];
    $stats->otw           = $row['OTW'];
    $stats->otl           = $row['OTL'];
    $stats->sow           = $row['SOW'];
    $stats->sol           = $row['SOL'];
    $stats->gf            = $row['GF'];
    $stats->ga            = $row['GA'];
    $stats->pp            = $row['PPAttemp'];
    $stats->ppg           = $row['PPGoal'];
    $stats->pk            = $row['PKAttemp'];
    $stats->pkga          = $row['PKGoalGA'];
    $stats->pkgf          = $row['PKGoalGF'];
    $stats->shots         = $row['ShotsFor'];
    $stats->shots_allowed = $row['ShotsAga'];

    $stats->save();

    return $ti->id;
  }




}
