<!-- resources/views/enter_ufa_offer.blade.php -->

  @extends('layouts.master')
  @section('content')

<script>
$(document).ready(function() {

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  $( '#ufa' ).on( 'submit', function(e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: '/enter_offer',
      data: $(this).serialize(),
      dataType: "json",
      success: function(data) {
        console.log(data)
      },
      error: function(data){
        console.log("fail");
      }
    });
  });
});
</script>
   <div class="infobox">

      <form id="ufa" name="ufa" >
        <label for="player">Player Name</label>
        <input name="player" type="text" value="" />
        <br>
        <label for="years">Number of Years</label>
        <select name="years">
          @for($i=1; $i<5; $i++)
            <option value={{ $i }}> {{ $i  }} </option>
          @endfor
        </select>
        </br>
        <label for="salary">Salary: $</label>
        <input name="salary" type="text" value="" />
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
