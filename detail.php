<?php
$id = $_GET["id"];
//１．PHP
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$sql = "SELECT * FROM gs_bm_table WHERE id =:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//３．データ表示
$values = "";
if($status==false) {
  sql_error($stmt);
}

//全データ取得
$values =  $stmt->fetch(); //PDO::FETCH_ASSOC[カラム名のみで取得できるモード]
$json = json_encode($values,JSON_UNESCAPED_UNICODE);

?>
<!--
２．HTML
以下にindex.phpのHTMLをまるっと貼り付ける！
理由：入力項目は「登録/更新」はほぼ同じになるからです。
※form要素 input type="hidden" name="id" を１項目追加（非表示項目）
※form要素 action="update.php"に変更
※input要素 value="ここに変数埋め込み"
-->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
  <link rel="icon" href="./img/parette.png">
  <title>アンケートデータ更新</title>
</head>

<body>
  <div class="haikei">
    <h3>あなたの好きな色を教えてください</h3>
    <form action="update.php" method="POST">
      <label>好きな色：<select name="color" value="<?=$values["color"]?>"></label>
      <option value=""></option>
      <option value="赤">赤</option>
      <option value="青">青</option>
      <option value="黄">黄</option>
      <option value="緑">緑</option>
      <option value="紫">紫</option>
      <option value="桃">桃</option>
      <option value="白">白</option>
      <option value="黒">黒</option>
      </select><br><br>
      <label>お名前：<input type="text" name="name" value="<?=$values["name"]?>"></label><br>
      <label>Email : <input type="text" name="email" value="<?=$values["email"]?>"></label><br>
      <input type="hidden" name="id" value="<?=$values["id"]?>"><br>
      <button type="submit" value="送信">送信</button>
    </form>
  </div>
</body>

</html>