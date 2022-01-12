
<?php include("includes/header.php");  ?>

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

               // add_comment();

                ?>












            


            <?php


            //update comment
            update_comment();
            ?>
<?php

if(isset($_GET['source'])){

    $source=$_GET['source'];

    
}else{
    $source="";
}

switch($source){
    case 'view_all_comment':
    include ("includes/view_all_comment.php");
    break;



   

    case '345':
    echo "nice 345";
    break;

    default:
    include ("includes/view_all_comment.php");
    break;
}




    

?>
        
        
        <?php

function approve_comment(){
    global $connection;

    if(isset($_GET['approve'])){
        
        $comment_id=$_GET['approve'];
        $query="UPDATE comments SET comment_status='approved'  WHERE comment_id={$comment_id}";

    
        $approve_comment_query=mysqli_query($connection, $query);

        if(!$approve_comment_query){
            die("problem with deleting comment query ".mysqli_error($connection));
        }

        header("Location:comment.php");

    }elseif(isset($_GET['unapprove'])){
        
        $comment_id=$_GET['unapprove'];
        $query="UPDATE comments SET comment_status='unapproved'  WHERE comment_id={$comment_id}";

    
        $unapprove_comment_query=mysqli_query($connection, $query);

        if(!$unapprove_comment_query){
            die("problem with deleting comment query ".mysqli_error($connection));
        }

        header("Location:comment.php");

    }
    

}

approve_comment()

        ?>

                    
                    
                    
                    <?php







            //delete comment
            delete_comment();

            
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
    