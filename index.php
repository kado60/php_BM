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
        <form method="POST" action="insert.php">
        <fieldset>
            <h1>本のブックマーク</h1>
            <label>本の名前：<input type="text" name="title"></label><br>
            <label>本のURL：<input type="text" name="url"></label><br>
            <label>メモ：<textarea name="naiyou" cols="30" rows="4"></textarea></label><br>
            <input type="submit" value="登録">
        </fieldset>
        </form>
    </main>

</body>
</html>