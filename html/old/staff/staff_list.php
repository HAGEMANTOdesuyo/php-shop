<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

  <?php
  # データベース接続情報
  $dsn = 'mysql:dbname=shop;host=mysql;charset=utf8';
  $user = 'root';
  $password = 'pass';

  try{
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
    $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = 'SELECT code,name FROM mst_staff WHERE 1';
    $stmt = $dbh->prepare($sql);
    $stmt->execute();

    $dbh = null;

    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //var_dump($result);
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
<title>ろくまる農園</title>
</head>
<body>
  スタッフ一覧<br/><br/>
  <form method="post" action="staff_branch.php">
    <?php foreach ($result as $row){ ?>
      <input type="radio" name="staffcode" value="<?= $row['code']; ?>">
      <?= $row['name'].'<br/>'; ?>
    <?php } ?>
    <br/>
    <input type="submit" name="disp" value="参照">
    <input type="submit" name="add" value="追加">
    <input type="submit" name="edit" value="修正">
    <input type="submit" name="delete" value="削除">
  </form>

</body>
</html>
