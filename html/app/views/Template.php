<?php
class Template
{
  function show($tpl_file)
  {
    $v = $this;
    include("{$tpl_file}");
  }
}
?>
