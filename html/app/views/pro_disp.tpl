<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>html template</title>
</head>
<body>
  商品情報参照<br/><br/>
  商品コード<br/>
  <?= $pro_code; ?><br/>
  商品名<br/>
  <?= $pro_name; ?><br/>
  価格<br/>
  <?= $pro_price.'円'; ?><br/><br/>
  <?= $disp_gazou; ?><br/>

  <form>
    <input type="button" onclick="history.back()" value="戻る">
  </form>
</body>
</html>
