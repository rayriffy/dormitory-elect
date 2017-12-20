<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $command=$_REQUEST['command'];
  if($command=="open")
    $stat=1;
  else if($command=="close")
    $stat=0;

  $conn=mysql_connect('localhost','dormelec','THBN0Bu86JRoJT8T') or die('ERR:Could not connect to MySQL');
  mysql_select_db('dormelec');
  mysql_query("SET NAMES UTF8");
  mysql_query("SET character_set_results=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_connection=utf8");

  if($stat==1)
  {
    $sql="UPDATE `system` SET `is_open`=1 WHERE 1";
    $query=mysql_query($sql);
    $sql="UPDATE `user` SET `is_vote`=0 WHERE 1";
    $query=mysql_query($sql);
  }
  else
  {
    $sql="UPDATE `system` SET `is_open`=0 WHERE 1";
    $query=mysql_query($sql);
    $sql="UPDATE `user` SET `is_vote`=1 WHERE 1";
    $query=mysql_query($sql);
  }

  setcookie('command_status',350,time()+600);
  mysql_close();
  header('Location: ./');
?>
