<?php
//$_POSTが存在するか？（POST送信されていればnot Empty）
if (!empty($_POST)) {
    //************************************************************************************
    // filter_inputとは？
    // DocumentURL=[http://php.net/manual/ja/function.filter-input.php]
    //************************************************************************************

    session_start();
    include("funcs.php");

    chkSsid();

    //1．POST値取得（POST数に合わせて増やす）

    $name = $_POST["name"];
    $lat = $_POST["lat"];
    $lon = $_POST["lon"];
    $note = $_POST["note"];
    $p_name = $_POST["p_name"];
    $p_col = $_POST["p_col"];


    //2. 未入力チェック
    if (!$lat) {
        $error['lat'] = '緯度の値がありません';
    }

    if (!$lon) {
        $error['lon'] = '経度の値がありません';
    }
} else {
    echo "Error:1";
    exit();
}


//************************************************************************************
// FileUpload
//************************************************************************************
if (isset($_FILES["upfile"]) && $_FILES["upfile"]["error"] == 0) {
    $file_name = $_FILES["upfile"]["name"];  //"1.jpg"ファイル名取得
    $tmp_path  = $_FILES["upfile"]["tmp_name"]; //"/usr/www/tmp/1.jpg"アップロード先のTempフォルダ
    $file_dir_path = "upload/";  //画像ファイル保管先

    //ここにユニークキーのロジックをペースト
    $extension = pathinfo($file_name, PATHINFO_EXTENSION);
    $uniq_name = date("YmdHis") . md5(session_id()) . "." . $extension;
    $file_name = $uniq_name;

    $img = "";
    // FileUpload [--Start--]
    if (is_uploaded_file($tmp_path)) {
        if (move_uploaded_file($tmp_path, $file_dir_path . $file_name)) {
            chmod($file_dir_path . $file_name, 0644);
            //echo $file_name . "をアップロードしました。";
            $img = '<img src="' . $file_dir_path . $file_name . '" >';
        } else {
            $img = "Error:アップロードできませんでした。";
        }
    }
    // FileUpload [--End--]
} else {
    $img = "画像が送信されていません";
}




//************************************************************************************
// DB
//************************************************************************************
//１．DB接続
try {
    //dbname=gs_db
    //host=localhost
    //Password:MAMP='root', XAMPP=''
    $pdo = new PDO('mysql:dbname=map_db;charset=utf8;host=localhost', 'root', 'root');
} catch (PDOException $e) {
    exit('DBConnectError' . $e->getMessage());
}


//３．SQL文作成 //*の箇所とテーブル名を変更！！
$sql = "INSERT INTO map_tables(name, lat, lon, img, input_date, note, p_name, p_col)VALUES(:name, :lat, :lon, :img, sysdate(), :note, :p_name, :p_col)";
$stmt = $pdo->prepare($sql);

//４．SQL文の値へPOST値を渡す//*の箇所を変更！！
//（POST数に合わせて増やす）
$stmt->bindValue(":name", $name);
$stmt->bindValue(":lat", $lat);
$stmt->bindValue(":lon", $lon);
$stmt->bindValue(":img", $file_name);
$stmt->bindValue(":note", $note);
$stmt->bindValue(":p_name", $p_name);
$stmt->bindValue(":p_col", $p_col);


//5. SQL実行
$status = $stmt->execute();

//6. 画面遷移(select.php)
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit("SQLError:" . $error[2]);
} else {
    //何もしない
}
?>





<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>投稿完了</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <!-- ヘッダー -->
    <?php include("header.php"); ?>
    <!-- ヘッダー -->
    <div style="margin:auto; padding-left:20px;">
        <h1 style="font-weight:bold; color:#c12e2a;">投稿完了！</h1>

        <!-- 投稿詳細 -->
        <div class="jumbotron" style="border-radius:10px; padding:10px 10px 20px 10px; margin-bottom:10px;">
            <h3 style="font-weight:bold;"><?= $name ?></h3>
            <p><?= $note ?></p><br>
            <p>by <?= $p_name ?></p>

            <?php
            if ($error['lat'] != "") {
                echo $error['lat'];
            }
            ?>
        </div>

        <!-- Upload画像 -->
        <div>
            <?= $img ?>
        </div>
    </div>

    <script src=" js/jquery-2.1.3.min.js">
    </script>
    <script>
        $(function() {
            $("img").css("max-height", 400 + "px");
        });
    </script>
</body>

</html>