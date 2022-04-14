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

$tpl=new Template();
$tpl->pro_name=$pro_name;
$tpl->pro_price=$pro_price;
$tpl->pro_gazou=$pro_gazou;
$tpl->check_proname=$check_proname;
$tpl->check_proprice=$check_proprice;
$tpl->show('pro_add_check.tpl');

?>
