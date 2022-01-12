<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    

    <?php
 function add_comment(){
    
        
    
        global $connection;
        if(isset($_POST['submit'])){


            $comment_author=$_POST['comment_author'];
            $comment_post_id=$_POST['comment_post_id'];;
            $comment_status='unapproved';
            $comment_content=$_POST['comment_content'];
            $comment_email=$_POST['comment_email'];
            $comment_date= date('d-m-y');
            



                if( $comment_author==""||empty($comment_author)||$comment_post_id==""||empty($comment_post_id)||$comment_status==""||empty($comment_status)||$comment_content==""||empty($comment_content)||$comment_email==""||empty($comment_email)||$comment_date==""||empty($comment_date)){
                    echo "one of the fields is empty so check and fill it";
            
                }else{
                   
                    $query="INSERT INTO comments(comment_author,comment_post_id,comment_status,comment_content,comment_email,comment_date) VALUES('{$comment_author}' ,{$comment_post_id},'{$comment_status}','{$comment_content}','{$comment_email}', now())";
                    $add_comment_query=mysqli_query($connection, $query);
                    
                    if(!$add_comment_query){
                        die("problem with add comment query".mysqli_error($connection));
                    }

                    //increment of comment_count
                    $query2="UPDATE posts SET post_comment_count=post_comment_count + 1  WHERE post_id={$comment_post_id}";
                    $update_comment_count_query=mysqli_query($connection, $query2);
                    
                    if(!$update_comment_count_query){
                        die("problem with add comment query".mysqli_error($connection));
                    }
            
                }
            }
    }



    add_comment();

    ?>


    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">



            <?php

            if(isset($_GET['post_author'])){

                $post_author=$_GET['post_author'];


            }else{
                $post_author="";
            }

            



           


                $query="SELECT * FROM posts WHERE post_user='{$post_author}'";
                $select_posts_author_query=mysqli_query($connection, $query);

                if( !$select_posts_author_query){
                    die("Query Failed".mysqli_error($connection));
                }



                while($row=mysqli_fetch_assoc( $select_posts_author_query)){
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_user'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_content=$row['post_content'];
                 
                    
 //select username from users
 
          
                $query="SELECT username FROM users WHERE user_id='{$post_author}' ";
                $select_username_query=mysqli_query($connection, $query);
                $row=mysqli_fetch_assoc($select_username_query);
                $username=$row['username'];
                
      

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
               
                    Posts by <?php echo $username; ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo "Posted on {$post_date}"  ?> </p>
                <hr>
                <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
                <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">

                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                <!-- <hr> -->

                  <!-- Blog Comments -->

                <!-- Comments Form -->
                <!-- <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form role="form" method=post action="">
                    <input type="hidden" class="form-control" name="comment_post_id" id="" value='<?php echo $post_id ?>' />
                    <div class="form-group">
                        <label for="comment_author"> Author</label>
                        <input type="text" class="form-control" name="comment_author" id="">
                    </div>
                    <div class="form-group">
                        <label for="comment_email"> Email</label>
                        <input type="email" class="form-control" name="comment_email" id="">
                    </div>
                        <div class="form-group">
                        <label for="comment_content">Comment</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <input type="submit" name="submit" class="btn btn-primary" />
                    </form>
                </div>

                <hr> -->

                <?php  }  ?>

            <?php

            // if(isset($_GET['source'])){

            //     $post_id=$_GET['source'];


            // }else{
            //     $post_id="";
            // }



           


            //     $query="SELECT * FROM comments WHERE comment_post_id={$post_id} AND comment_status='approved' ORDER BY comment_id DESC";
            //     $select_all_comments_query=mysqli_query($connection, $query);
            //     if(!$select_all_comments_query){
            //         die("query failed".mysqli_error($connection));
            //     }

            //     while($row=mysqli_fetch_assoc($select_all_comments_query)){
                   
            //        // $comment_id=$row['comment_id'];
            //         $comment_author=$row['comment_author'];
            //         $comment_post_id=$row['comment_post_id'];
            //         $comment_status=$row['comment_status'];
            //         $comment_content=$row['comment_content'];
            //         $comment_email=$row['comment_email'];
            //         $comment_date=$row['comment_date'];
                 
                    

?>
                <!-- Posted Comments -->

                <!-- Comment -->
                <!-- <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author ?>
                            <small><?php echo $comment_date ?></small>
                        </h4>
                        <?php echo $comment_content ?>
                    </div>
                </div> -->

               

            




<?php // }  ?>






           


                

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
