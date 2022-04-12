<?php
# データベースから商品データを取得
require_once './app/models/db.php';
# 画面表示処理
require_once './app/views/Template.php';
#var_dump($result); # ここではちゃんと値が入っていた
/*function pro_list($result){
  $tpl = new Template();
  #var_dump($result); # ここでNULLだった
  $tpl->result = $result;
  $tpl->show('pro_list.tpl');
}
pro_list($result);
*/
class ProductController{
  function pro_list($result){
    $tpl = new Template();
    #var_dump($result); # ここでNULLだった
    $tpl->result = $result;
    $tpl->show('pro_list.tpl');
  }
}

#$obj = new ProductController();
#echo var_dump($tpl->result_);
#var_dump($result);
#$obj->pro_list($result);
#var_dump($obj->test);

?>
