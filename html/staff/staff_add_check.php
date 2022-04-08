<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">

<?php

$staff_name=$_POST['name'];
$staff_pass=$_POST['pass'];
$staff_pass2=$_POST['pass2'];

$staff_neme= htmlspecialchars($staff_name,ENT_QUOTES,'UTF-8');
$staff_pass= htmlspecialchars($staff_pass,ENT_QUOTES,'UTF-8');
$staff_pass2= htmlspecialchars($staff_pass2,ENT_QUOTES,'UTF-8');

?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ろくまる農園</title>
</head>
<body>
  <?php # スタッフ名が入力されているかの確認処理
  if($staff_name=='') { ?>
    スタッフ名が入力されていません。<br/>
  <?php }else{ ?>
    スタッフ名：<?= $staff_name; ?>
  <?php } ?><br/>
  <?php # パスワードが入力されていなければ警告を出す処理
  if($staff_pass==''){ ?> パスワードが入力されていません。<br/> <?php } ?>
  <?php # パスワードと確認用パスワードが一致していなければ警告を出す処理
  if($staff_pass!=$staff_pass2) { ?> パスワードが一致しません。<br/> <?php }?>
  <?php # 入力欄に問題があれば、戻るボタンを表示する
  if ($staff_name==''||$staff_pass==''||$staff_pass!=$staff_pass2) { ?>
    <form>
      <input type="button" onclick="history.back()" value="戻る">
    </form>
  <?php }else{
    # 入力に問題がなければ、「OK」ボタンと「戻る」ボタンを表示する。
    # 「OK」ボタンをクリックされたら、データを連れて次の画面staff_add_done.phpへ飛ぶ
  ?>
    <form method="post" action="staff_add_done.php">
      <input type="hidden" name="staff_name" value="<?= $staff_name ?>">
      <input type="hidden" name="staff_pass" value="<?= $staff_pass ?>"> <br/>
      <input type="button" onclick="history.back()" value="戻る">
      <input type="submit" value="OK">
    </form>
  <?php } ?>

</body>
</html>
