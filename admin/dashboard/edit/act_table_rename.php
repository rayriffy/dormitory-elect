<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $table_id=$_REQUEST['table_id'];
  $new_table_name=$_REQUEST['new_table_name'];

  require_once '../config.php';

  $sql="UPDATE `table_data` SET `table_name`='".$new_table_name."' WHERE `table_id` LIKE ".$table_id;
  $query=mysql_query($sql);

  setcookie('command_status',650,time()+600);
  mysql_close();
  header('Location: ./?id='.$table_id);
?>
