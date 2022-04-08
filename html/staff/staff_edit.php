<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

  <?php
  # 選択されたスタッフコードを受け取る
  #$staff_code=$_POST['staffcode'];
  $staff_code=$_GET['staffcode'];

  # データベース接続情報
  $dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
  $user = 'root';
  $password = 'pass';

  try{
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT name FROM mst_staff WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$staff_code;
    $stmt->execute($data);
    //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($result);
    $staff_name=$result['name'];
    //print $staff_name;

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
  スタッフ修正<br/><br/>
  スタッフコード<br/>
  <?= $staff_code; ?><br/><br/>

  <form method="POST" action="staff_edit_check.php">
    <input type="hidden" name="code" value="<?= $staff_code; ?>">
    スタッフ名<br/>
    <input type="text" name="name" style="width:200px" value="<?= $staff_name; ?>"><br/>
    パスワードを入力してください。<br/>
    <input type="text" name="pass" style="width:100px"><br/>
    パスワードをもう一度入力してください。<br/>
    <input type="text" name="pass2" style="width:100px"><br/><br/>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
  </form>


</body>
</html>
