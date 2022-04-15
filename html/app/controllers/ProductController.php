<?php
require_once './app/models/db.php';
class ProductList
{
  private $procode;
  private $sql, $sql_para;
  
  function __construct()
  {
    $this->sql_para['sql']=&$this->sql;
    $this->sql='';
    if(!empty($_GET['procode']))
    {
      $this->sql_para['procode']=&$this->procode;
      $this->procode=$_GET['procode'];
    }
  }

  function pro_list()
  {
    $this->sql='SELECT code,name,price FROM mst_product WHERE 1';
    #$sql_para = array('sql'=>$sql);
    $list_db=new CallMysql;
    $tpl = new Template();
    $tpl->result = $list_db->select($this->sql_para);
    $tpl->show('pro_list.tpl');
  }
  function pro_disp()
  {
    #echo $procode;
    if(empty($this->procode))
    {
      echo '商品を選択してください。'.'<br/><br/>';
      echo '<input type="button" onclick="history.back()" value="戻る">';
      exit();
    }
    $tpl=new Template();
    $this->sql='SELECT name,price,gazou FROM mst_product WHERE code=?';
    $disp_db=new CallMysql;
    $result_=$disp_db->select($this->sql_para);
    $result=$result_[0];
    #var_dump($result);
    #echo $result['price'];
    $tpl=new Template();
    $tpl->procode=$this->procode;
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
  private $pro_name, $pro_price, $pro_gazou_name;
  private $sql, $sql_para;
  
  function __construct()
  {
    $this->sql='';
    $this->sql_para['sql']=&$this->sql;
    if(!empty($_GET['pro_name']))
    {
      $this->sql_para['pro_name']=&$this->pro_name;
      $this->pro_name=$_GET['pro_name'];
      $this->pro_neme= htmlspecialchars($this->pro_name,ENT_QUOTES,'UTF-8');
    }
    if(!empty($_GET['pro_price']))
    {
      $this->sql_para['pro_price']=&$this->pro_price;
      $this->pro_price=$_GET['pro_price'];
      $this->pro_price= htmlspecialchars($this->pro_price,ENT_QUOTES,'UTF-8');
    }
    if(!empty($_GET['pro_gazou_name']))
    {
      $this->sql_para['pro_gazou_name']=&$this->pro_gazou_name;
      $this->pro_gazou_name=$_GET['pro_gazou_name'];
    }

  }
  function inittest()
  {
    echo 'コンストラクタのテスト'.'<br/>';
    echo $this->pro_name.'<br/>';
    echo $this->pro_price.'<br/>';
  }
  function check_proname()
  {
    if($this->pro_name=='')# 商品名が入力されているかの確認処理
    {
      $result='商品名が入力されていません。<br/>';
    }
    else
    {
      $result='商品名：'.$this->pro_name.'<br/>';
    }
    return $result;
  }
  function check_proprice()
  {
    if(preg_match('/\A[0-9]+\z/', $this->pro_price)==0)
    {
      $result='価格をきちんと入力してください。'.'<br/>';
    }
    else
    {
      $result='価格：'.$this->pro_price.' 円<br/>';
    }
    return $result;
  }
  function pro_add_check()
  {
    $check_proname=$this->check_proname($this->pro_name);
    $check_proprice=$this->check_proprice($this->pro_price);
    $tpl=new Template();
    $tpl->pro_name=$this->pro_name;
    $tpl->pro_price=$this->pro_price;
    $tpl->pro_gazou_name=$this->pro_gazou_name;
    #$tpl->pro_gazou=$this->pro_gazou;
    $tpl->check_proname=$check_proname;
    $tpl->check_proprice=$check_proprice;
    $tpl->show('pro_add_check.tpl');
  }

  function pro_add_done()
  {
    if(empty($this->pro_gazou_name))
    {
      $this->sql_para['pro_gazou_name']=&$this->pro_gazou_name;
      $this->pro_gazou_name='';
    }
    $this->sql='INSERT INTO mst_product(name,price,gazou) VALUES (?,?,?)';
    $add_db=new CallMysql;
    $add_db->insert($this->sql_para);
    $tpl=new Template();
    $tpl->pro_name=$this->pro_name;
    $tpl->show('pro_add_done.tpl');
  }

  /*
  */
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
