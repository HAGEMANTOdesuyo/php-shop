<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$pro_name=$_POST['name'];
$pro_price=$_POST['price'];
$pro_gazou=$_FILES['gazou'];

$pro_neme= htmlspecialchars($pro_name,ENT_QUOTES,'UTF-8');
$pro_pass= htmlspecialchars($pro_pass,ENT_QUOTES,'UTF-8');

function check_proname($pro_name)
{
  if($pro_name=='')# 商品名が入力されているかの確認処理
  {
    $result='商品名が入力されていません。<br/>';
  }
  else
  {
    $result='商品名：='.$pro_name.'<br/>';
  }
  return $result;
}
function check_proprice($pro_price)
{
  if(preg_match('/\A[0-9]+\z/', $pro_price)==0)
  {
    $result='価格をきちんと入力してください。'.'<br/>';
  }
  else
  {
    $result='価格：'.$pro_price.' 円<br/>';
  }
  return $result;
}

$check_proname=check_proname($pro_name);
$check_proprice=check_proprice($pro_price);


# 画像が選択されたかどうか、サイズが大きすぎないかの確認
if($pro_gazou['size'] > 0){
  if($pro_gazou['size'] > 1000000)
  {
    print '画像が大きすぎます。'.'<br/>';
  }else
  {
    move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
    print '<img src="./gazou/'.$pro_gazou['name'].'">';
    print '<br/>';
  }
}
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>
<?= $check_proname; ?>
<?= $check_proprice; ?>
  <?php # 入力欄に問題があれば、戻るボタンを表示する
  if ($pro_name==''||preg_match('/\A[0-9]+\z/', $pro_price)==0||$pro_gazou['size'] > 1000000) { ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{
    # 入力に問題がなければ、「OK」ボタンと「戻る」ボタンを表示する。
    # 「OK」ボタンをクリックされたら、データを連れて次の画面staff_add_done.phpへ飛ぶ
  ?>
    上記の商品を追加します。<br/>
    <form method="post" action="pro_add_done.php">
      <input type="hidden" name="name" value="<?= $pro_name; ?>">
      <input type="hidden" name="price" value="<?= $pro_price; ?>"> <br/>
      <input type="hidden" name="gazou_name" value="<?= $pro_gazou['name']; ?>"> <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  <?php } ?>

</body>
</html>
