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
    $view .= "<tr>";
    $view .= '<td><a href="detail.php?id='.$result["id"].'">';
    $view .= $result["date"]."</td>"."<td>".$result["weight"]."</td>"."<td>".$result["kyori"]."</td>"."<td>".$result["syokuji"]."</td>";
    $view .= '</a>';
    // 隙間を開ける
    //$view .= '       ';
    // 削除用のaタグ
    $view .= '<td><a href="delete.php?id='.$result["id"].'">';
    $view .= "[削除]"."</td>";
    $view .= '</a>';
    $view .= "</tr>";
  }

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
            <li>
            <a href="logout.php" class="side-icon icon4"><i class="fas fa-sign-out-alt"></i></a>
            </li>
        </ul>
    </div>

    <!-- ここからinsert.phpにデータを送ります -->
    <div class="container">
      <p class="title">データ一覧</p>
      <table class="table">
        <thead>
          <tr>
            <th>日付</th>
            <th>体重</th>
            <th>距離</th>
            <th>食事</th>
            <th>削除</th>
          </tr>
        </thead>
        <tbody>
          <?=$view?>
        </tbody>
      </table>
    </div>
    <!-- Main[End] -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
