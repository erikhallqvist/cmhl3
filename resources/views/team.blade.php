<!-- resources/views/team.blade.php -->


  @extends('layouts.master')
  @section('content')
    <div class="infobox">
      <img src="/images/logos/TL{{$teaminfo->id}}.gif">
      {{$teaminfo->team}}
      GM: {{$teaminfo->gmname}}
    </div>
  @stop
