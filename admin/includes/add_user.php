
<?php

                add_user();


                

                ?>

<form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label for="username">User Name</label>
            <input type="text" class="form-control" name="username" id="">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
            <input type="password" class="form-control" name="user_password" id="">
            </div>
            <!-- <div class="form-group"> -->
                <!-- <label for="post_category_id">Post Category Id</label> -->
            <!-- <input type="text" class="form-control" name="post_category_id" id="">  -->
            <!-- <select class="form-control" name='post_category_id'> -->
        <?php

            // function find_all_category_post(){
            //     global $connection;

            //     $query="SELECT * FROM categories";
            //     $select_all_categories_query=mysqli_query($connection, $query);

            //     while($row=mysqli_fetch_assoc($select_all_categories_query)){
            //     $cat_id=$row['cat_id'];
            //     $cat_title=$row['cat_title'];
            //     echo "<option value='{$cat_id}'  >$cat_title </option>";
            //     }

            // }

            // find_all_category_post();
        ?>


        <!-- <select> -->
            <!-- </div> -->
            <div class="form-group">
                <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname" id="">
            </div>
            <div class="form-group">
                <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" id="">
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
            <input type="text" class="form-control" name="user_email" id="">
            </div>
            <div class="form-group">
                <label for="user_image">Image</label>
            <input type="file" class="form-control" name="user_image" id="">
            </div>
            <div class="form-group">
                <label for="user_role">Role</label>
            <input type=text class="form-control" name="user_role" id="">
            </input>
            </div>
            <!-- <div class="form-group">
                <label for="post_comment_count">Post Comment Count</label>
            <input type="text" class="form-control" name="randsalt" id="">
            </div> -->
            <!-- <div class="form-group">
                <label for="post_date">Post Date</label>
            <input type="text" class="form-control" name="post_date" id="">
            </div> -->
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="submit" value="add user">
            </div>
            </form>