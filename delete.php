<?php
session_start();
include("funcs.php");
//LOGINチェック → funcs.phpへ関数化
chkSsid();


//1.  DB接続
try {
    $pdo = new PDO('mysql:dbname=map_db;charset=utf8;host=localhost','root','root');
} catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
}


//２．POST値取得（POST数に合わせて増やす）
$id   = $_GET["id"];


//３．SQL文作成 //*の箇所とテーブル名を変更
$sql = "DELETE FROM map_tables WHERE id=:id";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(":id", $id);

//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
}else{
    header("Location: map_view.php");
    exit();
}
