<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?= $v->check_proname; ?>
<?= $v->check_proprice; ?>
  <?php # 入力欄に問題があれば、戻るボタンを表示する
  if ($v->pro_name==''||preg_match('/\A[0-9]+\z/', $v->pro_price)==0||$v->pro_gazou['size'] > 1000000) { ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{
    # 入力に問題がなければ、「OK」ボタンと「戻る」ボタンを表示する。
    # 「OK」ボタンをクリックされたら、データを連れて次の画面staff_add_done.phpへ飛ぶ
  ?>
    上記の商品を追加します。<br/>
    <form method="post" action="pro_add_done.php">
      <input type="hidden" name="name" value="<?= $v->pro_name; ?>">
      <input type="hidden" name="price" value="<?= $v->pro_price; ?>"> <br/>
      <input type="hidden" name="gazou_name" value="<?= $v->pro_gazou['name']; ?>"> <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  <?php } ?>

</body>
</html>
