<?php
# 飛ばすページを分岐するためのファイル
# 何も表示させないでただ分岐先に飛ばすだけ
# issetは変数がセットされているかを調べる関数

$staff_code=$_POST['staffcode'];
#var_dump($staff_code);
function Check_StaffCodeSlct(){
  # スタッフコードが選ばれなかった場合、
  # NG画面(staff_ng.php)に飛び、プログラムを終了する関数
  # 何故かisset($staff_code)とすると常にfalse判定となった。要確認。
  if(isset($_POST['staffcode'])==false){
    #print 'スタッフレコードが選ばれていません。';
    # header()は飛ばす前に何かを表示すると飛べなくなるので注意
    header('Location: staff_ng.php');
    exit();
  }
}

if(isset($_POST['disp'])==true){# 参照ボタンが押された場合
  Check_StaffCodeSlct();
  header('Location: staff_disp.php?staffcode='.$staff_code);
  exit();
}

if(isset($_POST['add'])==true){# 追加ボタンが押された場合
  header('Location:staff_add.php');
  exit();
}

if(isset($_POST['edit'])==true){# 修正ボタンが押された場合
  #print '修正ボタンが押された';
  # header()は飛ばす前に何かを表示すると飛べなくなるので注意


#  if(isset($staff_code)==false){
#    header('Location: staff_ng.php');
#    exit();
#  }
  Check_StaffCodeSlct();
  header('Location: staff_edit.php?staffcode='.$staff_code);# ?以降はURLパラメータ
  exit();
}

if(isset($_POST['delete'])==true){# 削除ボタンが押された場合
  #print '削除ボタンが押された';
  Check_StaffCodeSlct();
  #$test=isset($staff_code);
  #print $test;
  # header()は飛ばす前に何かを表示すると飛べなくなるので注意
  header('Location: staff_delete.php?staffcode='.$staff_code);
  exit();
}

?>
