<?php
# データベースから商品データを取得
include(__DIR__."/pro_list_db.php");
# 画面表示処理
include(__DIR__."/MyTemplate.class.php");

$tpl = new MyTemplate();
$tpl->result_ = $result;
$tpl->show('pro_list.tpl');
#echo var_dump($tpl->result_);
?>
