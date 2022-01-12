
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
                        <?php

            //select upadte user
            if(isset($_SESSION['username'])){

                $username=$_SESSION['username'];

            }

            $query="SELECT * from users WHERE username='{$username}'";
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
           
                         

            ?>


<form action="user.php" method="post" enctype="multipart/form-data">

            <input type="hidden" class="form-control" name="user_id" value=<?php echo $user_id; ?>  id="">
            <div class="form-group">
                <label for="cat_title">User Name</label>
            <input type="text" class="form-control" required name="username" value=<?php echo $username; ?>  id="">
            </div>
            <div class="form-group">
                <label for="user_password">Password</label>
            <input type="password" class="form-control" required name="user_password" value=<?php echo $user_password; ?>   id="">
            </div>


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

                //}



            }
            ?>
                    </div>

              












            


            <?php


            //update user
            if(isset($_POST['update'])){
            
                    $user_id=$_POST['user_id'];
                    $username=$_POST['username'];
                    $user_password=$_POST['user_password'];
                    $user_firstname=$_POST['user_firstname'];
                    $user_lastname=$_POST['user_lastname'];
                    $user_email=$_POST['user_email'];
                    $user_image= $_FILES['user_image']['name'];
                    $user_image_temp=$_FILES['user_image']['tmp_name'];
                    $user_role=$_POST['user_role'];
                    
                    move_uploaded_file($user_image_temp, "../images/$user_image");
        
        
        
                    if( $username==""||empty($username)||$user_password==""||empty($user_password)||$user_firstname==""||empty($user_firstname)||$user_lastname==""||empty($user_lastname)||$user_email==""||empty($user_email)||$user_image==""||empty($user_image)||$user_role==""||empty($user_role)){
                        echo "one of the fields is empty so check and fill it";
                
                    }else{
            
                    $query="UPDATE users SET username='{$username}',user_password='{$user_password}',user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',user_image='{$user_image}',user_role='{$user_role}'   WHERE user_id={$user_id}";
                        $update_user_query=mysqli_query($connection, $query);
                        
                        if(!$update_user_query){
                            die("problem with update user query".mysqli_error($connection));
                        }
            
                    }

                    header("Location:profile.php");
                }
           
                    
                    
                    
                   

            
            
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
    