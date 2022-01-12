<?php

            //select upadte user
            if(isset($_GET['edit_user_id'])){

                $user_id=$_GET['edit_user_id'];

            $query="SELECT * from users WHERE user_id='{$user_id}'";
            $select_users_query=mysqli_query($connection, $query);

            if(!$select_users_query){
            die("problem with select user query ".mysqli_error($connection));
            }

            while($row=mysqli_fetch_assoc($select_users_query)){

                $user_id=$row['user_id'];
                $username=$row['username'];
                $user_password=$row['user_password'];
                $user_firstname=$row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_email=$row['user_email'];
                $user_image=$row['user_image'];
                $user_role=$row['user_role'];
               

              
                            //select upadte category
                           
                
                            // $query="SELECT * from categories WHERE cat_id='{$cat_id}'";
                            // $select_categories_query=mysqli_query($connection, $query);
                
                            // if(!$select_categories_query){
                            // die("problem with select category query ".mysqli_error($connection));
                            // }
                
                            // while($row=mysqli_fetch_assoc($select_categories_query)){
                
                            // $cat_title=$row['cat_title'];
                
                           
                         

            ?>


<form action="user.php" method="post" enctype="multipart/form-data">

            <input type="hidden" class="form-control" name="user_id" value=<?php echo $user_id; ?>  id="">
            <div class="form-group">
                <label for="cat_title">User Name</label>
            <input type="text" class="form-control" required name="username" value="<?php echo $username; ?>"  id="">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
            <input type="password" class="form-control" required name="user_password" value="<?php echo $user_password; ?>" id="">
            </div>
            <!-- <div class="form-group"> -->
                <!-- <label for="user_firstname">First Name</label>
            <select  class="form-control" name='user_firstname'  id=""> -->
                

        <?php

            // function find_all_user(){
            //     global $connection;

            //     $query="SELECT * FROM users";
            //     $select_all_users_query=mysqli_query($connection, $query);

            //     while($row=mysqli_fetch_assoc($select_all_users_query)){
            //     $cat_id=$row['cat_id'];
            //     $cat_title=$row['cat_title'];
            //     echo "<option value='{$cat_id}' >$cat_title </option>";
            //     }

            // }

            // find_all_category_user();
        ?>

                
               
            <!-- </select>
            </div> -->
            <div class="form-group">
                <label for="user_firstname">First Name</label>
            <input type="text" class="form-control" name="user_firstname" value=<?php echo $user_firstname?>  id="">
            </div>
            <div class="form-group">
                <label for="user_lastname">Last Name</label>
            <input type="text" class="form-control" name="user_lastname" value=<?php echo $user_lastname?>  id="">
            </div>
            <div class="form-group">
                <label for="user_email">Email</label>
            <input type="email" class="form-control" name="user_email" value=<?php echo $user_email?>  id="">
            </div>

            <div class="form-group">
                <label for="user_image">user Image</label> 
                <p><img width=100 src='../images/<?php echo $user_image?>' />   </p>  
            <input type="file" class="form-control" name="user_image" value=  id="">
            </div>
            <div class="form-group">
                <label for="user_role">Role</label>
            <!-- <input type="text" class="form-control" name="user_role" value=<?php echo $user_role?>  id=""> -->
            <select class="form-control" name="user_role">
            <?php echo" <option>{$user_role}<option>";
            
            if($user_role=='admin'){
                echo" <option value=subscriber>Subscriber<option>";
            }else{
                echo" <option value=admin>Admin<option>";
            }
            
            ?>

            </select>
            </div>
            
          
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="update" value="update user">
            </div>
            </form>


            <?php
                            

              //  }

                }

            }else{
                header("Location:index.php");
            }
            ?>