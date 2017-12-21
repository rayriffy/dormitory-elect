<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  require_once '/config.php';

  if(!isset($_REQUEST['id']))
  {
    die("ERR: Invalid request! <a href='../'>Back</a>");
  }

  $table_id=$_REQUEST['id'];
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
      <div class="col l10 offset-l1 s12">
        <div class="card">
          <div class="card-content black-text">
            <?
             $sql="SELECT `table_name` FROM `table_data` WHERE `table_id` LIKE ".$table_id;
             $query=mysql_query($sql);
             while($row=mysql_fetch_array($query))
             {
               $table_name=$row[0];
             }
            ?>
            <span class="card-title">Editing <? echo $table_name; ?></span>
            <div class="row">
              <div class="col s12">
                <table>
                  <thead>
                    <tr>
                      <th>Name</th>
                      <th>Student ID</th>
                      <th>Score</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?
                      $sql="SELECT * FROM `".$table_id."` WHERE 1";
                      $query=mysql_query($sql);
                      while($row=mysql_fetch_array($query))
                      {
                    ?>
                    <tr>
                      <td><? echo $row[0]; ?></td>
                      <td><? echo $row[1]; ?></td>
                      <td><? echo $row[2]; ?></td>
                    </tr>
                    <?
                      }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Add Data</span>
            <div class="row">
              <form action="act_data_add.php" class="col s12" method="POST">
                <div class="row">
                  <div class="input-field col s6">
                    <input id="input_name" name="input_name" type="text" class="validate">
                    <label for="input_name">Name</label>
                  </div>
                  <div class="input-field col s6">
                    <input id="student_id" name="student_id" type="text" class="validate">
                    <label for="student_id">Student ID</label>
                  </div>
                  <input type="hidden" name="table_id" value="<? echo $table_id; ?>" />
                  <button class="col s12 btn blue waves-effect waves-light" type="submit">EXECUTE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Remove Data</span>
            <div class="row">
              <form action="act_data_del.php" class="col s12" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="student_id" name="student_id" type="text" class="validate">
                    <label for="student_id">Student ID</label>
                  </div>
                  <input type="hidden" name="table_id" value="<? echo $table_id; ?>" />
                  <button class="col s12 btn red waves-effect waves-light" type="submit">EXECUTE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Rename Table</span>
            <div class="row">
              <form action="act_table_rename.php" class="col s12" method="POST">
                <div class="row">
                  <div class="input-field col s12">
                    <input id="new_table_name" name="new_table_name" type="text" class="validate">
                    <label for="new_table_name">Rename to...</label>
                  </div>
                  <input type="hidden" name="table_id" value="<? echo $table_id; ?>" />
                  <button class="col s12 btn blue waves-effect waves-light" type="submit">EXECUTE</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col l4 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Others</span>
            <div class="row">
              <form action="reset_score.php">
                <input type="hidden" name="table_id" value="<? echo $table_id; ?>" />
                <button class="col s12 btn red waves-effect waves-light" type="submit">RESET SCORE</button>
              </form>
            </div>
            <div class="row">
              <form action="empty_data.php">
                <input type="hidden" name="table_id" value="<? echo $table_id; ?>" />
                <button class="col s12 btn red waves-effect waves-light" type="submit">EMPTY DATA</button>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div class="col l8 s12">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Done?</span>
            <div class="row">
              <a class="col s6 offset-s3 btn-large blue waves-effect waves-light" href="../">BACK</a>
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
