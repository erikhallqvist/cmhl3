<?php
  $html_path = env("SIM_FILE_STORE", "") . env("SIM_SEASON", "") . '/' .
               env("LEAGUE_NAME", "") . env("SIM_SEASON", "");

?>

<div id="bannertop" >
  <a href="index.php">
    <div style="float:left; width:20%"><img src="/images/yandle.png" alt="CMHL Award Winners" border="0" /></div>
    <div style="float:left; width:59%"><img style="display: block; margin: 0 auto" src="/images/cmhl.png" /></div>
    <div style="float:right; text-align:right; width:20%"><img src="/images/coyotes.png" alt="Champ Logo" border="0" /></div>
  </a>
</div>
<nav>
  <div id="topnav">
    <ul>
      <li><a href="http://cmhlrangers.proboards.com/">Forums</a></li>
      <li><a href="#">League Vitals</a>
        <ul>
        <li><a href=<?= env('SIM_FILE_STORE', '') . env('SIM_SEASON', '') . "/"
        . env('LEAGUE_NAME', '') . env('SIM_SEASON', '') . ".stc"
        ?> >League File</a></li>
          <li><a href="#">Submit Lines</a></li>
          <li><a href="#">Team Info</a>
            <ul>
              <li><a href="#">General Managers</a></li>
              <li><a href="#">Coaches</a></li>
              <li><a href="#">Budgets</a></li>
            </ul>
          </li>
          <li><a href="#">League Staff</a></li>
          <li><a href="#">Deadlines</a></li>
        </ul>
      </li>
      <li><a href="#">Players</a>
        <ul>
          <li><a href="#">Search</a></li>
          <li><a href="#">Free Agents</a></li>
          <li><a href="#">Salary Negotiations</a>
            <ul>
              <li><a href="#">RFA/Loyalty</a></li>
              <li><a href="/ufa_offers">UFA</a></li>
            </ul>
          </li>
          <li><a href="<?=$html_path . '-TeamInjurySuspension.html'?>">Injuries/Suspensions</a></li>
        </ul>
      </li>
      <li><a href="#">Results</a>
        <ul>
          <li><a href="#">CMHL</a>
            <ul>
              <li><a href="<?=$html_path . '-TodayGames.html' ?>">Next Games</a></li>
              <li><a href="<?=$html_path .  '-Schedule.html' ?>">Schedule</a></li>
              <li><a href="<?=$html_path .  '-ProStanding.html' ?>">Standings</a></li>
            </ul>
          </li>
          <li><a href="#">ICHF</a>
            <ul>
              <li><a href="<?=$html_path . '-TodayGames.html' ?>">Next Games</a></li>
              <li><a href="<?=$html_path . '-FarmTeamSchedule.html' ?>">Schedule</a></li>
              <li><a href="<?=$html_path . '-FarmStanding.html' ?>">Standings</a></li>
            </ul>
          </li>
        </ul>
      </li>
      <li><a href="#">CMHL History</a>
        <ul>
          <li><a href="#">Trades</a></li>
          <li><a href="#">Draft</a></li>
          <li><a href="#">Awards</a></li>
          <li><a href="#">Season Archive</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>
