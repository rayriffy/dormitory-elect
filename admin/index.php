<!DOCTYPE html>
<script src="/js/jquery.min.js"></script>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Dormitory Elec</title>
  <noscript>
    <META HTTP-EQUIV="Refresh" CONTENT="0;URL=js_err.html">
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
  <script src="/js/companion.js" data-service-worker="/sw.js"></script>
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
      <div class="col l4 offset-l4 s10 offset-s1">
        <div class="card">
          <div class="card-content">
            <span class="card-title">Login</span>
            <div class="row">
              <form action="login.php" method="post">
                <?php
                  if(isset($_COOKIE['admin_login_stat']))
                  {
                    if($_COOKIE['admin_login_stat']==700) {
                ?>
                <div class="chip red lighten-1 white-text col s12">
                  <center>Invalid username/password :-(
                  <i class="close material-icons">close</i></center>
                </div>
                <?php
                    }
                    setcookie('admin_login_stat',700,time()-7200);
                  }
                ?>
                <div class="input-field col s12">
                  <input id="token_mo" type="password" name="token" class="validate" required>
                  <label for="token_mo">Token</label>
                </div>
                <button class="btn waves-effect waves-light blue col s12" type="submit">LOGIN</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <center class="white-text">© <? date_default_timezone_set("Asia/Bangkok"); if(date("Y")>2017){ echo '2017-'; } echo date("Y"); ?> <a class="white-text" href="https://facebook.com/rayriffy">Phumrapee Limpianchop</a> | <a class="white-text" href="https://github.com/rayriffy/dormitory-elect">GitHub</a></center>
  </div>

  <script src="/js/materialize.js"></script>
  <script src="/js/init.js" async></script>
</body>
</html>
