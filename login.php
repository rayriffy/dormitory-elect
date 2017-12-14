<?php
  // CONNECT TO SQL
  $conn=mysql_connect('localhost','dormelec','THBN0Bu86JRoJT8T') or die('ERR:Could not connect to MySQL');
  mysql_select_db('dormelec');
  $sql="SELECT * FROM `user` WHERE `token` LIKE '".$_REQUEST['token']."';";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $output_token=$row[0];
  }
  mysql_close();
  if($_REQUEST['token']==$output_token)
  {
    //SUCCESS
    setcookie('login_stat',300,time()+7200);
    setcookie('session_id',$output_token,time()+7200);
    header('Location: /dashboard');
  }
  else
  {
    setcookie('login_stat',700,time()+7200);
    header('Location: /');
  }
  echo $sql;
?>
