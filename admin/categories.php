
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
                        
                    </div>

                    <div class="col-xs-6">

                <?php

                add_category();

                ?>








            <form action="categories.php" method="post">

            <div class="form-group">
                <label for="cat_title">Add category title</label>
            <input type="text" class="form-control" name="cat_title" id="">
            </div>
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="submit" value="add category">
            </div>
            </form>






            <?php

            //select upadte category
            if(isset($_GET['edit'])){

            $cat_id=$_GET['edit'];

            $query="SELECT * from categories WHERE cat_id='{$cat_id}'";
            $select_categories_query=mysqli_query($connection, $query);

            if(!$select_categories_query){
                die("problem with select category query ".mysqli_error($connection));
            }

            while($row=mysqli_fetch_assoc($select_categories_query)){

            $cat_title=$row['cat_title'];

            ?>

            <form action="categories.php" method="post">

            <div class="form-group">
            <input type="hidden" class="form-control" name="cat_id" id="" value=<?php echo $cat_id?> >
                <label for="cat_title">Edit category title</label>
            <input type="text" class="form-control" name="cat_title" id="" value=<?php echo $cat_title ?> >
            </div>
            <div class="form-group">
            <input  type="submit" class="btn btn-primary" name="update" value="update category">
            </div>
            </form>

            <?php


                }

                }


            ?>



            <?php


            //update category
            update_category();
            ?>



    </div>


                    





                    <div class="col-xs-6">
                    <table id="myTable" class="table table-bordered table-hover table-responsive">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category title</th>
                                    <th>Action Delete</th>
                                    <th>Action Edit</th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                <?php 
            //find all category
            find_all_category();

                ?>
                               
                            </tbody>
                        </table>
                    </div>
                    
                    
                    <?php

            //delete category
            delete_category();

            
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
    <script>
    $(document).ready(function(){
    
var url="categories.php";
var data="delete_cat_id=";
del(url,data);

    
});
</script>

<script>
$(document).ready( function () {
    var table=$('#myTable').DataTable();
   table
    .order( [ 0, 'desc' ] )
    .draw();
} );
</script>