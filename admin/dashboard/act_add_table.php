<?php
  if(!isset($_COOKIE['admin_session_id']) || !isset($_COOKIE['admin_login_stat']) || $_COOKIE['admin_login_stat']!=300)
  {
    header('Location: /');
  }

  $table_name=$_REQUEST['table_name'];
  $new_id=$_REQUEST['new_id'];

  require_once '/config.php';

  $sql="CREATE TABLE `".$new_id."` (`name` text COLLATE utf8_unicode_ci NOT NULL,`student_id` varchar(5) COLLATE utf8_unicode_ci NOT NULL,`score` int(255) NOT NULL DEFAULT '0') ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
  $query=mysql_query($sql);

  $sql="INSERT INTO `table_data`(`table_id`, `table_name`) VALUES (".$new_id.",'".$table_name."')";
  $query=mysql_query($sql);

  setcookie('command_status',340,time()+600);
  mysql_close();
  header('Location: ./');
?>
