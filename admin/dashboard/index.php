<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  require_once '/config.php';

  $sql="SELECT * FROM `table_data` WHERE 1";
  $query=mysql_query($sql);
  $i=0;
  while($row=mysql_fetch_array($query))
  {
    $table_data[$i][0]=$row[0];
    $table_data[$i][1]=$row[1];
    $i++;
  }

  $sql="SELECT * FROM `system` WHERE 1";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $is_open=$row[0];
    $open_table_id=$row[1];
  }
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
  <div class="container">
    <div class="row">
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content black-text">
            <span class="card-title">Status</span>
            <div class="row">
              <p>Vote Status: <? if($is_open==0){ ?><b class="red-text">CLOSED</b><? } else { ?> <b class="green-text">OPEN</b> <? } ?></p>
              <p>Selected Table: <b><? echo $open_table_id; ?></b></p>
            </div>
            <div class="row">
              <a class="btn blue waves-effect waves-light col s12 <? if($is_open==1){ echo 'disabled'; } ?>" href="vote_controller.php?command=open">OPEN VOTE</a>
            </div>
            <div class="row">
              <a class="btn red waves-effect waves-light col s12 <? if($is_open==0){ echo 'disabled'; } ?>" href="vote_controller.php?command=close">CLOSE VOTE</a>
            </div>
          </div>
        </div>
      </div>
      <div class="col l8 s12">
        <div class="card">
          <div class="card-content black-text">
            <span class="card-title">Overview</span>
            <div class="row">
              <div class="col l6 s12">
                <div class="card">
                  <div class="card-content"><span class="card-title">Tables</span></div>
                    <table>
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th></th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?
                          $sql="SELECT * FROM `table_data` WHERE 1";
                          $query=mysql_query($sql);
                          while($row=mysql_fetch_array($query))
                          {
                        ?>
                        <tr>
                          <td><? echo $row[0]; ?></td>
                          <td><a href="edit/?id=<? echo $row[0]; ?>"><? echo $row[1]; ?></a></td>
                          <td><? if($open_table_id==$row[0]){ ?><button class="btn blue waves-effect waves-light disabled">SELECTED</button><? } else { ?><a class="btn blue waves-effect waves-light" href="table_controller.php?id=<? echo $row[0]; ?>">SELECT</a><? } ?></td>
                          <td><a href="javascript:window.open('result.php?id=<? echo $row[0]; ?>','viewscore','width=800,height=800')"><i class="material-icons">info_outline</i></a></td>
                        </tr>
                        <?
                          }
                        ?>
                      </tbody>
                    </table>
                </div>
              </div>
              <div class="col l6 s12">
                <div class="card">
                  <div class="card-content">
                    <span class="card-title">Add Tables</span>
                    <div class="row">
                      <form action="act_add_table.php" class="col s12" method="POST">
                        <div class="row">
                          <div class="input-field col s6">
                            <input id="table_name" name="table_name" type="text" class="validate" required>
                            <label for="table_name">Table Name</label>
                          </div>
                          <input type="hidden" name="new_id" value="<? echo $i+1; ?>" />
                          <button class="col s6 btn blue waves-effect waves-light" type="submit">ADD TABLE</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <center class="black-text">© <? if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> RiffyTech Corporation | <a href="https://github.com/rayriffy/dormitory-elect">GitHub</a></center>
  </div>

  <script src="/js/materialize.js"></script>
  <script src="/js/init.js" async></script>
</body>
<?
  mysql_close();
?>
</html>
