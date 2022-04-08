<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$staff_code = $_POST['code'];
$dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
$user = 'root';
$password = 'pass';

try {
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'DELETE FROM mst_staff WHERE code=?';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_code;
  $stmt->execute($data); # execeteはinputが配列

  $dbh = null; # データベースから切断
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

  削除しました。<br/><br/>
  <a href="staff_list.php">戻る</a>
</body>
</html>
