<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/range.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <title>ログイン</title>
</head>

<body>
  <header>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div style="display:flex; justify-content:space-between; align-items: center;">
          <h1 style="color: #ffffff;">MAP & POSTS</h1>
        </div>
      </div>
    </nav>
  </header>



  <main>
    <div class="jumbotron" style="border-radius:10px; margin: auto 10px; padding:10px 10px 20px 10px; font-size:larger;">
      <form name="form1" action="login_act.php" method="post">
        <h2 style="font-weight: bold; margin-bottom:30px;">ログイン</h2>
        ユーザーID : <input type="text" name="lid" style="margin-bottom:10px;"/><br>
        パスワード : <input type="password" name="lpw" />
        <p><input type="submit" class="button" value="ログイン" style="font-size:medium; margin-top:10px;"/></p>

        <p style="font-size:16px;">新規登録は<a href="users.html" style="text-decoration:underline;">こちら</a>から</p>

      </form>
    </div>
  </main>

</body>

</html>