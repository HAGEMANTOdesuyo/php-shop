<?php
# 飛ばすページを分岐するためのファイル
# 何も表示させないでただ分岐先に飛ばすだけ
# issetは変数がセットされているかを調べる関数

$pro_code=$_POST['procode'];
#var_dump($pro_code);
function Check_proCodeSlct(){
  # 商品コードが選ばれなかった場合、
  # NG画面(pro_ng.php)に飛び、プログラムを終了する関数
  # 何故かisset($pro_code)とすると常にfalse判定となった。要確認。
  if(isset($_POST['procode'])==false){
    #print '商品レコードが選ばれていません。';
    # header()は飛ばす前に何かを表示すると飛べなくなるので注意
    header('Location: pro_ng.php');
    exit();
  }
}

if(isset($_POST['disp'])==true){# 参照ボタンが押された場合
  Check_proCodeSlct();
  header('Location: pro_disp.php?procode='.$pro_code);
  exit();
}

if(isset($_POST['add'])==true){# 追加ボタンが押された場合
  header('Location:pro_add.php');
  exit();
}

if(isset($_POST['edit'])==true){# 修正ボタンが押された場合
  #print '修正ボタンが押された';
  # header()は飛ばす前に何かを表示すると飛べなくなるので注意


#  if(isset($pro_code)==false){
#    header('Location: pro_ng.php');
#    exit();
#  }
  Check_proCodeSlct();
  header('Location: pro_edit.php?procode='.$pro_code);# ?以降はURLパラメータ
  exit();
}

if(isset($_POST['delete'])==true){# 削除ボタンが押された場合
  #print '削除ボタンが押された';
  Check_proCodeSlct();
  #$test=isset($pro_code);
  #print $test;
  # header()は飛ばす前に何かを表示すると飛べなくなるので注意
  header('Location: pro_delete.php?procode='.$pro_code);
  exit();
}

?>
