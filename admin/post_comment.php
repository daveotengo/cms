
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





                    
                        <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Coment Id</th>
                                <th>Author</th>
                                <th>In Response to</th>
                                <th>Comment Status</th>
                                <th>Content</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Action Delete</th>
                              
                               
                            </tr>
                        </thead>
                        <tbody>


                        <?php
if(isset($_GET['delete_comment_id'])){
                
                $comment_id=$_GET['delete_comment_id'];
        
                $query="DELETE from comments WHERE comment_id='{$comment_id}'";
                $delete_comment_query=mysqli_query($connection, $query);
        
                if(!$delete_comment_query){
                    die("problem with deleting comment query ".mysqli_error($connection));
                }
        
               // header("Location:post_comment.php");
        
            }
?>

            <?php 



        //find all comments
if(isset($_GET['pid'])){

    $the_post_id=$_GET['pid'];
}else{
    $the_post_id="";
}
       
        $query="SELECT * FROM comments WHERE comment_post_id ='{$the_post_id}'";

        $select_all_comments_query=mysqli_query($connection, $query);

        if(!$select_all_comments_query){
            die("query failed".mysqli_error($connection));
        }
    
        while($row=mysqli_fetch_assoc($select_all_comments_query)){
        $comment_id=$row['comment_id'];
        $comment_author=$row['comment_author'];
        $comment_post_id=$row['comment_post_id'];
        $comment_status=$row['comment_status'];
        $comment_content=$row['comment_content'];
        $comment_email=$row['comment_email'];
        $comment_date=$row['comment_date'];
    
    
                    //select category by id to display category title
                    
                    $post_id=$comment_post_id;
        
                    $query="SELECT * from posts WHERE post_id='{$post_id}'";
                    $select_posts_query=mysqli_query($connection, $query);
        
                    if(!$select_posts_query){
                    die("problem with select post query ".mysqli_error($connection));
                    }
        
                    while($row=mysqli_fetch_assoc($select_posts_query)){
        
                    $post_title=$row['post_title'];
    
                    //end select category by id to display category title one bracket below
      
        
    
        echo " 
        <tr><td>{$comment_id}</td>".
        "<td>{$comment_author}</td>".
        "<td><a href='../post.php?source={$post_id}'>{$post_title}</a></td>".
        "<td>{$comment_status}</td>".
        "<td>{$comment_content}</td>".
        "<td>{$comment_email}</td>".
        "<td>{$comment_date}</td>".
        "<td><a href='comment.php?approve={$comment_id}'>Approve</a></td>".
        "<td><a href='comment.php?unapprove={$comment_id}'>Unapprove</a></td>".
        "<td><a onClick=\"javascript: return confirm('Are you sure your want to delete record')\" href='post_comment.php?delete_comment_id={$comment_id}&pid={$the_post_id}'>Delete</a></td>".
       
    
        "</tr>";
                    }
                
        }

            ?>



                           
                        </tbody>
                    </table>



                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <?php include("includes/footer.php");  ?>