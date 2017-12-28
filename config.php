<?
  $hostname='localhost';
  $username='dormelec';
  $password='3eRFxvXaKK0TLsn3aw5N';
  $dbname='dormelec';

  mysql_connect($hostname, $username, $password) OR DIE('Unable to connect to database! Please try again later.');
  mysql_select_db($dbname);
  mysql_query("SET NAMES UTF8");
  mysql_query("SET character_set_results=utf8");
  mysql_query("SET character_set_client=utf8");
  mysql_query("SET character_set_connection=utf8");
?>
