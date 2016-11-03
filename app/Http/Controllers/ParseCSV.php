<?php

namespace App\Http\Controllers;
use App\Services\ParsePlayer;
use App\Services\ParseTeam;
use Illuminate\Http\Request;

class ParseCSV extends Controller
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
     *
     */
    public function index()
    {
      return view('select_file',
        ['filename'   => 'http://yourdreambuilders.ca/hockey/XML/CMHLS13-Players.csv']
      );

    }

    /*
     * Skater
     */
    public function parse()
    {
      $filename = 'http://yourdreambuilders.ca/hockey/XML/CMHLS13-PRE-Players.csv';
      /*
       * Grab the header row of the CSV and use it as named index on the
       * rest of the rows.
       */
      // Strip Windows BOM that ruins all the things.
      $str = preg_replace('/\x{FEFF}/u', '', file($filename));
      $csv = array_map('str_getcsv', $str);
      array_walk($csv, function(&$a) use ($csv) {
        $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
      $skater = new ParsePlayer;

      foreach ($csv as $line){
        $storeskater = $skater->storeSkater($line);
      }

      return view('select_file', ['test' => "HI"]);

    }

    /*
     * Team
     */
    public function parseProTeam()
    {
      ini_set("auto_detect_line_endings", true);
      $filename = 'http://yourdreambuilders.ca/hockey/XML/CMHLS13-V3ProTeam.csv';
      /* Grab the header row of the CSV and use it as named index on the
       * rest of the rows.
       */
      // Strip Windows BOM that ruins all the things.
      $str = preg_replace('/\x{FEFF}/u', '', file($filename));
      $csv = array_map('str_getcsv', $str);
      array_walk($csv, function(&$a) use ($csv) {
        $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
      $team = new ParseTeam;

      foreach ($csv as $line){
        $saveteam = $team->storeProTeam($line);
      }

      return view('select_file', ['test' => "HI"]);

    }

    /*
     * Goalie
     */
    public function parseGoalies()
    {
      ini_set("auto_detect_line_endings", true);
      $filename = 'http://yourdreambuilders.ca/hockey/XML/CMHLS13-PRE-Goalies.csv';
      /* Grab the header row, use it to name columns
       *
       */
      $str = preg_replace('/\x{FEFF}/u', '', file($filename)); // Windows BOM
      $csv = array_map('str_getcsv', $str);
      array_walk($csv, function(&$a) use ($csv) {
        $a = array_combine($csv[0], $a);
      });
      array_shift($csv);
      $goalie = new ParsePlayer;
      foreach($csv as $line) {
        $store = $goalie->storeGoalie($line);
      }

      return view('select_file', ['test' => 'Stuff']);






    }
}
