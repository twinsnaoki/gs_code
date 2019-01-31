<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//エラーを吐かない書き方

$title = $_POST["title"]; 
$bookurl = $_POST["bookurl"]; 
$comment = $_POST["comment"]; 

//2. DB接続します この書き方しないとエラーを吐く「これをコピペでOK」

//Xamppの人はパスワードはなし、ユーザーIDは「root」
//エラーの場合はexit関数で処理を止める
// try {
//   $pdo = new PDO('mysql:dbname=********;charset=utf8;host=localhost','******','******');
// } catch (PDOException $e) {
//   exit('****************:'.$e->getMessage());
// }


// try {
//   $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
// } catch (PDOException $e) {
//   exit('DB-Connection-Error:' .$e->getMessage());
// }

//関数化したものを使う
include("funcs.php");
$pdo = db_conn();


//３．データ登録SQL作成
//bindValueが危ないスクリプトがあっても置き換えて無効化してくれる(サニタイジング)
// $stmt = $pdo->prepare("******* ***** ********( ************* )VALUES( ************");
// $stmt->bindValue('******', *****, ****************);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue('******', *****, ****************);  //Integer（数値の場合 PDO::PARAM_INT)
// $stmt->bindValue('******', *****, ****************);  //Integer（数値の場合 PDO::PARAM_INT)
// $status = $stmt->execute();

$stmt = $pdo->prepare("INSERT INTO book_bm_table(title, bookurl, comment) VALUES (:title, :bookurl, :comment)");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':bookurl', $bookurl, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();



//４．データ登録処理後
//エラーのほとんどがSQLの書き方がおかしい
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
}else{
  // exit; //(headerで処理のために飛ばないようにしてエラーを確かめる)
  //５．index.phpへリダイレクト
  redirect("index.php");
}
?>