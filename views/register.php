<?php

require_once('../config.php');

$handleGet = false;
$hash = explode('/', $_SERVER['REQUEST_URI']);

//if (isset($_GET["hash"])) {
if ($hash[2]) {
    if (isset($_POST["psw-repeat"]) && isset($_POST["full_name"]) &&
    isset($_POST["email"]) && isset($_POST["psw"])) {
        $handleGet = true;

        $fullName = $_POST["full_name"];
        $email = $_POST["email"];
        $pass = $_POST["psw"];
        $pass_repeat = $_POST["psw-repeat"];
        $hash = $hash[2];
        if ($pass === $pass_repeat) {

            $user = $db->select("select invitations_id, created from invitations where used=0 and email='" . $email . "' and hash='" . $hash . "'");

            if (!is_null($user) && sizeof($user) == 1) {
                if (strtotime(time()) > strtotime("+2 day", $user[0][created]))
                {
                    echo "Ez a meghívó lejárt!";
                    $db->delete(
                        'invitations',
                    [
                        // where
                        'hash' => $hash,
                    ]
                    );
                    exit();
                }
                $db->insert(
                    'users',
                [

                    'name' => $fullName,
                    'email' => $email,
                    'pass' => md5($pass)
                ]
                );
                $db->update(
                    'invitations',
                [
                    // set
                    'used' => 1
                ],
                [
                    // where
                    'invitations_id' => $user[0]['invitations_id']
                ]
                );
                //TODO:
                //Ötlet: lehetne külön profilszerkesztési oldal, és ott lehetne megadni
                // - születési dátumot, profilképet, stbstb sok szarságot, ami van a Facebookon is
                //Ehhez kell pl valami details tábla és user_id lesz az összekötés.
                //update invitation used
                //duplikált email check (tick)
                redirect("mainPage");
            }
            else {
                echo "EZZEL MÁR REGIZTEK";
            }

        }
    }
}
else {
    echo "hiba";
//redirect("php404.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="./css/login_register.css"/>
</head>

<body>

            <div class="container">
                <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Create Acccount</h5>
                        <p class="card-text text-center">Get started with your free account</p>
            
                        <form class="form-signin" action="" method="post">
                            <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
                            <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>

                            <div class="separator">OR</div>

                            <div class="form-label-group">
                                <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Full Name" required autofocus>
                                <label for="full_name"><i class="fa fa-user"></i> Full Name</label>
                            </div>

                            <div class="form-label-group">
                                <input type="email" name="email" id="email" class="form-control" placeholder="Email" required>
                                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            </div>

                            
                            <div class="form-row">
                                <div class="form-label-group form-group col-4 col-sm-4 col-sd-4 col-lg-4">
                                    <select class="custom-select">
                                        <option selected="">+971</option>
                                        <option value="1">+972</option>
                                        <option value="2">+198</option>
                                        <option value="3">+701</option>
                                    </select>
                                </div>

                                <div class="form-label-group form-group col-8 col-sm-8 col-sd-8 col-lg-8">
                                    <input type="number" name="phone-number" id="phone-number" class="form-control" placeholder="Phone number" required autofocus>
                                    <label for="phone-number"><i class="fa fa-phone"></i> Phone Number</label>
                                </div>
                            </div>

                            <div class="form-label-group">
                                <select class="custom-select">
                                    <option selected=""> Select job type</option>
                                    <option value="1">Designer</option>
                                    <option value="2">Manager</option>
                                    <option value="3">Accaunting</option>
                                </select>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="psw" id="psw" class="form-control" placeholder="Password" required>
                                <label for="psw"><i class="fa fa-lock"></i> Password</label>
                            </div>

                            <div class="form-label-group">
                                <input type="password" name="psw-repeat" id="psw-repeat" class="form-control" placeholder="Repeat password" required>
                                <label for="psw-repeat"><i class="fa fa-lock"></i> Repeat password</label>
                            </div>

                            <div class="custom-control custom-checkbox mb-3">
                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">Remember password</label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Create Account</button>

                            <br>
                            <p class="card-text text-center">Have an account? <a href="/login">Sign in</a></p>
                        </form>
                    </div>
                    </div>
                </div>
                </div>
            </div>

    <br><br>
    <article class="bg-secondary mb-3">

        <br><br>
    </article>
</body>

</html>