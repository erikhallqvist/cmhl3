<!-- resources/views/team.blade.php -->


  @extends('layouts.master')
  @section('content')
    <div class="infobox">
      <img src="/images/logos/TL{{$teaminfo->id}}.gif">
      {{$teaminfo->team}}
      GM: {{$teaminfo->gmname}}
    </div>
    <table>
      <tr>
        <th>Player</th>
        <th>CK</th>
        <th>FG</th>
        <th>DI</th>
        <th>SK</th>
        <th>ST</th>
        <th>DU</th>
        <th>PH</th>
        <th>FO</th>
        <th>PA</th>
        <th>SC</th>
        <th>DF</th>
        <th>EX</th>
        <th>LD</th>
        <th>MO</th>
        <th>Years</th>
        <th>Cap Hit</th>
      </tr>


      @foreach ($skills as $skill)
        <tr>
          <td>{{ $skill['name'] }} </td>
          <td>{{ $skill['CK'] }} </td>
          <td>{{ $skill['FG'] }} </td>
          <td>{{ $skill['DI'] }} </td>
          <td>{{ $skill['SK'] }} </td>
          <td>{{ $skill['ST'] }} </td>
          <td>{{ $skill['DU'] }} </td>
          <td>{{ $skill['PH'] }} </td>
          <td>{{ $skill['FO'] }} </td>
          <td>{{ $skill['PA'] }} </td>
          <td>{{ $skill['SC'] }} </td>
          <td>{{ $skill['DF'] }} </td>
          <td>{{ $skill['EX'] }} </td>
          <td>{{ $skill['LD'] }} </td>
          <td>{{ $skill['MO'] }} </td>
          <td>{{ $skill['contract'] }} </td>
          <td>{{ $skill['salary'] }} </td>
        </tr>
      @endforeach

    </table>
  @stop
