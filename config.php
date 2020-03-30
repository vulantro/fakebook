<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use chillerlan\QRCode\QRCode;

// use Delight\Auth\Auth;
// use Delight\Db\PdoDsn;
// use Delight\Db\PdoDatabase;

require_once dirname(__FILE__ ) . '/assets/functions.php';
require_once dirname(__FILE__ ) . '/vendor/autoload.php';

$qr = new QRCode();

$db = \Delight\Db\PdoDatabase::fromDsn(
    new \Delight\Db\PdoDsn(
    'mysql:dbname=arsenal1_fakebook;host=localhost',
    'arsenal1_fakebook',
    '0R!RSZw3Yo{q'
    )
);

if (session_status() == PHP_SESSION_NONE)
    session_start();

// $auth = new \Delight\Auth\Auth($db);

$mail = new PHPMailer(true);
$mail->SMTPDebug = SMTP::DEBUG_SERVER; // Enable verbose debug output
$mail->isSMTP(); // Send using SMTP
$mail->Host = 'cp2.ezit.hu'; // Set the SMTP server to send through
$mail->SMTPAuth = true; // Enable SMTP authentication
$mail->Username = 'noreply@fkbk.mooo.com'; // SMTP username
$mail->Password = 'tv9c@ujPfH%P'; // SMTP password
$mail->setFrom('noreply@fkbk.mooo.com', 'FakeBook');

// echo 'teszt';