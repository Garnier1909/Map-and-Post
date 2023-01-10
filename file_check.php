<?php
session_start();
include("funcs.php");

chkSsid();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
    </title>
    <style>
        fieldset {
            border: 1px solid #666;
            padding: 3px;
        }

        #photarea {
            padding: 5%;
            border: 1px solid #666;
            padding: 10px;
            background: #999999;
        }

        #upload_btn {
            display: none;
        }
    </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body id="main">

    <!-- ヘッダー -->
    <?php include("header.php"); ?>
    <!-- ヘッダー -->

    <!-- コンテンツ -->
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>CREATE NEW POST</h1>
            <h2></h2>
            <p>写真をアップロードしてください。</p>
            <p><a href="#" id="select_btn" class="btn btn-primary btn-lg">写真選択</a></p>
            <form method="post" action="fileup.php" enctype="multipart/form-data">
                <input type="file" accept="image/*" capture="camera" id="image_file" value="" name="upfile" style="opacity:0;" onchange="previewImage(this);">
                <h3>タイトル</h3>
                <input type="text" name="name">
                <h3>ひとこと</h3>
                <textarea rows="5" cols="40" name="note" id="note"></textarea>
                <br>
                <!-- アップロードボタン -->
                <input type="submit" id="upload_btn" class="btn btn-success btn-lg" value="アップロード" style="margin-top:10px;">

                <input type="hidden" name="lat" id="lat">
                <input type="hidden" name="lon" id="lon">
                <input type="hidden" name="p_name" id="p_name" value="<?= $_SESSION["name"] ?>">
                <input type="hidden" name="p_col" id="p_col" value="<?= $_SESSION["col"] ?>">

            </form>
        </div>
        <!-- 写真プレビュー -->
        <div id="photarea" style="margin:auto; border-radius:10px;">
            <img id="preview" src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==" style="max-height:60vh;">
        </div>
    </div>
    <!-- コンテンツ -->

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
        function previewImage(obj) {
            var fileReader = new FileReader();
            fileReader.onload = (function() {
                document.getElementById('preview').src = fileReader.result;
            });
            fileReader.readAsDataURL(obj.files[0]);
        }
        //非表示のinput type="file"をクリック
        $("#select_btn").on("click", function() {
            $("#image_file").trigger("click");
        });

        //File選択したら”Fileアップロード”ボタンを表示
        $("#image_file").on("change", function() {
            var file = $("#image_file").get(0).files[0];
            if (file.size / 1024 > 10000) {
                alert("OVER");
                return false;
            } else {
                console.log("OK");
            }
            $("#upload_btn").show();
        });
    </script>
    <script src="geolocation.js"></script>

</body>

</html>