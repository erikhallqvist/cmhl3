<?php

namespace App\Http\Controllers;
use App\Models\UfaReason;
use App\Models\UfaOffer;
use App\Models\TeamInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

//use Request;

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
     * inline for now.
     */
    public function store(Request $request)
    {
      $this->layout = null;

      // First, light validation
      $this->validate($request, [
        'player'      => 'required|string|max:60',
        'years'       => 'required|numeric|min:1|max:4',
        'team'        => 'required|exists:teaminfo,team_id',
        'reason'      => 'required|exists:ufa_reasons,id',
        'salary'      => 'required|digits_between:6,8',
      ]);

      $input = $request->all();
      Log::info('Showing input var: '.$input['player']);
      $offer = new UfaOffer;

      //save these specific values:

      $offer->player_name = $input['player'];
      $offer->isAccepted = (1 == $input['reason']); // 1 Means accepted
      $offer->years = $input['years'];
      $offer->team_id = $input['team'];
      $offer->reason_id = $input['reason'];
      $offer->salary = $input['salary'];

      $offer->save();

      if($request->isMethod('post'))
      {
        $response = array (
          'status'  => 'success',
          'msg'     => $input['player'] . ' entered.'
        );
        return response()->json(['response' => $response]);
      } else {
        $response = [
          'status' => 'fail',
          'msg'    => 'Something went wrong with the form submission'
        ];
        return response()->json(['response' => $response]);
      }
    }
}
