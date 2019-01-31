<?php
//共通に使う関数を記述


function h($a)
{
    return htmlspecialchars($a, ENT_QUOTES);
}


function db_conn(){
    try {
        $pdo = new PDO('mysql:dbname=book_db;charset=utf8;host=localhost','root','');
        return $pdo;  //functionの外に出す(グローバルへ)
      } catch (PDOException $e) {
        exit('DB-Connection-Error:' .$e->getMessage());
      }
}


function sqlError($stmt){
    $error = $stmt->errorInfo();
    exit("ErrorSQL:".$error[2]);
}


function redirect($page){
    header('Location: '.$page);
    exit;
}