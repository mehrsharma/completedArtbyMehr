<?php
    use PHPMailer\PHPMailer\PHPMailer;

    if (isset ($_POST['name']) && isset ($_POST['email'])){
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $subject = $_POST['subject'];
        $email = $_POST['email'];
        $body = $_POST['body'];

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail ->isSMTP();
        $mail ->Host = "smtp.gmail.com";
        $mail ->SMTPAuth = "true";
        $mail ->Username = "artbymehr.artbymehr@gmail.com";
        $mail ->Password = 'ArtbyMehr123';
        $mail ->Port = 587;
        $mail ->SMTPSecure = 'tls';
        //Email Settings
        $mail ->isHTML(true);
        $mail ->setFrom($email, $name);
        $mail ->addAddress("mehrsharma@gmail.com");
        $mail ->Subject = $subject;
        $mail ->Body = $body;

        if ($mail ->send()){
            $response = "email is sent!";
        }
        else{
            $response = "something is wrong. " . $mail ->ErrorInfo;
        }

        exit(json_encode(array("response" =>$response)));

    }

?>
