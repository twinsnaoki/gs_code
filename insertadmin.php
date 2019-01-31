<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, "name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
//エラーを吐かない書き方

$name = $_POST["name"]; 
$lid = $_POST["lid"]; 
$lpw = $_POST["lpw"]; 
$kanri_flg = $_POST["kanri_flg"]; 
$life_flg = $_POST["life_flg"]; 

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

$stmt = $pdo->prepare("INSERT INTO bk_user_table(name, lid, lpw, kanri_flg, life_flg) VALUES (:name, :lid, :lpw, :kanri_flg, :life_flg)");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();



//４．データ登録処理後
//エラーのほとんどがSQLの書き方がおかしい
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  sqlError($stmt);
}else{
  // exit; //(headerで処理のために飛ばないようにしてエラーを確かめる)
  //５．index.phpへリダイレクト
  redirect("useradmin.php");
}
?>