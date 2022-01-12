<?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $query="SELECT user_id FROM users WHERE username='{$username}' ";
    $select_user_id_query=mysqli_query($connection, $query);
    $row=mysqli_fetch_assoc($select_user_id_query);
    $user_id=$row['user_id'];

}

?>
<?php

            //select upadte post
            if(isset($_GET['edit_post_id'])){

                $post_id=$_GET['edit_post_id'];

            $query="SELECT * from posts WHERE post_id='{$post_id}'";
            $select_posts_query=mysqli_query($connection, $query);

            if(!$select_posts_query){
            die("problem with select post query ".mysqli_error($connection));
            }

            while($row=mysqli_fetch_assoc($select_posts_query)){

                $post_id=$row['post_id'];
                $post_author=$row['post_user'];
                $post_title=$row['post_title'];
                $post_category_id=$row['post_category_id'];
                $post_status=$row['post_status'];
                $post_image=$row['post_image'];
                $post_tags=$row['post_tags'];
                $post_content=$row['post_content'];
               // $post_comment_count=$row['post_comment_count'];
                $post_date=$row['post_date'];


               
                
                            //select upadte category
                           
                
                            // $query="SELECT * from categories WHERE cat_id='{$cat_id}'";
                            // $select_categories_query=mysqli_query($connection, $query);
                
                            // if(!$select_categories_query){
                            // die("problem with select category query ".mysqli_error($connection));
                            // }
                
                            // while($row=mysqli_fetch_assoc($select_categories_query)){
                
                            // $cat_title=$row['cat_title'];
                
                           
                         

            ?>


<form action="post.php" method="post" enctype="multipart/form-data">

            <input type="hidden" class="form-control" name="post_id" value=<?php echo $post_id?>  id="">
            <div class="form-group">
                <label for="cat_title">Post title</label>
            <input type="text" class="form-control" name="post_title" value=<?php echo $post_title?>  id="">
            </div>
            <div class="form-group">
                <label for="post_author">Post Author</label>
            <input type="text" class="form-control" readonly value=<?php echo $username?>  id="">
            <input type="hidden" class="form-control" name="post_user" value="<?php echo $user_id; ?>"  />
            </div>
            <div class="form-group">
                <label for="post_category_id">Post Category Id</label>
            <select  class="form-control" name='post_category_id'  id="">
            
                <?php 
             $post_category_id ;
            $query1="SELECT * FROM categories WHERE cat_id=$post_category_id ";
             $select_one_category_query=mysqli_query($connection, $query1);
           
             while($row=mysqli_fetch_assoc( $select_one_category_query)){
                $cat_id=$row['cat_id'];
                $cat_title=$row['cat_title'];
                echo "<option value='{$cat_id}' >$cat_title </option>";
             }
            ?>  

        <?php

           
                

                $query="SELECT * FROM categories";
                $query1="SELECT * FROM categories WHERE cat_id=$post_category_id ";
                $select_one_category_query=mysqli_query($connection, $query1);
                $select_all_categories_query=mysqli_query($connection, $query);

                while($row=mysqli_fetch_assoc($select_all_categories_query)){

                    $cat_id=$row['cat_id'];
                    $cat_title=$row['cat_title'];
                    if($row['cat_id'] == $post_category_id){
            
                    continue;
                   
                    }
                    echo "<option value='{$cat_id}' >$cat_title </option>";
            
                }
                
           
        ?>

                
               
            </select>
            </div>
            <div class="form-group">
                <label for="post_status">Post Satus</label>
            <!-- <input type="text" class="form-control" name="post_status" value=<?php echo $post_status?>  id=""> -->
            <select name="post_status" class="form-control" >

                <option value=draft><?php echo $post_status ?></option>
                <?php
                if($post_status=="draft"){
                  echo " <option value=published>published</option> ";
                }elseif($post_status=="published"){
                    echo "<option value=draft>draft</option> ";
                }
                ?>
                
               

            </select>
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label> 
                <p><img width=100 src='../images/<?php echo $post_image?>' />   </p>  
            <input type="file" class="form-control" name="post_image" value=  id="">
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" value=<?php echo $post_tags?>  id="">
            </div>
            <div class="form-group">
                <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content"   id=""><?php echo str_replace('\r\n','</ Br>',$post_content) ?>
            </textarea>
            </div>
            <!-- <div class="form-group">
                <label for="post_comment_count">Post Comment Count</label>
            <input type="text" class="form-control" name="post_comment_count" value=<?php echo $post_comment_count?>  id="">
            </div> -->
            <!-- <div class="form-group">
                <label for="post_date">Post Date</label>
            <input type="text" class="form-control" name="post_date" value=<?php echo $post_date?>  id="">
            </div> -->
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="update" value="update post">
            </div>
            </form>


            <?php
                            

              //  }

                }

            }
            ?>