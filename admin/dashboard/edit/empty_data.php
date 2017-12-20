<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $table_id=$_REQUEST['table_id'];

  $conn=mysql_connect('localhost','dormelec','THBN0Bu86JRoJT8T') or die('ERR:Could not connect to MySQL');
  mysql_select_db('dormelec');
  mysql_query("SET NAMES UTF8");
  mysql_query("SET character_set_results=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_connection=utf8");

  $sql="TRUNCATE `".$table_id."`";
  $query=mysql_query($sql);

  setcookie('command_status',650,time()+600);
  mysql_close();
  header('Location: ./?id='.$table_id);
?>
