 <?php 
  $nickname = htmlspecialchars($_POST['nickname']);
  $email = htmlspecialchars($_POST['email']); 
  $content = htmlspecialchars($_POST['content']);

  //DBとの連携

  //Step1
  //データベースと接続
  //db接続文字列を作成(mysqlを使うよ:dbname=接続したいデータベース名;host=接続したいデータベースが存在するサーバーのアドレス)
  //プログラムとdbが同じ場所にあるときはlocalhost(自分)と指定出来る
  //注意！中にスペース書かない！
  $dsn = 'mysql:dbname=phpkiso;host=localhost';

  //データベースにログインするためのユーザー情報(xamppだと、以下の情報)
  $user = 'root';
  $password = '';

  //必要な情報を使って、データベースに接続
  $dbh = new PDO($dsn,$user,$password);

  //接続時に使用する文字コードをセット
  $dbh->query('SET NAMES utf8');

  //Step2
  $sql = "INSERT INTO `survey` (`nickname`, `email`, `content`) VALUES ('$nickname', '$email', '$content')"; //実行したいSQL文をここに書く！
  $stmt = $dbh->prepare($sql); //SQL実行する準備
  $stmt->execute(); //実行！

  //Step3
  $dbh = null;

 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>送信完了</title>
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
  <div>
    <h3>お問い合わせ内容<h3>
      <p>ニックネーム：<?php echo $nickname; ?></p>
      <p>メールアドレス：<?php echo $email; ?></p>
      <p>お問い合わせ内容：<?php echo $content; ?></p>
  </div>
 
</body>
</html>