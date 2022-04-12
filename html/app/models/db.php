<?php
require '../inc/config.php';
#$dsn = DSN;
#$user = USER;
#$password = PASSWORD;

class CallMysql
{
  #const DSN_local="mysql:dbname=shop;host=localhost;charset=utf8";
  /*
  private $dsn, $user, $password;
  function __construct(){
    $this->dsn = DSN;
    $this->user = USER;
    $this->password = PASSWORD;
  }
  function printfordebug(){
    echo self::DSN_local;
  }
  */

function connect(){
  try
  {
    $dbh = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo '接続できました'."\n";
  }
  catch(Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    echo $e->getMessage();
    echo "\n";
    exit();
  }
}
/*
    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
  }
  */
}
$obj=new CallMysql;
$obj->connect();
#$obj->printfordebug();
?>
