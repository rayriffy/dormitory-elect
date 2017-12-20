<?php
  if(!isset($_COOKIE['session_id']) || !isset($_COOKIE['login_stat']) || $_COOKIE['login_stat']!=300)
  {
    header('Location: /');
  }
  else if(!isset($_REQUEST['table_id']) || !isset($_REQUEST['vote']))
  {
    header('Location: ./');
  }

  $vote_table=(int)$_REQUEST['table_id'];
  $recived_vote=(string)$_REQUEST['vote'];

  require_once '/config.php';

  // CHECK IS THIS TABLE ACTIVE
  $sql="SELECT * FROM `system` WHERE 1";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $is_open=$row[0];
    $open_table_id=$row[1];
  }
  if($is_open==0)
  {
    mysql_close();
    die("Vote closed! <a href='./'>Back</a>");
  }

  else if($open_table_id!=$vote_table)
  {
    mysql_close();
    echo 'SQL: '.$open_table_id;
    echo '<br />FORM: '.$_REQUEST['table_id'];
    echo '<br />VOTE: '.$recived_vote;
    echo("<br />System B R O K E<br /><a href='./'>Try again</a>");
    exit();
  }


  // VERIFY IDENTITY
  $sql="SELECT * FROM `user` WHERE `token` LIKE '".$_COOKIE['session_id']."';";
  $query=mysql_query($sql);
  while($row=mysql_fetch_array($query))
  {
    $output_token=$row[0];
    $is_vote=$row[1];
  }
  if($output_token!=$_COOKIE['session_id'])
  {
    setcookie('login_stat',null,time()-7200);
    setcookie('session_id',null,time()-7200);
    mysql_close();
    die("ERROR: Violated token, please login again <a href='/'>here</a>");
  }
  if($is_vote==1)
  {
    mysql_close();
    header('Location: ./');
    exit();
  }

  // SEND VOTE
  $sql="UPDATE `".$vote_table."` SET `score`=`score`+1 WHERE `student_id` LIKE '".$recived_vote."';";
  $query=mysql_query($sql);
  if(!$query)
  {
    mysql_close();
    die("ERROR: Unexpected query! <a href='./'>Back</a>");
  }
  else
  {
    // UPDATE VOTE STATUS
    $sql="UPDATE `user` SET `is_vote`=1 WHERE `token` LIKE '".$_COOKIE['session_id']."'";
    $query=mysql_query($sql);
  }

  //COMPLETE CYCLE
  mysql_close();
  header('Location: ./');
?>
