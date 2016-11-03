<?php

namespace App\Http\Controllers;
use App\Models\TeamInfo;
use App\Models\Skater;
use App\Models\SkaterSkills;
use App\Models\Goalie;
use App\Models\GoalieSkills;
use Illuminate\Support\Facades\Log;

class Team extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Grab the team matching the id
     *
     */
    public function display($id)
    {
      setlocale(LC_MONETARY, 'en_US.UTF-8'); // For cap hit display
      // GM, Players, Goalies, Farm
      $teaminfo = TeamInfo::query()->findOrFail($id);
      $skaters = Skater::where('team', '=', $id)->get();
      $goalies = Goalie::where('team', '=', $id)->get();
      $skills = [];
      $gskills = [];
      $salaries = [];
      $salaries['proskaters'] = Skater::where('team', '=', $id)
                                      ->where('status', '>', 1)
                                      ->sum('salary');
      $salaries['minorskaters'] = Skater::where('team', '=', $id)
                                        ->where('status', '<', 2)
                                        ->sum('salary');
      // This is dumb, but the hasOne() for $skater->skill doesn't work
      // for some reason.
      // TODO: Figure out why it can't find the model that way
      foreach($skaters as $skater)
      {
        $skill = SkaterSkills::where('skater_id', '=', $skater->id)->first();
        $skill['name'] = $skater->name;
        $skill['status'] = $skater->status;
        // Add $ sign here and cut the decimals.
        $skill['salary'] = money_format('%.0n', $skater->salary);
        $skill['contract'] = $skater->contract;
        $skills[] = $skill;
      }

      foreach($goalies as $goalie)
      {
        $gskill = GoalieSkills::where('goalie_id', '=', $goalie->id)->first();
        $gskill['name'] = $goalie->name;
        $gskill['status'] = $goalie->status;
        $gskill['salary'] = money_format('%.0n', $goalie->salary);
        $gskill['contract'] = $goalie->contract;
        $gskills[] = $gskill;
      }

      $salaries['progoalies'] = Goalie::where('team', '=', $id)
                                      ->where('status', '>', 1)
                                      ->sum('salary');

      $salaries['minorgoalies'] = Goalie::where('team', '=', $id)
                                        ->where('status', '<', 2)
                                        ->sum('salary');

      $salaries['total'] = $salaries['progoalies'] + $salaries['proskaters']
                         + (0.1 * $salaries['minorgoalies'])
                         + (0.1 * $salaries['minorskaters']);

      return view('team', [
        'teaminfo'  => $teaminfo,
        'skills'    => $skills,
        'gskills'   => $gskills,
        'salaries'  => $salaries
      ]);

    }
}
