  <?php
  $nickname = htmlspecialchars($_POST["nickname"]);
  $email = htmlspecialchars($_POST["email"]);
  $content = htmlspecialchars($_POST["content"]);

  //入力チック
  //ニックネーム
  if ($nickname == ''){
    $nickname_result = 'ニックネームが入力されていません';
  }else{
    $nickname_result = 'ようこそ'.$nickname.'様';
  }

  //メールアドレス
    if ($email == ''){
    $email_result = 'メールアドレスが入力されていません';
  }else{
    $email_result = 'メールアドレス：'.$email;
  }

  //問い合わせ内容
      if ($content == ''){
    $content_result = '問い合わせ内容が入力されていません';
  }else{
    $content_result = '問い合わせ内容：'.$content;
  }

  ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <title>入力内容確認</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>入力内容確認</h1>
  <?php echo $nickname_result; ?>
  <br>
  <?php echo $email_result; ?>
  <br>
  <?php echo $content_result; ?>

  <form method="post" action="thanks.php">
    <input type="hidden" name="nickname" value="<?php echo $nickname; ?>">
    <input type="hidden" name="email" value="<?php echo $email; ?>">
    <input type="hidden" name="content" value="<?php echo $content; ?>">
    <input type="button" value="戻る" onclick="history.back()">
    <?php if ($nickname != '' && $email != '' && $content != ''): ?>
      <input type="submit" value="OK">
    <?php endif; ?>
  </form>
</body>
</html>