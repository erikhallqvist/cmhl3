<?php

use Illuminate\Database\Seeder;
use App\Models\Teaminfo;

class TeaminfoSeeder extends Seeder
{
    /**
     *  Run the database seeds.
     *  This table is full of legacy fields
     * @return void
     */
    public function run()
    {
      for($i = 1; $i <= 30; $i++)
      {
        Teaminfo::create([
          'team_id'       => $i,
          'team'          => 'name',
          'teamshortname' => 'name',
          'gmname'        => 'name',
          'gmsince'       => 'name',
          'farmteam'      => 'name',
          'coach'         => 'name',
          'venue'         => 'name',
          'teamlogo'      => 'name',
          'coachpic'      => 'name',
          'gmfullname'    => 'name',
          'gmlocation'    => 'name',
          'gmmsn'         => 'name',
          'pm'            => 'name',
          'teamacronym'   => 'name'
        ]);
      }
    }
}
