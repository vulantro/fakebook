<?php
require_once("../config.php");
$succesfulLogin = false;
if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != '')
{
  redirect('/');
  exit();
}
if (isset($_POST["username"]) && isset($_POST["password"]))
{
  $pass = $_POST["password"];
  $email = $_POST["username"];
  $user = $db->select("SELECT user_id from users where pass='" . md5($pass) . "' and email='" . $email . "'");
  //  echo "SELECT user_id from users where pass=".md5($pass)." and email=".$email;
  // $user = $db->select(
  //     'SELECT user_id from users where pass=? and email=?',
  //     [ md5($pass), $email]
  // );
  if ($user != null)
    $_SESSION["user_id"] = $user[0]["user_id"];
  $succesfulLogin = true;
  redirect('/');
  exit();


}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="./css/login_register.css"/>
</head>

<!------ Include the above in your HEAD tag ---------->

    <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <input type="email" value="szb9960@gmail.com" name="username" id="username" class="form-control" placeholder="Email address" required autofocus>
                <label for="username">Username</label>
              </div>

              <div class="form-label-group">
                <input type="password" value="123" name="password" id="password" class="form-control" placeholder="Password" required>
                <label for="password">Password</label>
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <?php if (!$succesfulLogin && count($_POST) > 0): ?>
                                    <div class="alert alert-danger" role="alert">
                                    A felhasználónév vagy jelszó helytelen volt.
                                    </div>
              <?php
endif; ?>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign in</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
