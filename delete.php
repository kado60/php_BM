<?php
//1.対象のIDを取得
$id = $_GET['id'];

//2.DB接続
require_once('funcs.php');
$pdo = db_conn();

//3.削除SQLを作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindVALUE(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//４．データ削除処理後
if($status==false){
    $error = $stmt->errorInfo();
    exit("ErrorMassage:".$error[2]);
  }else{
    redirect('select.php');
  }
