<!-- resources/views/ufa_offers.blade.php -->


  @extends('layouts.master')
  @section('content')
    <div>
      <ul class="result-list">
        @foreach ($offers as $offer)
          @if ($offer->isAccepted)
            <li class="alert-success">
          @else
            <li class="alert-error">
          @endif
              <img src="images/logos/TL{{ $offer->team_id  }}.gif" style="width:30px;height:30px" />
              {{ $offer->created_at }} {{ $offer->team }} offers {{ $offer->player_name}} a {{ $offer->years }}
              year contract worth ${{ $offer->salary }} per season. {{ $offer->reason }}
          </li>
        @endforeach
      </ul>
    </div>
  @stop

