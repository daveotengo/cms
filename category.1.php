<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    <?php include("admin/includes/functions.php"); ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php


            if(isset($_GET['category'])){

                $cat_id=$_GET['category'];
              
                if(is_admin($_SESSION['username'])){
                    $stmt1=mysqli_prepare($connection,"SELECT post_id,post_title,post_user,post_date,post_image,post_content FROM posts WHERE post_category_id=?");
                }else{
                    $stmt2=mysqli_prepare($connection,"SELECT  post_id,post_title,post_user,post_date,post_image,post_content FROM posts WHERE post_category_id=? AND post_status=?");
                    $published='published';
                }
            

                if(isset($stmt1)){
                    mysqli_stmt_bind_param($stmt1,"i",$cat_id);
                    mysqli_stmt_execute($stmt1);
                    mysqli_stmt_bind_result($stmt1, $post_id,$post_title,$post_user,$post_date,$post_image,$post_content);
                $stmt=$stmt1;
                }else{
                    mysqli_stmt_bind_param($stmt2,"is",$cat_id,$published);
                    mysqli_stmt_execute($stmt2);
                    mysqli_stmt_bind_result($stmt2, $post_id,$post_title,$post_user,$post_date,$post_image,$post_content);
                $stmt=$stmt2;
                }

                if(!$stmt){
                    die("stmt failed".mysqli_error($connection));
                }
                //$select_all_posts_query=mysqli_query($connection, $query);

                if(mysqli_stmt_num_rows($stmt)<1){

                    echo"<h1 class='text-center'>No Content</h1>";
                }else{

               

                while(mysqli_stmt_fetch($stmt)){
                    // $post_id=$row['post_id'];
                    // $post_title=$row['post_title'];
                    // $post_author=$row['post_user'];
                    // $post_date=$row['post_date'];
                    // $post_image=$row['post_image'];
                    // $post_content=substr($row['post_content'],0,100);


                      //select username from users
  
     $stmt3=mysqli_prepare($connection, "SELECT username FROM users WHERE user_id=? ");
    if(isset($stmt3)){
        mysqli_stmt_bind_param($stmt3,"i",$post_user);
        mysqli_stmt_execute($stmt3);
        mysqli_stmt_bind_result($stmt3, $username);
    }
   // $row=mysqli_fetch_assoc($select_username_query);
    //$username=$row['username'];
                 
                    

?>


                    <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?source=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="post_author.php?post_author=<?php echo $post_author ?>"><?php echo $username ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo "Posted on {$post_date}"  ?> </p>
                <hr>
                <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

                 

            




<?php 
 } }  }else{
    header("Location: index.php");
} 

?>

           


                

                <!-- Pager -->
                <!-- <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul> -->

            </div>

            <!-- Blog Sidebar Widgets Column -->

            <?php include("includes/sidebar.php"); ?>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <?php include("includes/sidewiget.php"); ?>
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

       <?php include("includes/footer.php"); ?>
