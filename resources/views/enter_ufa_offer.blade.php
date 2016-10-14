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
    $('#enter').disabled = true;
    $.ajax({
      type: "POST",
      url: '/enter_offer',
      data: $(this).serialize(),
      dataType: "json",
      // Print message and reset form
      success: function(data) {
        successHtml =  '<div class="alert alert-success">';
        successHtml += data['response']['msg'];
        successHtml += '</div>';
        $('#result').html(successHtml);
        $('#ufa')[0].reset();
      },
      error: function(data){
        var errors = data.responseJSON; // Grab Validation errors
        console.log(errors);
        errorHtml = '<div class="alert alert-danger"><ul>';
        $.each(errors, function(key, value) {
          errorHtml += '<li>' + value[0] + '</li>';
        });
        errorHtml += '</ul></div>';
        $('#result').html(errorHtml);
        $('#enter').disabled=false;
      }
    });
  });
});

</script>
    <div id="result">
    </div>
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
        <input id="enter" type ="submit" value="Enter" />
      </form>

    </div>
  @stop
