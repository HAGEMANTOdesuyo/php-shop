<?php

#$dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
#$user = 'root';
#$password = 'pass';

try{
  $dbh = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
  $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
  $stmt = $dbh->prepare($sql);
  $stmt->execute();

  $dbh = null;

  $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
  //var_dump($result);
}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  echo $e->getMessage();
  echo "\n";
  exit();
}
?>
