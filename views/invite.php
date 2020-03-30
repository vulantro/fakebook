<?php
require_once('../config.php');
require_once('../views/navigation.php');
if (isset($_POST["email"])) {
    $email = $_POST["email"];

    $user = $db->select("select email from invitations where email='" . $email . "'");
    if (is_null($user)) {
        $hash_ = hash('tiger192,3', $email);
        $db->insert(
            'invitations',
        [
            // TODO : amikor lesz majd user_id (bejelentkezett felhasználó)
            'user_id' => $_SESSION["user_id"],
            'email' => $email,
            'hash' => $hash_
        ]
        );

        try {

            $data = 'https://fkbk.mooo.com/register/' . $hash_;
            $pic = $qr->render($data);
            base64_to_file($pic, 'tmp.png');
            $mail->CharSet = 'UTF-8';
            $mail->addAddress($email); // Add a recipient
            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Meghívó FakeBook regisztrációra';

            $mail->AddEmbeddedImage('tmp.png', 'qr-code');
            $mail->Body = 'Hello!<br>Ezt az üzenetet egy ismerősöd kezdeményezésére küldjük, aki már tagunk. Az oldalra az alábbi linkre kattintva, vagy a QR kódot beolvasva regisztrálhatsz. A regisztrációra a levél kiküldésétől számított 48 óráig van lehetőséged.<br><center><img src="cid:qr-code"><br><a href="https://fkbk.mooo.com/register/' . $hash_ . '">Regisztrációs oldal megnyitása</a></center>';
            $mail->AltBody = "Hello!\nEzt az üzenetet egy ismerősöd kezdeményezésére küldjük, aki már tagunk. Az oldalra az alábbi linkre kattintva, vagy a QR kódot beolvasva regisztrálhatsz.  A regisztrációra a levél kiküldésétől számított 48 óráig van lehetőséged. Regisztrációs oldal megnyitása: https://fkbk.mooo.com/register/" . $hash_;

            $mail->send();
            echo 'Message has been sent';
            echo $email;
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
    else {
        echo "Ez a felhasználó már kapott meghívást.";
    }
}

?>

<form action="" method="post">

<input type="email" name="email" required id="email">
<br>
<input type="submit" value="Meghív">

</form>
