<?php
require_once './app/models/db.php';
class ProductController
{
  function pro_list()
  {
    $tpl = new Template();
    #var_dump($result); # ここでNULLだった
    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
    $list_db=new CallMysql;
    $tpl->result = $list_db->select($sql);
    $tpl->show('pro_list.tpl');
  }
  function pro_disp()
  {
    $tpl = new Template();
    $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
    $disp_db=new CallMysql;
    $tpl->result = $disp_db->select($sql);
    $tpl->show('pro_disp.tpl');
  }
}


?>
