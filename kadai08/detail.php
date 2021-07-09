<?php

//1.
$id = $_GET["id"];

//2. DB接続します
try {
    $pdo = new PDO('mysql:dbname=kadai7_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}

//３．SELECT * FROM xxx WHERE id=:id
$sql = "SELECT * FROM kadai7_table WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT); //idは数値なのでINT
$status = $stmt->execute();

//step４．データ出力
$view=""; //受け取るための変数を事前に作ります。
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
    //１データのみ抽出の場合はwhileループで取り出さない(一個しかデータが返ってこないので一レコード取得する)
    $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style0710.css">
    <link rel="stylesheet" href="css/reset.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/45469b2b14.js" crossorigin="anonymous"></script>
    <title>Insert</title>
</head>
<body>
<!-- サイドバー -->
<div id="sidebar">
    <ul class="side-ul">
        <li>
        <a href="chart.php" class="side-icon icon1"><i class="fas fa-chart-line"></i></a>
        </li>
        <li>
        <a href="input.html" class="side-icon icon2"><i class="fas fa-edit"></i></a>
        </li>
        <li>
        <a href="select.php" class="side-icon icon3"><i class="fas fa-database"></i></a>
        </li>
        <li>
        <a href="logout.php" class="side-icon icon4"><i class="fas fa-sign-out-alt"></i></a>
        </li>
    </ul>
</div>
<!-- Main[Start] -->
<!-- ここからupdate.phpにデータを送ります -->
<form method="post" action="update.php">
    <div class="input">
        <fieldset class="input">
            <legend class="title">編集</legend>
            <label class="form-label">日付：<input type="date" name="date" value="<?=$row["date"]?>" class="form-control"></label><br>
            <label class="form-label">体重（kg）：<input type="text" name="weight" value="<?=$row["weight"]?>" class="form-control"></label><br>
            <label class="form-label">距離（km）：<input type="text" name="kyori" value="<?=$row["kyori"]?>" class="form-control"></label><br>
            <label class="form-label">食事：</br><textArea name="syokuji" rows="4" cols="40"><?=$row["syokuji"]?></textArea></label><br>
            <input type='hidden' name="id" value="<?=$row["id"]?>">
            <input type="submit" value="更新" class="btn btn-primary">
        </fieldset>
    </div>
</form>
<!-- Main[End] -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>