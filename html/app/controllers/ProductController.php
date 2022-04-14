<?php
require_once './app/models/db.php';
class ProductList
{
  function pro_list()
  {
    #var_dump($result); # ここでNULLだった
    $sql = 'SELECT code,name,price FROM mst_product WHERE 1';
    $sql_para = array('sql'=>$sql);
    $list_db=new CallMysql;
    $tpl = new Template();
    $tpl->result = $list_db->select($sql_para);
    $tpl->show('pro_list.tpl');
  }
  function pro_disp()
  {
    $procode=$_GET['procode'];
    #echo $procode;
    $tpl = new Template();
    $sql = 'SELECT name,price,gazou FROM mst_product WHERE code=?';
    $sql_para = array('sql'=>$sql,'procode'=>$procode);
    $disp_db=new CallMysql;
    $result_=$disp_db->select($sql_para);
    $result=$result_[0];
    #var_dump($result);
    #echo $result['price'];
    $tpl=new Template();
    $tpl->procode=$procode;
    $tpl->pro_name=$result['name'];
    $tpl->pro_price=$result['price'];
    $pro_gazou_name=$result['gazou'];
    if($pro_gazou_name=='')
    {
      $tpl->$disp_gazou='';
    }
    else
    {
      $tpl->disp_gazou='<img src="./app/views/gazou/'.$pro_gazou_name.'">';
    }
    $tpl->show('pro_disp.tpl');
  }
  function pro_add()
  {
    $tpl=new Template();
    $tpl->show('pro_add.tpl');
  }
  /*function pro_edit()
  {
    $tpl=new Template();
    $tpl->show('pro_edit.tpl');
  }*/
  /*function pro_delete()
  {
    $tpl=new Template();
    $tpl->show('pro_delete.tpl');
  }*/
}

Class ProductAdd
{
  private $pro_name, $pro_price, $pro_gazou;
  
  function __construct()
  {
    $this->pro_name=$_GET['name'];
    $this->pro_price=$_GET['price'];
    #$this->pro_gazou=$_FILES['gazou'];

    $this->pro_neme= htmlspecialchars($this->pro_name,ENT_QUOTES,'UTF-8');
    $this->pro_price= htmlspecialchars($this->pro_price,ENT_QUOTES,'UTF-8');
  }
  function inittest()
  {
    echo 'コンストラクタのテスト'.'<br/>';
    echo $this->pro_name.'<br/>';
    echo $this->pro_price.'<br/>';
  }
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
  function pro_add_check()
  {
    #$this->inittest();
    $check_proname=$this->check_proname($this->pro_name);
    $check_proprice=$this->check_proprice($this->pro_price);
    #echo $check_proname;
    #echo $check_proprice;
    $tpl=new Template();
    $tpl->pro_name=$this->pro_name;
    $tpl->pro_price=$this->pro_price;
    #$tpl->pro_gazou=$this->pro_gazou;
    $tpl->check_proname=$check_proname;
    $tpl->check_proprice=$check_proprice;
    $tpl->show('pro_add_check.tpl');
  }
/*# 画像が選択されたかどうか、サイズが大きすぎないかの確認
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
}*/

}






?>
