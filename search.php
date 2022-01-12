<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

            if(isset($_POST['submit'])){


                $search = $_POST['search'];

                $query = "SELECT * FROM posts WHERE post_title LIKE '%$search%'";

                $search_query = mysqli_query($connection, $query);
                
                if(!$search_query){
                    die("problem with query ".mysqli_error($connection));
                }

                $count = mysqli_num_rows($search_query);

                if($count==0){
                    echo "no result";
                }else{
                    
                    
                    
                               
                    
                                    while($row=mysqli_fetch_assoc($search_query)){
                                        $post_title=$row['post_title'];
                                        $post_author=$row['post_user'];
                                        $post_date=$row['post_date'];
                                        $post_image=$row['post_image'];
                                        $post_content=$row['post_content'];
                                     
                                        
                    
                    ?>
                    
                    
                                        <h1 class="page-header">
                                        Page Heading
                                        <small>Secondary Text</small>
                                    </h1>
                    
                                    <!-- First Blog Post -->
                                    <h2>
                                        <a href="#"><?php echo $post_title ?></a>
                                    </h2>
                                    <p class="lead">
                                    <?php
                                        if (isset($_POST['submit'])){

                                          $query_users="SELECT * FROM users   WHERE user_id = '{$post_author}'";
                                          $search_query_users=mysqli_query($connection,$query_users );

                                          while($users=mysqli_fetch_assoc($search_query_users)){

                                              $post_user=$users['user_firstname'];
                                              
                                          }
                                        }
                                    ?>
                                   
                                        by <a href="index.php"><?php echo $post_user?></a>
                                    </p>
                                    <p><span class="glyphicon glyphicon-time"></span><?php echo "Posted on {$post_date}"  ?> </p>
                                    <hr>
                                    <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
                                    <img class="img-responsive" src="images/<?php echo $post_image ?>" alt="">
                    
                                    <hr>
                                    <p><?php echo $post_content ?></p>
                                    <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                    
                                    <hr>
                    
                    
                    
                    <?php  }  
                }
            
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
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>

        </div>
        <!-- /.row -->

        <hr>

       <?php include("includes/footer.php"); ?>
