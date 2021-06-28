<?php
//1. POSTデータ取得

$name = $_POST["name"];
$kana = $_POST["kana"];
$reason = $_POST["reason"];
$email = $_POST["email"];
$detail = $_POST["detail"];

//せっかくなのでnullチェック&配列かどうかチェック
if (isset($_POST['kind']) && is_array($_POST['kind'])) {
    //配列を文字列変換
    $kind = implode("、", $_POST["kind"]);
}

//2. DB接続します xxxにDB名を入力する
try {
    $pdo = new PDO('mysql:dbname=kadai6_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO kadai6_table(id, name, kana, reason, email, detail, kind
)VALUES(NULL, :name, :kana, :reason, :email, :detail, :kind)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kana', $kana, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':reason', $reason, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':email', $email, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':detail', $detail, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kind', $kind, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if ($status==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
} else {
    //５．index.phpへリダイレクト 書くときにLocation: in この:　のあとは半角スペースがいるので注意！！
    header("Location: select.php");
    exit;
}
?>