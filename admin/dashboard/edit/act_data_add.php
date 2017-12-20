<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $table_id=$_REQUEST['table_id'];
  $add_name=$_REQUEST['input_name'];
  $add_stu_id=$_REQUEST['student_id'];

  require_once '/config.php';

  $sql="INSERT INTO `".$table_id."`(`name`, `student_id`, `score`) VALUES ('".$add_name."','".$add_stu_id."',0)";
  $query=mysql_query($sql);

  setcookie('command_status',640,time()+600);
  mysql_close();
  header('Location: ./?id='.$table_id);
?>
