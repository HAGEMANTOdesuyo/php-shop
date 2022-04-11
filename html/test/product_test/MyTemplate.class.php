<?php
class MyTemplate
{
  function show($tpl_file)
  {
    $v = $this;
    include(__DIR__."/{$tpl_file}");
  }
}
?>
