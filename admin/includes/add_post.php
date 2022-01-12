
<?php
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
    $query="SELECT user_id FROM users WHERE username='{$username}' ";
    $select_user_id_query=mysqli_query($connection, $query);
    $row=mysqli_fetch_assoc($select_user_id_query);
    $user_id=$row['user_id'];

}

?>

                
<form action="post.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="post_title">Post title</label>
            <input type="text" class="form-control" name="post_title" id="">
            </div>
            <div class="form-group">
                <label for="post_user">Post Author</label>
            <input type="text" class="form-control"  id="" readonly value="<?php echo $username; ?>"  />
            <input type="hidden" class="form-control" name="post_user" value="<?php echo $user_id; ?>"  >
            </div>
            <div class="form-group">
                <label for="post_category_id">Post Category</label>
            <!-- <input type="text" class="form-control" name="post_category_id" id="">  -->
            <select class="form-control" name='post_category_id'>
            <option   >-- Select Category -- </option>
        <?php

            function find_all_category_post(){
                global $connection;

                $query="SELECT * FROM categories";
                $select_all_categories_query=mysqli_query($connection, $query);

                while($row=mysqli_fetch_assoc($select_all_categories_query)){
                    $cat_id=$row['cat_id'];
                    $cat_title=$row['cat_title'];
                    echo "<option value='{$cat_id}'  >$cat_title </option>";
                }

            }

            find_all_category_post();
        ?>
        <select>
            </div>
            <div class="form-group">
                <label for="post_status">Post Satus</label>
            <!-- <input type="text" class="form-control" name="post_status" id=""> -->
            <select name="post_status" class="form-control" >
            <option   >-- Select Post Status -- </option>
                <option value=draft>draft</option>
                <option value=published>published</option>

            </select>
            </div>
            <div class="form-group">
                <label for="post_image">Post Image</label>
           <input type="file" class="form-control" name="post_image" id=""> 
           
            </div>
            <div class="form-group">
                <label for="post_tags">Post Tags</label>
            <input type="text" class="form-control" name="post_tags" id="">
            </div>
            <div class="form-group">
                <label for="post_content">Post Content</label>
            <textarea class="form-control" name="post_content" id="">
            </textarea>
            </div>
            <!-- <div class="form-group">
                <label for="post_comment_count">Post Comment Count</label>
            <input type="text" class="form-control" name="post_comment_count" id="">
            </div> -->
            <!-- <div class="form-group">
                <label for="post_date">Post Date</label>
            <input type="text" class="form-control" name="post_date" id="">
            </div> -->
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="submit" value="add post">
            </div>
            </form>