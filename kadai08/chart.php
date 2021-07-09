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
  $cnt=0;
  while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $date[$cnt] = $result["date"];
    $weight[$cnt] = $result["weight"];
    $kyori[$cnt] = $result["kyori"];
    $cnt++;
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
    <div class="chart container">
    <h1 class="title">グラフ</h1>
    <canvas id="myLineChart"></canvas>
    </div>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.js"></script>
  
    <script>
    var ctx = document.getElementById("myLineChart");
    var myLineChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ['<?=$date[0]?>', '<?=$date[1]?>', '<?=$date[2]?>', '<?=$date[3]?>', '<?=$date[4]?>', '<?=$date[5]?>', '<?=$date[6]?>'],
        datasets: [
          {
            label: '体重(kg）',
            data: [<?=$weight[0]?>, <?=$weight[1]?>, <?=$weight[2]?>, <?=$weight[3]?>, <?=$weight[4]?>, <?=$weight[5]?>, <?=$weight[6]?>],
            borderColor: "rgba(130,201,169,0.5)",
            backgroundColor: "rgba(0,0,0,0)"
          },
          {
            label: '歩行距離(km）',
            data: [<?=$kyori[0]?>, <?=$kyori[1]?>, <?=$kyori[2]?>, <?=$kyori[3]?>, <?=$kyori[4]?>, <?=$kyori[5]?>, <?=$kyori[6]?>],
            borderColor: "rgba(255,183,76,0.5)",
            backgroundColor: "rgba(0,0,0,0)"
          }
        ],
      },
      options: {
        title: {
          display: true,
          text: '記録'
        },
        scales: {
          yAxes: [{
            ticks: {
              suggestedMax: 40,
              suggestedMin: 0,
              stepSize: 10,
              callback: function(value, index, values){
                return  value
              }
            }
          }]
        },
      }
    });
    </script>
</body>
</html>