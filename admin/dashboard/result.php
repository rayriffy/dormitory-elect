<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  require_once '/config.php';

  $table_id=$_REQUEST['id'];

  /*$sql="SELECT * FROM `system` WHERE 1";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $is_open=$row[0];
    $open_table_id=$row[1];
  } */
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

<body>
  <canvas id="chart" width="100%" height="100%"></canvas>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.js"></script>
  <script>
    var data = {
      datasets: [{
        data: [<?
            $sql="SELECT `score` FROM `".$table_id."` WHERE 1";
            $query=mysql_query($sql);
            $i=0;
            while($row=mysql_fetch_array($query))
            {
              if($i!=0)
                echo ",";
              echo $row[0];
              $i++;
            }
          ?>],
        backgroundColor:["#00acc1","#1e88e5","#7cb342","#43a047","#039be5","#00897b","#c0ca33","#6d4c41","#3949ab","#e53935","#d81b60","#fb8c00","#5e35b1","#f4511e","#fdd835","#ffb300","#8e24aa"]
      }],

      // These labels appear in the legend and in the tooltips when hovering different arcs
      labels: [<?
          $sql="SELECT `name` FROM `".$table_id."` WHERE 1";
          $query=mysql_query($sql);
          $i=0;
          while($row=mysql_fetch_array($query))
          {
            if($i!=0)
              echo ",";
            echo "'".$row[0]."'";
            $i++;
          }
        ?>],
    };
    var ctx = document.getElementById("chart");
    var chart = new Chart(ctx, {
      type: 'doughnut',
      data: data
    });
  </script>

  <script src="/js/materialize.js"></script>
  <script src="/js/init.js" async></script>
</body>
<?
  mysql_close();
?>
</html>
