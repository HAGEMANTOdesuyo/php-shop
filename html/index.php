<?php
require_once './app/inc/config.php';
require_once './app/controllers/ProductController.php';
$controller=$_GET['controller'];
$action=$_GET['action'];
$parameter=$_GET['parameter'];
#echo $controller;
if(empty($controller)){
  #echo 'コントローラーが指定されていません';
  # 個々の処理は、できればController等に渡したい
  # 管理者と閲覧者をどうやってわけるかが決まるまでは保留
  require_once './app/views/Template.php';
  $tpl = new Template();
  $tpl->show('./app/views/admin_top.tpl');
  exit();
}
else{
  #echo 'コントローラーは'.$controller.'です';
  switch ($controller){
    case 'staff':
      echo 'スタッフ一覧に飛びます';
      break;
    case 'product':
      # ProductControllerの
      switch ($action) {
        case 'list':
          #echo '商品一覧に飛びます';

          # ProductControllerの商品一覧メソッドを呼び出す
          $list = new ProductController();
          $list->pro_list($result);
          break;
          case 'disp':
            echo '参照画面に飛びます';
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

        default:
          // code...
          break;
      }
      #header('Location: ./app/controllers/ProductController.php');
      break;
  }
}
echo '<br/>';
echo $parameter2.'<br/>';
echo $parameter3.'<br/>';
?>
