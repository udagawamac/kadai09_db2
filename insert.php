<?php
//1. POSTデータ取得
//[name,email,color,indate]
$name   = $_POST["name"];
$email  = $_POST["email"];
$color  = $_POST["color"];
// $indate = $_POST["indate"];

//2. DB接続
include("funcs.php"); //外部ファイル読み込み
$pdo = db_conn();

//３．データ登録SQL作成
// $sql = "SELECT * FROM gs_bm_table ORDER BY color DESC";
$sql = "INSERT INTO gs_bm_table(name,email,color,indate)VALUES(:name, :email, :color,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name',   $name,   PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email',  $email,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':color',  $color,  PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute(); //true or false

//４．データ登録処理後、select.phpへジャンプ
if($status==false){
  sql_error($stmt);
}else{
redirect("select.php");
}

?>
