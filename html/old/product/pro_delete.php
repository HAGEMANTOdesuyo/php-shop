<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

  <?php
  # 選択された商品コードを受け取る
  #$pro_code=$_POST['procode'];
  $pro_code=$_GET['procode'];

  # データベース接続情報
  $dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
  $user = 'root';
  $password = 'pass';

  try{
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$pro_code;
    $stmt->execute($data);
    //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($result);
    $pro_name=$result['name'];
    //print $pro_name;

    $dbh = null;

  }
  catch(Exception $e)
  {
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
  }
  ?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>html template</title>
</head>
<body>
  商品削除<br/><br/>
  商品コード<br/>
  <?= $pro_code; ?><br/><br/>
  商品名<br/>
  <?= $pro_name; ?><br/>
  この商品を削除してよろしいですか？<br/><br/>

  <form method="POST" action="pro_delete_done.php">
    <input type="hidden" name="code" value="<?= $pro_code; ?>">
    <input type="submit" value="OK">
  </form>


</body>
</html>
