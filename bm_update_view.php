<?php
$title = $_POST["title"];
$bookurl = $_POST["bookurl"];
$comment = $_POST["comment"];
$id = $_POST["id"];

//2. DB接続します
include "funcs.php";
$pdo = db_conn();

//３．データ登録SQL作成
$sql = "UPDATE book_bm_table SET title=:title, bookurl=:bookurl, comment=:comment WHERE id=:id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
//->は空白を入れない

$status = $stmt->execute();

//４．データ登録処理後
if ($status == false) {
    sqlError($stmt);
} else {
    //５．index.phpへリダイレクト
    header("Location: select.php");
    //:のあとは空白を入れる
    exit;
}
//1.POSTでParamを取得


//2.DB接続など


//3.UPDATE gs_an_table SET ....; で更新(bindValue)
//　基本的にinsert.phpの処理の流れです。




?>
