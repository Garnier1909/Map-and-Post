<?php
 //**********************************************************
 // *  fileupload2.php
 // *  FileList（画像ファイル一覧表示）
 //**********************************************************
 session_start();
 include("funcs.php");
 
 chkSsid();
 //ディレクトリパス
 $img_path = "upload";
 ///走査するディレクトリを指定
 $directry = new RecursiveDirectoryIterator($img_path);
 //指定したディレクトリから反復処理でデータを取得
 $files = new RecursiveIteratorIterator($directry);
 // var_dump($files);
 
 
 //画像を繰返し取得表示
 foreach ($files as $file) {
     if ($file->isFile()) {
         $list .= '<img src="' . $file->getPathname() . '"><br>';
     }
 }
 





?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>写真一覧</title>
<style>
#photarea{padding:5%;width:100%;background:black;}
img{height:200px;}
</style>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body id="main">


<!-- Head[Start] -->
<?php include("header.php"); ?>
<!-- Head[End] -->


<!-- IMG_LIST[Start] -->
 <div class="container-fluid">

 <p><input id="img_width_range" type="range" step="10" max="400" min="50" value="200"></p>
  <div class="jumbotron"><span id="heigth_txt">200px</span>
    <div id="photarea" style="display:flex; flex-wrap: wrap;"><?=$list?></div>
  </div>
</div>
<!-- IMG_LIST[END] -->



<!-- *** jQuery読み込み！！ *** -->
<script src="js/jquery-2.1.3.min.js"></script>
<script>
$("#img_width_range").on("change", function(){
  $("img").css("height", $(this).val() + "px");
  $("#heigth_txt").text($(this).val() + "px");
})





</script>
</body>
</html>



