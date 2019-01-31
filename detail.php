<?php
//確認用
$id = $_GET["id"];
// echo $id;

//以下　select.phpをコピーしたもの
include "funcs.php";
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_bm_table WHERE id=:id");
$stmt->bindValue(":id", $id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    sqlError($stmt);
} else {
    //Selectデータの数だけ自動でループしてくれる
    //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
    $row = $stmt->fetch();
    // var_dump($row);

    // while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    //     $view .= '<p>';
    //     $view .= '<a href="detail.php?id='.$result["id"].'">';  //次のページでGETで受け取れる
    //     $view .= $result["indate"] . "," . $result["email"] . "<br>";
    //     $view .= '</a>';
    //     $view .= '</p>';
    // }

}
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="bm_update_view.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新</legend>
     <label>名前：<input type="text" name="title" value="<?php echo $row["title"]; ?>"></label><br>
     <label>Email：<input type="text" name="bookurl" value="<?php echo $row["bookurl"]; ?>"></label><br>
     <!-- <label>年齢：<input type="text" name="age"></label><br> -->
     <label><textArea name="comment" rows="4" cols="40"><?php echo $row["comment"]; ?></textArea></label><br>
     <input type="hidden" name="id" value="<?php echo $id; ?>">
     <input type="submit" value="更新">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>
