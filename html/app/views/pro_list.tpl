<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>
  商品一覧<br/><br/>
  <form method="post" action="index.php">
    <input type="hidden" name="controller" value="product">
    <?php foreach ($v->result as $row){ ?>
      <input type="radio" name="procode" value="<?= $row['code']; ?>">
      <?= $row['name'].'...'.$row['price'].'円'; ?><br/>
      <!--<?= var_dump($row); ?>-->
    <?php } ?>
    <br/>
    <input type="submit" name="action_disp" value="参照">
    <input type="submit" name="action_add" value="追加">
    <input type="submit" name="action_edit" value="修正">
    <input type="submit" name="action_delete" value="削除">
  </form>

</body>
</html>
