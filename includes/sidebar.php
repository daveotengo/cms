
            <div class="col-md-4">




                <!-- Blog Search Well -->




                <div class="well">
                    <h4>Blog Search</h4>
                    <form method="post" action="search.php">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <?php $a=2; ?>


                <div class="well">

                <?php if(isset($_SESSION['user_role'])): ?>
<h4>Logged in as <?php echo $_SESSION['username'] ?></h4>
<a href="includes/logout.php" class="btn btn-primary">Logout</a>
<?php else: ?>
<h4>Login</h4>
                    <form method="post" action="includes/login.php">
                    <div class="form-group">
                    <input name="username" class="form-control" placeholder="Enter Username" type="text" class="form-control">
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" placeholder="Enter Password" class="form-control">
                        <span class="input-group-btn">
                            <input type="submit" name="submit" class="btn btn-primary" value="Submit" />
                               
                        
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
<?php endif; ?>
                    
                </div>




                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                               
                               

                                <?php 
    $query="SELECT * FROM categories";
    $select_all_categories_query_sidebar=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_all_categories_query_sidebar)){
        $cat_title=$row['cat_title'];
        $cat_id=$row['cat_id'];
        echo " <li><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";
        }
?>
               
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <!-- <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li> -->
                            </ul>
                        </div>