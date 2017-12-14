<?php
  if(!isset($_COOKIE['session_id']) || !isset($_COOKIE['login_stat']) || $_COOKIE['login_stat']!=300)
  {
    header('Location: /');
  }
  $conn=mysql_connect('localhost','dormelec','THBN0Bu86JRoJT8T') or die('ERR:Could not connect to MySQL');
  mysql_select_db('dormelec');
  mysql_query("SET NAMES UTF8");
  mysql_query("SET character_set_results=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_connection=utf8");


  $sql="SELECT * FROM `system` WHERE 1";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $is_open=$row[0];
    $open_table_id=$row[1];
  }
  if($is_open==1)
  {
    $sql="SELECT * FROM `table_data` WHERE `table_id` LIKE '".$open_table_id."';";
    $query=mysql_query($sql);
    while($row=mysql_fetch_array($query))
    {
      $table_name=$row[1];
    }
  }
  $sql="SELECT `is_vote` FROM `user` WHERE `token` LIKE '".$_COOKIE['session_id']."'";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $voted=$row[0];
  }
?>
<!DOCTYPE html>
<script src="/js/jquery.min.js"></script>
<html lang="en">
<head>
  <meta http-equiv=Content-Type content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dormitory Elec</title>
  <noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=/js_err.html">
  </noscript>

  <!-- CSS -->
  <link rel="stylesheet" href="/css/critical.css" lazyload="1">
  <link rel="stylesheet" href="/css/main.css">
  <link rel="stylesheet" href="/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/css?family=Kanit:400,400i,700,700i|Material+Icons&amp;subset=thai" rel="stylesheet">
  <? //<link href="css/materialize.min.css" type="text/css" rel="preload" media="screen,projection" onload="this.rel='stylesheet'"> ?>


  <!-- Detail -->
  <meta name="Title" content="DMIS">
  <meta name="Keywords" content="dmis,mwit">
  <meta name="Description" content="DMIS by Mahidol Wittayanusorn School">

  <!-- Theme Color -->
  <meta name="theme-color" content="#0d47a1">
  <meta name="msapplication-navbutton-color" content="#0d47a1">
  <meta name="apple-mobile-web-app-status-bar-style" content="#0d47a1">

  <!-- MASSIVE ICONS -->
  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/img/ico/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/img/ico/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/img/ico/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/img/ico/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/img/ico/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/img/ico/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/img/ico/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/img/ico/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="/img/ico/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="/img/ico/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="/img/ico/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/img/ico/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="/img/ico/favicon-128.png" sizes="128x128" />

  <!-- PWA Standard -->
  <link rel="icon" type="image/png" href="/img/ico.png">
  <link rel="manifest" href="/manifest.json">
</head>

<noscript>
  ERROR: JavaScript disabled! For full functionality of this site it is necessary to enable JavaScript.
  Here are the <a href="http://www.enable-javascript.com/" target="_blank">
  instructions how to enable JavaScript in your web browser</a>.
</noscript>

<div id="preloader">
	<div id="status">&nbsp;</div>
</div>
<script type="text/javascript">
  $(window).on('load', function() { // SHOW PRELOAD UNTIL PAGE IS COMPLETELY LOADED
    $('#status').fadeOut();
    $('#preloader').delay(500).fadeOut('slow');
    $('body').delay(350).css({'overflow':'visible'});
  })
</script>

<body class="blue darken-2">
  <div class="container" id="centering">
    <div class="row">
      <div class="col l6 offset-l3 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title"><? if($is_open==0){ echo 'Dashboard'; } else { echo $table_name; } ?></span>
            <div class="row">
              <?php
                if($is_open==1 && $voted!=1)
                {
              ?>
              <form action="send_vote.php" method="post">
              <?
                  $sql="SELECT * FROM `".$open_table_id."` WHERE 1;";
                  $query=mysql_query($sql);
                  while($row=mysql_fetch_array($query))
                  {
                    $img="window.open('http://10.40.50.50:8080/MahidolGateSystem/PersonalImage/".$row[1].".jpg', '_blank');";
              ?>
                <p>
                  <input name="vote" value="<? echo $row[1]; ?>" type="radio" id="<? echo $row[1]; ?>" />
                  <label for="<? echo $row[1]; ?>"><? echo html_entity_decode($row[0]); ?>  <i class="material-icons" onclick="<? echo $img; ?>">image</i></label>
                </p>
              <?
                  }
              ?>
                <br />
                <input type="hidden" name="table_id" value="<? echo $open_table_id; ?>">
                <button class="btn waves-effect waves-light blue col s12" type="submit">Submit</button>
            </form>
              <?
                }
                else
                {
              ?>
              <center><p class="flow-text"><? if($voted==1) { echo 'Voted! '; } ?>Please Wait</p></center>
              <?
                }
                mysql_close();
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <center class="white-text">© <? date_default_timezone_set("Asia/Bangkok"); if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> RiffyTech Corporation</center>
  </div>

  <script src="/js/materialize.js"></script>
  <script src="/js/init.js" async></script>
</body>
</html>
