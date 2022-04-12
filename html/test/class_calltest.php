<?php
class sample{
  public $test1 = 'test1';
  function show(){
    $v = $this;
    hello();
    echo "hello\n";
  }
}
$obj = new sample;
$obj->test2 = "test2\n";
$obj->show();
#echo $v->test1;
#echo $v->test2;


function hello(){
  echo $v->test1;
}

?>

