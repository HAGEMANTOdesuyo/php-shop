<?php
$controller=$_GET['controller'];
$parameter2=$_GET['parameter2'];
$parameter3=$_GET['parameter3'];
#echo $controller;
if(empty($controller)){
  #echo 'コントローラーが指定されていません';
  # heaer()より前で何も出力してはいけない
  header('Location: ./app/controllers/admin_top.php');
  exit();
}
else{
  #echo 'コントローラーは'.$controller.'です';
  switch($controller){
    case 'staff_list':
      echo 'スタッフ一覧に飛びます';
      break;
    case 'product':
      #echo '商品リストに飛びます';
      header('Location: ./app/controllers/ProductController.php');
      break;
  }
}
echo '<br/>';
echo $parameter2.'<br/>';
echo $parameter3.'<br/>';
?>
