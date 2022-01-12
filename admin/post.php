
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

                add_post();


              
                ?>
               












            


<?php


            //update post
            update_post();
            ?>
<?php

if(isset($_GET['source'])){

    $source=$_GET['source'];

    
}else{
    $source="";
}

switch($source){
    case 'view_all_post':
    include ("includes/view_all_post.php");
    break;

    case 'add_post':
    include ("includes/add_post.php");
    break;

    case 'edit_post':
    include ("includes/edit_post.php");
    break;

    case '345':
    echo "nice 345";
    break;

    default:
    include ("includes/view_all_post.php");
    break;
}

if(isset($_GET['reset'])){
    
        $the_post_id=$_GET['reset'];

        $query="UPDATE posts SET post_view_count=0 where post_id=$the_post_id";
        $reset_post_view_query=mysqli_query($connection,$query);
        if(!$reset_post_view_query){
            die("query failed".mysqli_error($connection));
        }
        header("Location:post.php");
        
    }else{
        $post_view_count="";
    }



    

?>
                   

                    
                    
                    
                    <?php

            //delete post
            delete_post();

            
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
 