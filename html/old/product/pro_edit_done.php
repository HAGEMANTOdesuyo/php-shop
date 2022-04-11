<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$pro_code = $_POST['code'];
$pro_name = $_POST['name'];
$pro_price = $_POST['price'];
$pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou_name=$_POST['gazou_name'];
$dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
$user = 'root';
$password = 'pass';

try {
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'UPDATE mst_product SET name=?,price=?,gazou=? WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_gazou_name;
  $data[] = $pro_code;
  $stmt->execute($data); # execeteはinputが配列

  $dbh = null; # データベースから切断
  if($pro_gazou_name_old != $pro_gazou_name){
    if($pro_gazou_name_old !=''){
      unlink('./gazou/'.$pro_gazou_name_old);
    }
  }


}
catch (Exception $e) {
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>

  修正しました。<br/><br/>
  <a href="pro_list.php">戻る</a>
</body>
</html>
