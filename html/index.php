<?php
require_once './app/inc/config.php';
require_once './app/controllers/ProductController.php';
require_once './app/views/Template.php';
$controller=$_GET['controller'];
$action=$_GET['action'];
$parameter=$_GET['parameter'];
/*if(!empty($_FILES)){
  $pro_gazou=$_FILES['gazou'];
  var_dump($pro_gazou);
  exit();
}*/
#echo $controller;
# $_POST[]がセットされていれば、URLパラメータに焼き直して
# index.phpを開きなおす処理
if(!empty($_POST))
{#POST送信された場合、URLパラメータに焼き直してindex.phpを開きなおす
  $location1=basename(__FILE__).'?';
  #$location='post2get_test.php'.'?';
  #var_dump($_POST);
  #echo '<br/>';
  foreach($_POST as $key => $value)
  {
    #echo $key.','.$value.'<br/>';
    if(strpos($key,'action=') !== false){
      $key=str_replace('action=','',$key);
      $value=$key;
      $key='action';
    }
    if(strpos($key,'controller=') !== false){
      $key=str_replace('controller=','',$key);
      $value=$key;
      $key='controller';
    }

    if($key=='controller'||$key=='action')
    {
      #echo $key.','.$value.'<br/>';
      #echo 'controller='.$value.'<br/>';
      $location1=$location1.'&'."$key=$value";
    }
    if($key=='procode'||$key=='pro_name'||$key=='pro_price'||$key=='pro_gazou_name')
    {
      $location2=$location2.'&'."$key=$value";
    }
  }
  if(!empty($_FILES))
  {
    #var_dump($_FILES);
    #exit();
    $pro_gazou=$_FILES['pro_gazou'];
    $pro_gazou_name=$pro_gazou['name'];
    # 画像が選択されたかどうか、サイズが大きすぎないかの確認
    if($pro_gazou['size'] > 0){
      if($pro_gazou['size'] > 1000000)
      {
        print '画像が大きすぎます。'.'<br/>';
      }else
      {
        move_uploaded_file($pro_gazou['tmp_name'],'./app/views/gazou/'.$pro_gazou['name']);
        #print '<img src="./gazou/'.$pro_gazou['name'].'">';
        #print '<br/>';
      }
    }
    #echo $pro_gazou_name;
    $location3='&pro_gazou_name='.$pro_gazou_name;
    #exit();
  }
  $location1=str_replace('?&','?',$location1);
  $location=$location1.$location2.$location3;
  #echo $location.'<br/>';
  header('Location:'.$location);
  exit();
}
if(empty($controller)){
  $tpl = new Template();
  $tpl->show('./app/views/admin_top.tpl');
  exit();
}
else{
  #echo 'コントローラーは'.$controller.'です';
  switch ($controller)
  {
  case 'staff':
    echo 'スタッフ一覧に飛びます';
    break;
  case 'product':
    switch ($action)
    {
    case 'list':
      # ProductListの商品一覧メソッドを呼び出す
      $ctl=new ProductList;
      $ctl->pro_list();
      break;
    case 'disp':
      #echo '参照画面に飛びます'.'<br/>';
      $ctl=new ProductList;
      $ctl->pro_disp();
      # ProductListの商品参照メソッドを呼び出す
      break;
    case 'add':
      #echo '追加画面に飛びます';
      # ProductListの商品追加メソッドを呼び出す
      $ctl=new ProductList;
      $ctl->pro_add();
      break;
    case 'add_check':
      #echo '追加確認画面に飛びます';
      #require_once './app/controllers/pro_add_check.php';
      $ctl=new ProductADD;
      $ctl->pro_add_check();
      break;
    case 'add_done':
      $ctl=new ProductADD;
      $ctl->pro_add_done();
      break;
    case 'edit':
      echo '修正画面に飛びます';
      # ProductListの商品編集メソッドを呼び出す
      break;
    case 'delete':
      echo '削除画面に飛びます';
    # ProductListの商品削除メソッドを呼び出す
      break;
    }
    break;
  }
}
?>
