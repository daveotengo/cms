 <?php include("db.php"); ?> 

    <!-- Navigation -->
    
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

       session_start();
      unset($_SESSION['username']);
      unset($_SESSION['first_name']);
      unset($_SESSION['last_name']);
      unset($_SESSION['user_role']);
    
       
      
    
 
       header("Location:../index.php");
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

           
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

     
