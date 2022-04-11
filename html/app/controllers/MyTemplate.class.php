<?php
class MyTemplate
{
  function show($tpl_file)
  {
    $v = $this;
    include("../views/{$tpl_file}");
  }
}
?>
