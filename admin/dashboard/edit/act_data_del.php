<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $table_id=$_REQUEST['table_id'];
  $del_stu_id=$_REQUEST['student_id'];

  require_once '../config.php';

  $sql="DELETE FROM `".$table_id."` WHERE `student_id` LIKE '".$del_stu_id."'";
  $query=mysql_query($sql);

  setcookie('command_status',650,time()+600);
  mysql_close();
  header('Location: ./?id='.$table_id);
?>
