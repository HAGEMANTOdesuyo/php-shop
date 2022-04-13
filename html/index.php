<?php
require_once './app/inc/config.php';
require_once './app/controllers/ProductController.php';
require_once './app/views/Template.php';
$controller=$_GET['controller'];
$action=$_GET['action'];
$parameter=$_GET['parameter'];
#echo $controller;
# $_POST[]がセットされていれば、URLパラメータに焼き直して
# index.phpを開きなおす処理
if(!empty($_POST))
{#POST送信された場合、URLパラメータに焼き直してindex.phpを開きなおす
  $location=basename(__FILE__).'?';
  #$location='post2get_test.php'.'?';
  #var_dump($_POST);
  foreach($_POST as $key => $value)
  {
    #echo $key.','.$value.'<br/>';
    if(strpos($key,'action_') !== false){
      $key=str_replace('action_','',$key);
      $value=$key;
      $key='action';
    }
    if(strpos($key,'controller_') !== false){
      $key=str_replace('controller_','',$key);
      $value=$key;
      $key='controller';
    }

    if($key=='controller'||$key=='action')
    {
      #echo $key.','.$value.'<br/>';
      #echo 'controller='.$value.'<br/>';
      $location=$location.'&'."$key=$value";
    }
  }
  $location=str_replace('?&','?',$location);
  #echo $location.'<br/>';
  header('Location:'.$location);
  exit();
}
if(empty($controller)){
  #echo 'コントローラーが指定されていません';
  # 個々の処理は、できればController等に渡したい
  # 管理者と閲覧者をどうやってわけるかが決まるまでは保留
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
    # ProductControllerの
    switch ($action)
    {
    case 'list':
      # ProductControllerの商品一覧メソッドを呼び出す
      $list = new ProductController;
      $list->pro_list();
      break;
    case 'disp':
      echo '参照画面に飛びます';
      $disp = new ProductController;
      $disp->pro_disp();
      # ProductControllerの商品参照メソッドを呼び出す
      break;
    case 'add':
      echo '追加画面に飛びます';
      # ProductControllerの商品追加メソッドを呼び出す
      break;
    case 'edit':
      echo '修正画面に飛びます';
      # ProductControllerの商品編集メソッドを呼び出す
      break;
    case 'delete':
      echo '削除画面に飛びます';
    # ProductControllerの商品削除メソッドを呼び出す
      break;
    }
    break;
  }
}
?>
