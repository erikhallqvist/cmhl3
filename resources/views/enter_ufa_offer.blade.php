<!-- resources/views/enter_ufa_offer.blade.php -->

  @extends('layouts.master')
  @section('content')

<script>
$(document).ready(function() {
console.log($('#ufa'));
$( '#ufa' ).on( 'submit', function(e) {
  e.preventDefault();
  $.ajax({
    type: "post",
    url: '/enter_offer',
    data: "test",
    dataType: "json",
    success: function( msg ) {
                  $("body").append("<div>"+msg+"</div>");
    },
    error: function(data){
      alert("fail");
    }
  });
});
});
</script>
   <div class="infobox">

      <form id="ufa" name="ufa" >
        <label for="player">Player Name</label>
        <input id="player" type="text" value="" />
        <br>
        <label for="years">Number of Years</label>
        <select name="years">
          @for($i=1; $i<5; $i++)
            <option value={{ $i }}> {{ $i  }} </option>
          @endfor
        </select>
        </br>
        <label for="salary">Salary: $</label>
        <input id="salary" type="text" value="" />
        <br>
        <label for="team">Team</label>
        <select name="team">
          @foreach ($teams as $team)
            <option value={{ $team->id }}>{{ $team->team }}</option>
          @endforeach
        </select>
        <br>
        <label for="reason">Signs?</label>
        <select name="reason">
          @foreach ($reasons as $reason)
            <option value={{ $reason->id}}> {{$reason->reason }}</option>
          @endforeach
        </select>
        <br>
        <input type ="submit" value="Enter" />
      </form>

    </div>
  @stop
