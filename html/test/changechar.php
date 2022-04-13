<?php
$char='action_disp';
$test=strpos($char,'action_');
#var_dump($test);
if($test !== false)
{
  echo $char."\n";
  $char = str_replace('action_','test_',$char);
  echo $char."\n";
}
?>
