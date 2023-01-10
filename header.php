<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div style="display:flex; justify-content:space-between; align-items: center;">
                    <h1 style="color: #ffffff;">MAP & POSTS</h1>
                    <h4 style="color:#ffffff;">ようこそ、<?= $_SESSION["name"] ?>さん</h4>
                </div>
                <ul class="pager" style="width: 100%;">
                    <li class="previous" style="margin-right:5px; float:left;"><a href="map_view.php">→ マップに戻る</a></li>
                    <li class="previous" style="float:left;"><a href="file_view.php">画像一覧</a></li>
                    <li><a href="logout.php" style="float:right;">ログアウト</a></li>
                    <li><a href="users_select.php" style="margin-right:5px; float:right;">メンバー管理</a></li>
                </ul>
            </div>
        </nav>
    </header>