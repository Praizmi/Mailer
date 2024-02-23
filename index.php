<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

include "function.php";

try {

    if(isset($_POST['submit'])){
        $name = sanitizeName($_POST['name']);
        $email = sanitizeMail($_POST['email']);
        $recEmail = sanitizeMail($_POST['recEmail']);
        $subject = sanitizeName($_POST['subject']);
        $message = sanitizeMessage($_POST['message']);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'praisemichael20@gmail.com';
    $mail->Password   = '';
    $mail->Port       = 587;

    //Recipients
    $mail->setFrom($email, 'xMailer');
    $mail->addAddress($email, $name);
    $mail->addAddress( $recEmail);
    $mail->addReplyTo('info@example.com', 'Information');

    //Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
    }
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Mailer | Admin</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>

<body>
    <div class="container marketing">

        <section class="mb-4 mt-5">

            <!--Section heading-->
            <h2 class="h1-responsive font-weight-bold text-center my-4">Mailer</h2>
            <!--Section description-->
            <p class="text-center w-responsive mx-auto mb-5 text-info">Send your mails with ease</p>

            <div class="row">
                <!--Grid column-->
                <div class="card col-md-9 mb-md-0 mb-5 mx-auto my-5 shadow border-0">
                    <form action="index.php" method="POST">
                        <div class="row">
                            <div class="col mb-0">
                                <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mb-0">
                                <label for="email" class="">Receivers email</label>
                                <input type="text" id="recEmail" name="recEmail" class="form-control">
                            </div>
                            <div class="col mb-0">
                                <label for="subject" class="">Subject</label>
                                <input type="text" id="subject" name="subject" class="form-control">
                            </div>
                        </div>
                        <div class="md-form">
                            <label for="message">Your message</label>
                            <textarea type="text" id="message" name="message" rows="2"
                                class="form-control md-textarea"></textarea>
                        </div>

                        <div class="text-center text-md-left mb-2">
                            <button name="submit" class="w-50 btn btn-lg btn-primary mt-4" type="submit">Send</button>
                        </div>
                        <div class="status"></div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    </div>
</body>

</html>