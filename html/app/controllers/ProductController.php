<?php
# データベースから商品データを取得
include("../models/pro_list_db.php");
# 画面表示処理
include("./MyTemplate.class.php");


function pro_list(){
  $tpl = new MyTemplate();
  $tpl->result_ = $result;
  $tpl->show('pro_list.tpl');
#echo var_dump($tpl->result_);
}

function pro_disp(){
  $tpl = new MyTemplate();
  $tpl->result_ = $result;
  $tpl->show('pro_list.tpl');
#echo var_dump($tpl->result_);
}

?>
