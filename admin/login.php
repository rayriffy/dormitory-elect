<?php
  // CONNECT TO SQL
  $conn=mysql_connect('localhost','dormelec','THBN0Bu86JRoJT8T') or die('ERR:Could not connect to MySQL');
  mysql_select_db('dormelec');
  $sql="SELECT * FROM `user_admin` WHERE `token` LIKE '".$_REQUEST['token']."';";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $output_token=$row[0];
  }
  mysql_close();
  if($_REQUEST['token']==$output_token)
  {
    //SUCCESS
    setcookie('admin_login_stat',300,time()+7200);
    setcookie('admin_session_id',$output_token,time()+7200);
    header('Location: /admin/dashboard');
  }
  else
  {
    setcookie('admin_login_stat',700,time()+7200);
    header('Location: /admin/');
  }
  echo $sql;
?>
