<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$staff_name = $_POST['staff_name'];
$staff_pass = $_POST['staff_pass'];
$staff_name = htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass = htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
$user = 'root';
$password = 'pass';

try {
  $dbh = new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = 'INSERT INTO mst_staff(name,password) VALUES (?,?)';
  $stmt = $dbh->prepare($sql);
  $data[] = $staff_name;
  $data[] = $staff_pass;
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

  <?= $staff_name; ?>
  さんを追加しました。<br/>
  <a href="staff_list.php">戻る</a>

</body>
</html>
