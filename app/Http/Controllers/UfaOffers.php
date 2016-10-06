<?php

namespace App\Http\Controllers;
use App\Models\UfaReason;
use App\Models\UfaOffer;
use App\Models\TeamInfo;
//use Illuminate\Http\Request;
use Request;

class UfaOffers extends Controller
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
     * List all the offers for now
     * TODO: Filter by date
     */
    public function index()
    {
      // GM, Players, Goalies, Farm
      $offers = UfaOffer::query()
        ->get()
        ->all();
      $reasons = UfaReason::query()
        ->get()
        ->all();
      return view('ufa_offers',
        ['offers'  => $offers,
         'reasons' => $reasons]);

    }

    /*
     * League Official enters top offer
     */
    public function enter()
    {
      $reasons = UfaReason::query()
        ->get()
        ->all();

      $teams = TeamInfo::query()
        ->select('id', 'team')
        ->get();
      return view('enter_ufa_offer',
        ['reasons' => $reasons,
         'teams'  => $teams]);
    }

    /*
     * Save offer
     */
    public function store()//Request $request)
    {
      $this->layout = null;
      if(Request::ajax())
      {
        $response = array (
          'status'  => 'success',
          'msg'     => 'herpaderp'
        );
        return Response::json($response);
      } else {
        return 'Something went wrong with the form submission.';

      }
    }
}
