<?php
# データベースから商品データを取得
# 画面表示処理
include("./MyTemplate.class.php");

$tpl = new MyTemplate();
$tpl->show('admin_top.tpl');
#echo var_dump($tpl->result_);
?>
