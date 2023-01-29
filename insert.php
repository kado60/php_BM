<?php
// 1. POSTデータ取得
$name = $_POST['title'];
$email = $_POST['url'];
$naiyou = $_POST['naiyou'];

// 2. DB接続
require_once('funcs.php');
$pdo = db_conn();


// ３．SQL文を用意(データ登録：INSERT)
$stmt = $pdo->prepare(
  "INSERT INTO gs_bm_table( id,title,url,naiyou,indate )
  VALUES( NULL, :title, :url, :naiyou, sysdate() )"
);

// 4. バインド変数を用意
$stmt->bindValue(':title', $name, PDO::PARAM_STR);
$stmt->bindValue(':url', $email, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);

// 5. 実行
$status = $stmt->execute();

// 6．データ登録処理後
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorMassage:".$error[2]);
}else{
  redirect('index.php');
}
?>
