<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>4eachblog 掲示板</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php
        mb_internal_encoding("utf8");
        $pdo=new PDO("mysql:dbname=lesson01;host=localhost;","root","");
        $stmt=$pdo->query("select * from 4each_keijiban");
    ?>
    <header>
        <!-- logo -->
        <div class="logo">
            <img src="4eachblog_logo.jpg">
        </div>
        <!-- menu -->
        <ul class="menu">
            <li>トップ</li>
            <li>プロフィール</li>
            <li>4eachについて</li>
            <li>登録フォーム</li>
            <li>問い合わせ</li>
            <li>その他</li>
        </ul>
    </header>
    <main>
        <div class="main-container">
            <!-- left -->
            <div class="left">
                <!-- title -->
                <h1>プログラミングに役立つ掲示板</h1>
                <div class="contactform">
                    <!-- form -->
                    <h2>入力フォーム</h2>

                    <form method ="post" action="insert.php">
                        <div>
                            <label>ハンドルネーム</label>
                            <br>
                            <input type ="text" class="text" size=60% name="handlename"/>
                        </div>

                        <div>
                            <label>タイトル</label>
                            <br>
                            <input type ="text" class="text" size=60% name="title"/>
                        </div>

                        <div>
                            <label>コメント</label>
                            <br>
                            <textarea name="comments" rows="7" cols=80%></textarea>
                        </div>

                        <div>
                            <input type="submit" class="button" value="投稿する">
                        </div>
                    </form>
                </div> <!-- contactoform end -->
                
                <?php
                while($row=$stmt->fetch()){
                    echo "<div class='kiji'>";
                    echo "<h3>".$row['title']."</h3>";
                    echo "<div class='contents'>";
                    echo $row['comments'];
                    echo "<div class='handlename'>posted by ".$row['handlename']."</div>";
                    echo "</div>";
                    echo "</div>";
                }
                ?>
            </div> <!-- left end -->
            <!-- right -->
            <div class="right">
                <h1>人気の記事</h1>
                <ul class="right_list">
                    <li>PHPおすすめ本</li>
                    <li>PHP MyAdminの使い方</li>
                    <li>今人気のエディタ Top5</li>
                    <li>HTMLの基礎</li>
                </ul>
                <h1>オススメリンク</h1>
                <ul class="right_list">
                    <li>インターノウス株式会社</li>
                    <li>XAMPPのダウンロード</li>
                    <li>Eclipseのダウンロード</li>
                    <li>Bracketsのダウンロード</li>
                </ul>
                <h1>カテゴリ</h1>
                <ul class="right_list">
                    <li>HTML</li>
                    <li>PHP</li>
                    <li>MySQL</li>
                    <li>JavaScript</li>
                </ul>
            </div> <!-- right end -->
        </div><!-- main-container end -->
    </main>
    <!-- footer -->
    <footer>
        copyright © internous | 4each blog the which provides A to Z about programming.
    </footer>
</body>
</html>