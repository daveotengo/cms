<?php include("includes/db.php"); ?>
<?php include("includes/header.php"); ?>
    <!-- Navigation -->
    <?php include("includes/navigation.php"); ?>
    

    <?php
    $per_page=5;
if(isset($_GET['page'])){
    
    $page=$_GET['page'];


}else{
    $page=1;

}

if($page=="" || $page==1){
    
    $page_1 = 0;

    
}else{
    $page_1 = ($page*$per_page)-$per_page;
}
           ?>



    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">
                    Posts From All Catergories
                    <small></small> 
                </h1>
            <?php

if(isset($_SESSION['user_role'])&&$_SESSION['user_role']=='admin'){
    $query="SELECT * FROM posts ORDER BY post_id DESC ";
    $query1="SELECT * FROM posts ORDER BY post_id DESC  LIMIT $page_1, $per_page";

}else{
    $query="SELECT * FROM posts where post_status='published' ORDER BY post_id DESC ";
    $query1="SELECT * FROM posts where post_status='published' ORDER BY post_id DESC LIMIT $page_1, $per_page";

}

    
        
   

                
                $select_all_posts_query=mysqli_query($connection, $query);

                $post_count=mysqli_num_rows($select_all_posts_query);
                $post_count=ceil($post_count/5);
                if($post_count<1){
                    echo"<h1 class='text-center'>No Content</h1>";
                } else{





                $select_all_posts_query=mysqli_query($connection, $query1);
                
               
                while($row=mysqli_fetch_assoc($select_all_posts_query)){
                    //print_r( krsort($row));
               // print_r($row) ;
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_user'];
                    $post_date=$row['post_date'];
                    $post_image=$row['post_image'];
                    $post_status=$row['post_status'];
                    $post_content=substr($row['post_content'],0,100);



                    //select username from users
                    $query="SELECT username FROM users WHERE user_id='{$post_author}' ";
                    $select_username_query=mysqli_query($connection, $query);
                    $row=mysqli_fetch_assoc($select_username_query);
                    $username=$row['username'];



                  

                     

                    
                 
                    

?>


                    

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?source=<?php echo $post_id ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="post_author.php?post_author=<?php echo  $post_author ?>"><?php echo  $username ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo "Posted on {$post_date}"  ?> </p>
                <hr>
                <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
                <a href="post.php?source=<?php echo $post_id ?>"> <img class="img-responsive" src="images/<?php echo $post_image ?>" alt=""></a>

                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?source=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>



<?php  } } ?>

   
                

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
        <ul class="pager">
            <li>
                 <?php
                for($x=1; $x<=$post_count; $x++){
                    if($x==$page){
                        echo"<a style='background:#000' href='index.php?page={$x}'>{$x}</a>";
                    }else{
                        echo"<a href='index.php?page={$x}'>{$x}</a>";
                    }
               
            }
            ?> 
            </li>
        </ul>

       <?php include("includes/footer.php"); ?>
