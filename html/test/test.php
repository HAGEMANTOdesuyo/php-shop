<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>html tenplate</title>
</head>
<body>
<?php
$test='今日はいい天気ですね';
print 'Hello, world!!'.'<br/>';
print 'こんにちは!!' .'<br/>';
print $test;
?>
<br/>
<?php echo 'hello'; ?>
<?= '<br/>'.$test; ?>

</body>
</html>
