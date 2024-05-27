<?php

    require_once '../config.php';

    $id_pensyarah = $_POST['id_pensyarah'];

    $sql = "SELECT  AS sender_id,
         AS sender_name,
         AS receiver_id, 
         AS receiver_name,
         AS receiver_email
        FROM 
        WHERE ;
    ";

    $result = mysqli_query($connect, $sql);

    $row = mysqli_num_rows($result);

    $row = mysqli_fetch_assoc($result);

    $sender_id = $row['sender_id'];
    $sender_name = $row['sender_name'];
    $receiver_id = $row['receiver_id'];
    $receiver_name = $row['receiver_name'];
    $receiver_email = $row['receiver_email'];

    /* ======================================================================================= */

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require_once '../date/date.php';
    require_once '../../../vendor/phpmailer/src/Exception.php';
    require_once '../../../vendor/phpmailer/src/PHPMailer.php';
    require_once '../../../vendor/phpmailer/src/SMTP.php';

    //  Gmail address and gmail app password

    require_once '../../../email/credentials/email-cred.php';

    $gmail_Receiver = $receiver_email;
    $gmail_Receiver_message = "";

    /*  
        Get a structure of the webpage that is needed with the correct
        file name
    */

    //$gmail_Receiver_content = file_get_contents(".php"); // -> Add a file to display content
    //$gmail_Receiver_content = "Hi this is a testing 12 : ".$link_rph;

    /*  
        Get the correct variable that is needed with the correct
        file name
    */

    $gmail_Receiver_content_form = '';  //  This variable is located in 'send-email-form.php' file
    require_once 'send-email-form.php';   
    $gmail_Receiver_content = $gmail_Receiver_content_form;

    try {
        if (isset($_POST["add"])) {

            //  Wait for 2 seconds before execute the script
            sleep(1.5);

            //  Declaring an object
            $mail = new PHPMailer(true);    

            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = true;

            //  insert gmail address
            $mail -> Username = $gmail_Usr;  
            
            //  gmail app password address
            $mail -> Password = $gmail_Pass; 

            $mail -> SMTPSecure = 'ssl';
            $mail -> Port = 465;

            //  insert gmail
            $mail -> setFrom($gmail_Usr); 

            $mail -> addAddress($gmail_Receiver);

            $mail -> isHTML(true);

            //  Sending the email content (subject, message & body content)
            $mail -> Subject = $gmail_Receiver_message;
            $mail -> AltBody = $gmail_Receiver_message;
            $mail -> Body = $gmail_Receiver_content;

            $mail -> send();

            header('Location: ../dashboard.php');
            
        }
    }

    catch (Exception $e) {
        echo '<h2>Message : '.$e -> getMessage().'</h2>';
    }
