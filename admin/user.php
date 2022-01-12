
<?php include("includes/header.php");  ?>
<?php 
if(isset($_SESSION['username'])){

    $username=$_SESSION['username'];

    if(!is_admin( $username)){
//echo $_SESSION['username'];
        header("Location: index.php");
        
    }
}
?>


    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <?php include("includes/navigation.php");  ?>
        
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include("includes/sidebar.php");  ?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">
        
            <div class="container-fluid">
           
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome to Admin
                            <small>Author</small>
                        </h1>
                        
                    </div>


            <?php


            //update user
            update_user();
            ?>
<?php

if(isset($_GET['source'])){

    $source=$_GET['source'];

    
}else{
    $source="";
}

switch($source){
    case 'view_all_user':
    include ("includes/view_all_user.php");
    break;

    case 'add_user':
    include ("includes/add_user.php");
    break;

    case 'edit_user':
    include ("includes/edit_user.php");
    break;

    case '345':
    echo "nice 345";
    break;

    default:
    include ("includes/view_all_user.php");
    break;
}




    

?>
                   


                   <?php

function make_user_admin(){
    global $connection;

    if(isset($_GET['admin'])){
        
        $user_id=$_GET['admin'];
        $query="UPDATE users SET user_role='admin'  WHERE user_id={$user_id}";

    
        $admin_user_query=mysqli_query($connection, $query);

        if(!$admin_user_query){
            die("problem with deleting user query ".mysqli_error($connection));
        }

        header("Location:user.php");

    }elseif(isset($_GET['subscriber'])){
        
        $user_id=$_GET['subscriber'];
        $query="UPDATE users SET user_role='subscriber'  WHERE user_id={$user_id}";

    
        $subscriber_user_query=mysqli_query($connection, $query);

        if(!$subscriber_user_query){
            die("problem with deleting user query ".mysqli_error($connection));
        }

        header("Location:user.php");

    }
    

}

make_user_admin();

        ?>
                    
                    
                    
                    <?php

            //delete user
            delete_user();

            
                    ?>





                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
  
   

    <?php include("includes/footer.php");  ?>

 