<?php

namespace App\Http\Controllers;
use App\Models\TeamInfo;
use App\Models\Skater;
use App\Models\SkaterSkills;
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
      $skills = [];
//
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

      return view('team', [
        'teaminfo'  => $teaminfo,
        'skills'    => $skills
      ]);

    }
}
