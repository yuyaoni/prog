<?php
$name = $_POST["name"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>占い結果</title>
</head>
<body>
    <p><?=htmlspecialchars($name, ENT_QUOTES)."さんの占い結果"?></p>
</body>
</html>

<?php
$random = mt_rand(1,3);

if($random == 1)
{
    echo "<img src = 'img/daikichi.png'>";
}
elseif($random == 1)
{
    echo "<img src = 'img/chukichi.png'>";
}
else
{
    echo "<img src = 'img/shoukichi.png'>";
}

?>

