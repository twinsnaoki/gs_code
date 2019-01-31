<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>管理者登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">ユーザー登録</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insertadmin.php">
  <div class="jumbotron">
   <fieldset>
    <legend>ブックマークデータ</legend>
     <label>管理者名：<input type="text" name="name"></label><br>
     <label>ログインID：<input type="text" name="lid"></label><br>
     <label>ログインパスワード：<input type="password" name="lpw"></label><br>
     <select name="kanri_flg" id="admin">
        <option value="0">管理者</option>
        <option value="1">スーパー管理者</option>
     </select>
     <select name="life_flg" id="life">
        <option value="0">使用中</option>
        <option value="1">使用しなくなった</option>
     </select>
     <input type="submit" value="送信">
     <label><a href="admin.php">ユーザー一覧</a> </label>
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
