<?php
//1.  DB接続
try {
$pdo = new PDO('mysql:dbname=kadai7_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e->getMessage());
}

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM kadai7_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false){
  //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  //Selectデータの数だけ自動でループしてくれる $resultの中に「カラム名」が入ってくるのでそれを表示させる
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= "<p>";
    $view .= '<a href="detail.php?id='.$result["id"].'">';
    $view .= $result["date"]." ".$result["weight"]." ".$result["kyori"]." ".$result["syokuji"];
    $view .= '</a>';
    // 隙間を開ける
    $view .= '       ';
    // 削除用のaタグ
    $view .= '<a href="delete.php?id='.$result["id"].'">';
    $view .= "[削除]";
    $view .= '</a>';
    $view .= "</p>";
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style07.css">
    <link rel="stylesheet" href="css/reset.css">
    <script src="https://kit.fontawesome.com/45469b2b14.js" crossorigin="anonymous"></script>
    <title>Insert</title>
</head>
<body>
    <!-- サイドバー -->
    <div id="sidebar">
        <ul class="side-ul">
            <li>
            <a href="chart.php" class="side-icon"><i class="fas fa-chart-line"></i></a>
            </li>
            <li>
            <a href="input.html" class="side-icon"><i class="fas fa-edit"></i></a>
            </li>
            <li>
            <a href="select.php" class="side-icon"><i class="fas fa-database"></i></a>
            </li>
            <li>
            <a href="" class="side-icon"><i class="fas fa-cog"></i></a>
            </li>
            <li>
            <a href="" class="side-icon sign-out-icon"><i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </div>

    <!-- ここからinsert.phpにデータを送ります -->
    <div class="container"><p class="title">データ一覧</p><?=$view?></div>
    <!-- Main[End] -->
</body>
</html>
