<?php
//1. POSTデータ取得
$title = $_POST['title'];
$url = $_POST['url'];
$naiyou = $_POST['naiyou'];
$id = $_POST['id'];

//2. DB接続
require_once('funcs.php');
$pdo = db_conn();

//３．データ更新SQL作成
$stmt = $pdo->prepare(
    "UPDATE gs_bm_table SET title = :title, url = :url, naiyou = :naiyou, indate=sysdate() 
    WHERE id = :id"
  );
  
// 4. バインド変数を用意
  $stmt->bindValue(':title', $title, PDO::PARAM_STR);
  $stmt->bindValue(':url', $url, PDO::PARAM_STR);
  $stmt->bindValue(':naiyou', $naiyou, PDO::PARAM_STR);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);

// 5. 実行
  $status = $stmt->execute();


//6．データ更新（登録）処理後
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
  }else{
    redirect('select.php');
  }