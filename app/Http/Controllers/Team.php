<?php

namespace App\Http\Controllers;
use App\Models\TeamInfo;

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
      // GM, Players, Goalies, Farm
      $teaminfo = TeamInfo::query()->findOrFail($id);
      return view('team', ['teaminfo' => $teaminfo]);

    }
}
