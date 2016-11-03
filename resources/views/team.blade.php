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

        @if ($skill['status'] == 3)
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
        @endif
      @endforeach
    </table>

    <table>
      <tr>
        <th>Player</th>
        <th>SK</th>
        <th>DU</th>
        <th>EN</th>
        <th>SZ</th>
        <th>AG</th>
        <th>RB</th>
        <th>SC</th>
        <th>HS</th>
        <th>RT</th>
        <th>PH</th>
        <th>PS</th>
        <th>EX</th>
        <th>LD</th>
        <th>PO</th>
        <th>MO</th>
        <th>Years</th>
        <th>Cap Hit</th>
      </tr>


      @foreach ($gskills as $gskill)

        @if ($gskill['status'] == 3)
        <tr>
          <td>{{ $gskill['name'] }} </td>
          <td>{{ $gskill['sk'] }} </td>
          <td>{{ $gskill['du'] }} </td>
          <td>{{ $gskill['en'] }} </td>
          <td>{{ $gskill['sz'] }} </td>
          <td>{{ $gskill['ag'] }} </td>
          <td>{{ $gskill['rb'] }} </td>
          <td>{{ $gskill['sc'] }} </td>
          <td>{{ $gskill['hs'] }} </td>
          <td>{{ $gskill['rt'] }} </td>
          <td>{{ $gskill['ph'] }} </td>
          <td>{{ $gskill['ps'] }} </td>
          <td>{{ $gskill['ex'] }} </td>
          <td>{{ $gskill['ld'] }} </td>
          <td>{{ $gskill['po'] }} </td>
          <td>{{ $gskill['mo'] }} </td>
          <td>{{ $gskill['contract'] }} </td>
          <td>{{ $gskill['salary'] }} </td>
        </tr>
        @endif
      @endforeach
      </table>

      CMHL Skaters: ${{ $salaries['proskaters'] }}
      ICHF Skaters: ${{ 0.1 * $salaries['minorskaters'] }}
      CMHL Goalies: ${{ $salaries['progoalies'] }}
      ICHF Goalies: ${{ 0.1 * $salaries['minorgoalies'] }}
      Total Salary: ${{ $salaries['total'] }}



  @stop



