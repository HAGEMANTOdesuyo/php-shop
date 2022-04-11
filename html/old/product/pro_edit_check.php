<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$pro_code=$_POST['code'];
$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou_name_old=$_POST['gazou_name_old'];
$pro_gazou=$_FILES['gazou'];
#print '※デバッグ：'.$pro_price.'<br/>';

$pro_neme= htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_price= htmlspecialchars($pro_price,ENT_QUOTES,'UTF-8');

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>
  <?php # 商品名が入力されているかの確認処理
  if($pro_name=='') { ?>
    商品名が入力されていません。<br/>
  <?php }else{ ?>
    商品名：<?= $pro_name;?><br/>
    価格：<?= $pro_price.'円';?><br/>
    上記のように変更します。
  <?php } ?>
  <?php # 価格が入力されていなければ警告を出す処理
  if($pro_price==''){ ?> 価格が入力されていません。<br/> <?php } ?>
  <?php
  # 画像が選択されたかどうか、サイズが大きすぎないかの確認
  if($pro_gazou['size'] > 0){
    if($pro_gazou['size'] > 1000000){
      print '画像が大きすぎます。';
    }else{
      move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
      print '<img src="./gazou/'.$pro_gazou['name'].'">';
      print '<br/>';
    }
  }
  ?>
  <?php # 入力欄に問題があれば、戻るボタンを表示する
  if ($pro_name==''||$pro_price==''||$pro_gazou['size'] > 1000000) { ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{
    # 入力に問題がなければ、「OK」ボタンと「戻る」ボタンを表示する。
    # 「OK」ボタンをクリックされたら、データを連れて次の画面pro_add_done.phpへ飛ぶ
  ?>
    <form method="post" action="pro_edit_done.php">
      <input type="hidden" name="code" value="<?= $pro_code ?>">
      <input type="hidden" name="name" value="<?= $pro_name ?>">
      <input type="hidden" name="price" value="<?= $pro_price ?>">
      <input type="hidden" name="gazou_name_old" value="<?= $pro_gazou_name_old; ?>">
      <input type="hidden" name="gazou_name" value="<?= $pro_gazou['name']; ?>">
      <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  <?php } ?>

</body>
</html>
