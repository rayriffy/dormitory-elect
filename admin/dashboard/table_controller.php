<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $id=$_REQUEST['id'];

  require_once '/config.php';

  $sql="UPDATE `system` SET `open_table_id`=".$id." WHERE 1";
  $query=mysql_query($sql);

  setcookie('command_status',360,time()+600);
  mysql_close();
  header('Location: ./');
?>
