<?php

use Illuminate\Database\Seeder;
use App\Models\ProTeamStats;

class ProTeamStatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 30; $i++)
      {
        ProTeamStats::create([
          'team_id' => $i,
          'gp'      => 0,
          'w'       => 0,
          'l'       => 0,
          't'       => 0,
          'otw'     => 0,
          'otl'     => 0,
          'sow'     => 0,
          'sol'     => 0,
          'gf'      => 0,
          'ga'      => 0,
          'pp'      => 0,
          'ppg'     => 0,
          'pk'      => 0,
          'pkga'    => 0,
          'pkgf'    => 0,
          'shots'   => 0,
          'shots_allowed' => 0
        ]);
      }
    }
}
