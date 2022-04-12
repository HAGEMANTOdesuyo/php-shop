<html>
<head>
    <meta charset="utf-8">
</head>
<body>
    <h1>店名：<?= $v->name; ?></h1>
    <ul>
    <?php for($i=0; $i<count($v->foods); $i++){ ?>
        <li><?= $v->foods[$i]; ?></li>
    <?php } ?>
    </ul>
</body>
</html>
