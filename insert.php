<?php
//POSTでデータを取得
$title = $_POST['title'];
$url = $_POST['url'];
$naiyou = $_POST['naiyou'];

//DBを接続
require_once('funcs.php');
$pdo = db_conn();

//SQL分を用意
$stmt = $pdo->prepare(
    "INSERT INTO gs_bm_table(id, title, url, naiyou, indate)
    VALUES(NULL, :title, :url, :naiyou, sysdate() )"
);

//バインド変数を用意
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);

//実行
$status = $stmt->execute();

//データ登録処理後
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMessage:".$error[2]);
}else{
    header('Location: index.php');
}

?>