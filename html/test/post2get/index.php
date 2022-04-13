<?php
if(!empty($_POST))
{#POST送信された場合、URLパラメータに焼き直してindex.phpを開きなおす
  $location=basename(__FILE__).'?';
  foreach($_POST as $key => $value)
  {
    $location=$location."&$key=$value";
    header('Location:'.$location);
  }
}else {
  echo "POST送信されていません\n";
}
?>
