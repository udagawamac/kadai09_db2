<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&display=swap" rel="stylesheet">
  <link rel="icon" href="./img/parette.png">
  <title>アンケートフォーム</title>
</head>

<body>
  <div class="haikei">
    <h3>あなたの好きな色を教えてください</h3>
    <form action="insert.php" method="POST">
      <label>好きな色：<select name="color"></label>
      <option value=""></option>
      <option value="赤">赤</option>
      <option value="青">青</option>
      <option value="黄">黄</option>
      <option value="緑">緑</option>
      <option value="紫">紫</option>
      <option value="桃">桃</option>
      <option value="白">白</option>
      <option value="黒">黒</option>
      </select><br><br>
      <label>お名前：<input type="text" name="name"></label><br>
      <label>E-mail : <input type="text" name="email"></label><br><br>
      <button type="submit">送信</button>
    </form>
  </div>
  <?php
    ?>
</body>

</html>