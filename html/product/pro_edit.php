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

    $sql = 'SELECT name,price FROM mst_product WHERE code=?';
    $stmt = $dbh->prepare($sql);
    $data[]=$pro_code;
    $stmt->execute($data);
    //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($result);
    $pro_name=$result['name'];
    $pro_price=$result['price'];
    $pro_gatouz_name_old=$result['gazou'];
    //print $pro_name;

    $dbh = null;

    if($pro_gazou_name_old==''){
      $disp_gazou='';
    }else{
      $disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
    }

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
  商品修正<br/><br/>
  商品コード<br/>
  <?= $pro_code; ?><br/><br/>

  <form method="POST" action="pro_edit_check.php" enctype="multipart/form-data">
    <input type="hidden" name="code" value="<?= $pro_code; ?>">
    <input type="hidden" name="gazou_name_old" value="<?= $pro_gazou_name_old; ?>">
    商品名<br/>
    <input type="text" name="name" style="width:200px" value="<?= $pro_name; ?>"><br/>
    価格<br/>
    <input type="text" name="price" style="width:100px" value="<?= $pro_price; ?>"><br/>
    <?= $disp_gazou; ?><br/>
    画像を選んでください。<br/>
    <input type="file" name="gazou" style="width:400px"><br/><br/>
    <input type="button" onclick="history.back()" value="戻る">
    <input type="submit" value="OK">
  </form>


</body>
</html>
