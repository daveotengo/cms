
<?php
ob_start();
$message="";
$message1="";
require __DIR__ . '/vendor/autoload.php';
if(isset($_POST['cf_submitted'])
        &&isset($_POST['cf_name'])
        &&isset($_POST['cf_phone'])
        &&isset($_POST['cf_email'])
        &&isset($_POST['g-recaptcha-response'])) {

        $cf_name = 'David Oteng';
        $cf_phone = 0000223233;
        $cf_email = 'da@yahoo.com';
        $cf_region = 'alaska';
        $mail = new PHPMailer;

        $mail->SMTPDebug = 0;                                 // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'www.superlock.ci';                        // Specify main and backup SMTP servers
        $mail->SMTPAuth = false;                                 // Enable SMTP authentication
        $mail->Username = 'webadmin@superlock.ci';               // SMTP username
        $mail->Password = '1qaz@WSX';                            // SMTP password
        $mail->SMTPSecure = 'tls';                             // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 25;


   



        $mail->From = 'webadmin@superlock.ci';
        $mail->FromName = 'SuperLock';

        $mail->AddAddress('info@superlock.ci', 'SuperLock');
        $mail->addCC("cisuperlock@gmail.com");
        $mail->addBCC("davidot@stlghana.com");


        $mail->isHTML(true);                                     // Set email format to HTML

        $mail->Subject = htmlspecialchars($_POST['cf_subject']);
        $cf_name = htmlspecialchars($_POST['cf_name']);
        $cf_phone = htmlspecialchars($_POST['cf_phone']);
        $cf_email = htmlspecialchars($_POST['cf_email']);
        $body = 'Client\'s name: ' . $cf_name . "\r\n" ."\n"."<br /><br />".
                'Client\'s email: ' . $cf_email . "\r\n" ."\n"."<br /><br />".
                'Client\'s phone number: ' . $cf_phone ."\r\n"."\n"."<br /><br />";
        
        if(isset($_POST['cf_region'])) {
                $cf_region = htmlspecialchars($_POST['cf_region']);  
                $body .= 'Client\'s region: ' . $cf_region ."\r\n"."\n"."<br /><br />";
        }

        if(isset($_POST['cf_message'])) {
                $cf_message = htmlspecialchars($_POST['cf_message']);  
                $body .= 'Client\'s message: ' . $cf_message ."\r\n"."\n"."<br /><br />";
        }

        if(isset($_POST['cf_product'])) {
                $cf_product = htmlspecialchars($_POST['cf_product']); 
                $body .= 'Client\'s product request: ' . $cf_product ."\r\n"."\n"."<br /><br />";
        }

        $mail->Body = $body;
                
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){

        $secret = '6LcI8iQUAAAAAC7-2T07urWEkGzehncmVxDexnpE';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);

        if($responseData->success) {  
                //contact form submission code goes here
                if($mail->send()) {
                        $message = "Merci d'avoir contacté SuperLock Cote d'ivoire, attendez-vous bientôt.";
                }
        }

        } else {
                $message1 = "Vérifiez que je ne suis pas un robot";
        }
}
ob_end_flush();
?>