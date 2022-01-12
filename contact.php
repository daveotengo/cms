<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>

<?php

ob_start();
$message="";
$message1="";
require __DIR__ . '/php/vendor/autoload.php';


if(isset($_POST['submit'])){

    ini_set("SMTP","smtp.gmail.com");
    ini_set("smtp_port","465");
    ini_set("Username","daveotengo@gmail.com");
    ini_set("Password","dadapapa");

    
    //ini_set("sendmail_from","roo@localhost.com");
    $email='da@yahoo.com';
    $subject='The subject';
    $body='The body';

    $email=$_POST['email'];
    $subject=$_POST['subject'];
    $body=$_POST['body'];
    
    // $email=mysqli_real_escape_string($connection,$email);
    // $subject=mysqli_real_escape_string($connection, $subject);
    // $body=mysqli_real_escape_string($connection,$body);
    
     

    if(!empty($subject)  && !empty($email) && !empty($body)){
       //$to="daveotengo@gmail.com";
   // the message
//$msg = "First line of text\nSecond line of text";

// use wordwrap() if lines are longer than 70 characters
// $subject = wordwrap($_POST['subject'],70);
// $header="From: " .$_POST['email'];
// $body=$_POST['body'];
// send email
// mail($to,$subject,$body,$header);



try {
//$mail = new PHPMailer;
$mail = new PHPMailer();
$mail->SMTPDebug = 0;                                 // Enable verbose debug output
$mail->isSMTP();
//$mail->Mailer = 'smtp' ;                                     // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                        // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                                 // Enable SMTP authentication
 $mail->Username = 'daveotengo@gmail.com';               // SMTP username
 $mail->Password = 'dadapapa';                            // SMTP password
$mail->SMTPSecure = "tls";                             // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;



// $mail->From = 'daveotengo@gmail.com';
// $mail->FromName = 'David Oteng';
//$mail->setFrom('daveotengo@gmail.com', 'David oteng');
// $mail->AddAddress('info@superlock.ci', 'SuperLock');
// $mail->addCC("cisuperlock@gmail.com");
// $mail->addBCC("davidot@stlghana.com");


$mail->isHTML(true);                                     // Set email format to HTML

// $mail->Subject = htmlspecialchars($_POST['subject']);
// $email=htmlspecialchars($_POST['email']);
// $body=htmlspecialchars($_POST['body']);
// $body = 'Client\'s email: ' . $email . "\r\n" ."\n"."<br /><br />".
//         'Client\'s email: ' . $body . "\r\n" ."\n"."<br /><br />";


        

 // create a new object
// $mail->IsSMTP(); // enable SMTP
// $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
// $mail->SMTPAuth = true; // authentication enabled
// $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
// $mail->Host = "smtp.gmail.com";
// $mail->Port = 465; // or 587
// $mail->IsHTML(true);
// $mail->Username = "email@gmail.com";
// $mail->Password = "password";
$mail->SetFrom("daveotengo@gmail.com");
$mail->Subject = "Test";
$mail->Body = "hello";
$mail->AddAddress("daveotengo@gmail.com");


//$mail->Body = $body;
        
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if($mail->send()) {
            $message = "Email sent Successfully";
        }else{
            $message = "Email was not sent";
        }

    } catch (phpmailerException $e) {
        $errors[] = $e->errorMessage(); 
    }catch (Exception $e) {
        $errors[] = $e->getMessage(); //Boring error messages from anything else!
    }

} else {
    $message="One of your fields may be empty.";
}

//ob_end_flush();


//     }else{

//         $message="One of your fields may be empty.";

//     }
// }else{
//     $message="";
}
?>
    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Contact</h1>
                <h5 class='text-center bg-success'><?php echo $message; ?></h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Subject</label>
                            <input type="text" name="subject" id="subject" class="form-control" placeholder="Enter Subject">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Content</label>
                            <textarea  name="body" id="body" class="form-control" placeholder="Password"> </textarea>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Send">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
