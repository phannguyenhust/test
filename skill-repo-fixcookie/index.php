<?php
session_start();
include_once 'login.php';
include_once 'class.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.4/css/all.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap');
  </style>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="./css/style.css">
  <?php echo '<link href="./css/style.css" rel="stylesheet">'; ?>
  <!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <script src = "https://naxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> -->
  <title> Skrill-Repo</title>
  <!-- <link rel="icon" type="image/x-icon" href="/images/favicon.ico"> -->
</head>
<body>
  <div class="page-login">
    <div class="background">
      <img src="./images/background.png" alt="background">
    </div>
    <div class="black-background">
      &nbsp;
    </div>
    <div class="login-content">
      <span class="title-form">
        Skill-Repo
      </span>
      <span class="desc-title">
        クラウド型スキルシート管理webシステム
      </span>
      <div class="login-box">
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <?php
        $rand = rand();
        $_SESSION['rand'] = $rand;
        ?>
         <input type="hidden" value="<?php echo $rand; ?>" name="randcheck" />
          <div class="form-login-input">
            <label class="form-label">メールアドレス</label>
            <input type="text" class="form-input" id="email" name="email" placeholder="メールアドレス" <?php if (!$checkEmail) {
              echo $borderError;
            } ?>>
            <p class="message" id="errorPassword">
              <?php
              echo ($emailMessage); ?>
            </p>
          </div>
          <br>
          <div class="form-login-input">
            <label class="form-label">パスワード</label>
            <input type="password" class="form-input" id="password" name="password" placeholder="パスワード" 
            <?php if (!$checkPass) {
              echo $borderError;
            } ?>>
            <p class="message" id="errorPassword">
              <?php echo($passMessage); ?>
            </p>
            <div id="errorBoth" class="not-show"></div>
            <p style="text-align: center; color: red;">
              <?php echo $errorBoth; ?>
            </p>
            <div><input type="checkbox" name="remember" id="remember" value="1" />
              <label for="remember-me">Remember me</label>
            </div>
            <button type="submit" class="btn">ログイン</button>
        </form>
        <a class="footer-login-box" href="https://skill-repo.jp/forgot-password">パスワードをお忘れの方</a>
        <a class="footer-login-box" href="https://skill-repo.jp/register">アカウントの新規登録</a>
      </div>
    </div>
  </div>
  <!-- <script src="./main.js"></script> -->
</body>
</html>