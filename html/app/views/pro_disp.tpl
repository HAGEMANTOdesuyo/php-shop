<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>php農園</title>
</head>
<body>
  商品情報参照<br/><br/>
  商品コード<br/>
  <?= $v->procode; ?><br/>
  商品名<br/>
  <?= $v->pro_name; ?><br/>
  価格<br/>
  <?= $v->pro_price.'円'; ?><br/><br/>
  <?= $v->disp_gazou; ?><br/>

  <form>
    <input type="button" onclick="history.back()" value="戻る">
  </form>
</body>
</html>
