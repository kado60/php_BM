<?php
//1.外部ファイル読み込みしてDB接続
require_once('funcs.php');
$pdo = db_conn();


//2.対象のIDを取得
$id = $_GET['id'];

//3．データ取得SQLを作成（SELECT文）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindVALUE(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ表示
if($status == false){
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
}else{
    $result = $stmt->fetch();
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ブックマーク</title>
</head>
<body>
    <header>
        <a href="select.php">ブックマークを見る</a>
    </header>    
    <main>
        <form method="POST" action="update.php">
        <fieldset>
            <h1>本のブックマーク</h1>
            <label>本の名前：<input type="text" name="title" value="<?= $result['title']?>"></label><br>
            <label>本のURL：<input type="text" name="url" value="<?= $result['url']?>"></label><br>
            <label>メモ：<textarea name="naiyou" cols="30" rows="4" value="<?= $result['naiyou']?>"></textarea></label><br>
             <input type="hidden" name="id" value="<?= $result['id']?>">
            <input type="submit" value="登録">
        </fieldset>
        </form>
    </main>

</body>
</html>