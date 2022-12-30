<?php
require_once 'class.php';
  $checkEmail = true;
  $checkPass = true;
  $emailFake = 'ace@gmail.com';
  $passFake = 'demo123';
  $cookie_name = 'user';
  $arr = [];
  $borderError = 'style="border: 1px solid red"';
  $errorBoth = '';
  $emailShow = '';
  $passShow = '';
  $emailMessage = '';
  $passMessage = '';
  function validateEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }
  function duplicate($input, $var){
    $input = new Validate($var);
  }
  
  if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST['randcheck']==$_SESSION['rand'])
  {
    $email = $_POST["email"];
    $password = $_POST["password"];
    
    //Email
    if (empty($email)) {
      // $emailShow = "Email khong duoc de trong";
      $checkEmail = false;
      $emailShow = new Validate('Email không được để trống');
      $emailMessage = $emailShow->message();
      
    } else if (!(validateEmail($email))) {
      $checkEmail = false;
      $emailShow = new Validate('Email sai định dạng');
      $emailMessage = $emailShow->message();
    } else {
      $emailShow = new Validate('');
      $emailMessage = $emailShow->message();
    }
    //password
    if (empty($password)) {
      $passShow = new Validate('Password không được để trống');
      $passMessage = $passShow->message();
      $checkPass = false;
    } else if (strlen($password) > 20) {
      $passShow = new Validate('Password không được quá 20 kí tự');
      $passMessage = $passShow->message();
      $checkPass = false;
    } else {
      $passShow = new Validate('');
      $passMessage = $passShow->message();
    }
    //check correct
    if ($checkEmail && $checkPass) {
      if (!($email == $emailFake && $password == $passFake)) {
        $errorBoth = "Email hoặc mật khẩu không đúng";
      } else {
        $errorBoth = '';
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $tenDN = $_SESSION['email'] .', '. $_SESSION['password'] . "\r\n";
        $fp = fopen('php.txt', "a");
        fwrite($fp, $tenDN);
        header('location: http://localhost/skill-repo-fixcookie/hello.php');
        if (isset($_POST['remember'])) {
          $password = ($passFake);
          setcookie($cookie_name, 'email=' . $emailFake . '&password=' . $passFake, time() + 86400 * 30);
        }
      }
    } 
  }
  //check cookie
  if (isset($_COOKIE[$cookie_name])) {
    parse_str($_COOKIE[$cookie_name], $arr);
    if (($arr['email'] == $emailFake) && ($arr['password'] == $passFake)) {
      header('location: http://localhost/skill-repo-fixcookie/hello.php');
    }
  }
  ?>