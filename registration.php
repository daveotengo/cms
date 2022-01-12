<?php  include "includes/db.php"; ?>
<?php  include "includes/header.php"; ?>
<?php include("admin/includes/functions.php"); ?>


<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
   
    $username=$_POST['username'];
    $password=$_POST['password'];
    $email=$_POST['email'];
    
    $error = [
        'username'=>'',
        'email'=>'',
        'password'=>''
    ];

    if(strlen($username) < 4){

        $error['username']='Username needs to be longer';

    }

    if($username == ''){
        
        $error['username']='Username must not be empty';
        
    }

    if($password == ''){
        
        $error['password']='Password must not be empty';
        
    }

    if($email == ''){
        
        $error['email']='Email must not be empty';
        
    }

    if(username_exists($username)){

        $error['username']='Username already exists, please pick another';

    }

    if(email_exists($email)){

        $error['email']='Email already exists. <a href=index.php>Login</a>';

    }


    foreach($error as $key=>$value){

        if(empty($value)){

           unset($error[$key]);
        }
    }

    if(empty($error)){
        
        register_user($username,$password,$email);
        
        login($username,$password);

    }
   
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
                <h1>Register</h1>
                <h5 class='text-center bg-success'><?php //echo $message; ?></h1>
                    <form role="form" action="" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username"
                            autocomplete=on 
                            value='<?php echo isset($username) ? $username : ''?>'
                            >
                            <p><?php echo isset($error['username']) ? $error['username'] : ''?></p>
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com"
                            value='<?php echo isset($email) ? $email : ''?>'>
                            <p><?php echo isset($error['email']) ? $error['email'] : ''?></p>
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            <p><?php echo isset($error['password']) ? $error['password'] : ''?></p>
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
