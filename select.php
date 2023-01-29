<?php
//1.  DB接続
require_once('funcs.php');
$pdo = db_conn();

//２．SQL文を用意(データ取得：SELECT)
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");

//3. 実行
$status = $stmt->execute();

//4．データ表示
$view="";
if($status==false) {
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result['id']  .'">';
    $view .= $result['indate'].' | '.$result['title'].' | '.$result['url'].' | '.$result['naiyou'];
    $view .= "</a>";
    $view .= '<a href="delete.php?id='.$result['id']  .'">';
    $view .='[ 削除 ]';
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<header>
        <a href="index.php">ブックマーク画面へ</a>
    </header>    

<div>
    <div class="container jumbotron"><?= $view ?></div>
</div>

</body>
</html>
