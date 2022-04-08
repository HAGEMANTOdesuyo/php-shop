<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$pro_name = $_POST['name'];
$pro_price = $_POST['price'];
$pro_gazou_name = $_POST['gazou_name'];

$pro_name = htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price = htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

$dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
$user = 'root';
$password = 'pass';

try {
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'INSERT INTO mst_product(name,price,gazou) VALUES (?,?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $pro_name;
  $data[] = $pro_price;
  $data[] = $pro_gazou_name;
  $stmt->execute($data); # execeteはinputが配列

  $dbh = null; # データベースから切断
}
catch (Exception $e) {
  echo 'ただいま障害により大変ご迷惑をおかけしております。<br/>';
  print $pro_name.'<br/>';
  print $pro_price.'<br/>';
  echo '補足した例外：', $e->getMessage(), '<br/>';
  exit();
}

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>

  <?= $pro_name; ?>
  を追加しました。<br/>
  <a href="pro_list.php">戻る</a>

</body>
</html>
