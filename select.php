<?php
//1.  DB接続します
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_bm_table");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("**********:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  // .=　で前のデータを残したまま追加してくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while($res = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // $view .= $res["id"].",".$res["title"].",".$res["bookurl"].",".$res["comment"]."<br>";
    $view .= "ID：".$res["id"].'<a href="detail.php?id='.$res["id"].'">更新する</a>'."<br>"."書籍名：".$res["title"]."<br>"."アドレス：".$res["bookurl"]."<br>"."コメント：".$res["comment"]."<br><br>";
    // $view .= '<tr><td>'.$res["id"].$res["title"].'<tr><td><br>';
    // $view .= '<tr><td>'.$res["id"].","</td><td>.$res["name"].'<tr><td>';
  }

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ブックマーク一覧</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
      <a class="navbar-brand" href="index.php">データ登録</a>
      </div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<div>
  <div><label><a href="admin.php">ユーザー管理</a> </label></div>
  <div class="container jumbotron"><?php echo $view; ?></div>

</div>
<!-- Main[End] -->

</body>
</html>
