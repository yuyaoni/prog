<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<!-- Main[Start] -->
<!-- login_act.phpにデータを送ります -->
<form  action="login_act.php" method="post">
  <div class="mb-3">
   <fieldset>
    <legend>ログインページ</legend>
     <label class="form-label">ID<input type="text" name="lid" class="form-control"></label><br>
     <label class="form-label">PW<input type="text" name="lpw" class="form-control"></label><br>
     <input type="submit" value="LOGIN" class="btn btn-primary"/>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>