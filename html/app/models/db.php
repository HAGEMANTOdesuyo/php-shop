<?php
#require '../inc/config.php';
#$dsn = DSN;
#$user = USER;
#$password = PASSWORD;

class CallMysql
{
  #const DSN_local="mysql:dbname=shop;host=localhost;charset=utf8";
  # データベースに接続するメソッド
  function connect(){
    try
    {
      # コマンドライン上での確認用
      #$dbh = new PDO('mysql:dbname=shop;host=localhost:3306;charset=utf8', USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
      $dbh = new PDO(DSN, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
      $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      #echo '接続できました'."\n";
    }
    catch(Exception $e)
    {
      print 'ただいま障害により大変ご迷惑をおかけしております。';
      echo $e->getMessage();
      echo "\n";
      exit();
    }
    return $dbh;
  }
# SELECT文を使用する時のメソッド
  function select($sql_para)
  {
    $sql=$sql_para['sql'];
    $dbh = $this->connect();
    $stmt=$dbh->prepare($sql);
    if(!empty($sql_para['procode']))
    {# executeに渡すパラメータがありとなしで分岐
      $data[]=$sql_para['procode'];
      $stmt->execute($data);
    }else
    {
      $stmt->execute();
    }
    #var_dump($sql);
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    #var_dump($result);
    $dbh=null;
    return $result;
  }
# INSERT文を使用する時のメソッド
  function insert($sql_para)
  {
    $sql=$sql_para['sql'];
    #var_dump($sql_para);
    $dbh = $this->connect();
    $stmt=$dbh->prepare($sql);
    $data[]=$sql_para['pro_name'];
    $data[]=$sql_para['pro_price'];
    $data[]=$sql_para['pro_gazou_name'];
    $stmt->execute($data);
    #var_dump($sql);
    $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
    #var_dump($result);
    $dbh=null;
    return $result;
  }
}
?>
