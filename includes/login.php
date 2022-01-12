 <?php include("db.php"); ?> 
 <?php include("../admin/includes/functions.php"); ?> 

    <!-- Navigation -->
    
    

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

            <?php

       session_start();
    

  if(isset($_POST['submit'])){
   

        $username=$_POST['username'];
        $password=$_POST['password'];

        login($username, $password);
           
       
            
        

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

           
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
              
                

            </div>

        </div>
        <!-- /.row -->

        <hr>

     
