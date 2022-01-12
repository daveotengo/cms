
<?php include("includes/header.php");  ?>


<link type="text/css" rel="stylesheet" href="css/style.css" />
        
    <script src="js/script.js"></script>


   


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
                            <small>
                             <?php   
                          

                            if(isset($_SESSION['username'])){

                                echo $_SESSION['username'];
                            }else{
                                echo "Author";
                            }

                            ?>


                            </small>
                        </h1>
                        
                    </div>

                           
                <!-- /.row -->
                
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                  <div class='huge'>
<?php
 function count_all_posts(){


    global $connection;

    $query="SELECT * FROM posts ";
    $select_all_posts_query=mysqli_query($connection, $query);

    $post_count=mysqli_num_rows($select_all_posts_query);
    $post_count;
    return  $post_count;
 
            
    

}
echo count_all_posts();
?>
                  </div>
                        <div>Posts</div>
                    </div>
                </div>
            </div>
            <a href="post.php?source=view_all_post">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                     <div class='huge'>


                     <?php
function count_all_comments(){

    global $connection;

    $query="SELECT * FROM comments ";
    $select_all_comments_query=mysqli_query($connection, $query);

   $comment_count=mysqli_num_rows($select_all_comments_query);
   
    return $comment_count;
            
    

}
echo count_all_comments();
?>
                     </div>
                      <div>Comments</div>
                    </div>
                </div>
            </div>
            <a href="comment.php?source=view_all_post">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                    <div class='huge'>

<?php

    function count_all_users(){

        global $connection;

        $query="SELECT * FROM users ";
        $select_all_users_query=mysqli_query($connection, $query);

        $user_count=mysqli_num_rows($select_all_users_query);
       
        return   $user_count;

    }
    echo   count_all_users();

?>
                    </div>
                        <div> Users</div>
                    </div>
                </div>
            </div>
            <a href="user.php?source=view_all_post">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-list fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class='huge'>


                        <?php
function count_all_categories(){

    global $connection;

    $query="SELECT * FROM categories ";
    $select_all_categories_query=mysqli_query($connection, $query);

     $category_count=mysqli_num_rows($select_all_categories_query);
  
 
    return  $category_count;
    

}
echo count_all_categories();
?>
                        </div>
                         <div>Categories</div>
                    </div>
                </div>
            </div>
            <a href="categories.php?source=view_all_post">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>

<?php
                  function count_draft_posts(){
    global $connection;

    $query="SELECT * FROM posts WHERE post_status='draft' ";
    $select_draft_posts_query=mysqli_query($connection, $query);

    $post_draft_count=mysqli_num_rows($select_draft_posts_query);
   
 
    return  $post_draft_count;
    

}
count_draft_posts();

function count_unapproved_comments(){
    global $connection;

    $query="SELECT * FROM comments WHERE comment_status='unapproved' ";
    $select_unapproved_comment_query=mysqli_query($connection, $query);

    $unapproved_comment_count=mysqli_num_rows($select_unapproved_comment_query);
   
    return   $unapproved_comment_count;
            
   

}
count_unapproved_comments();




function count_approved_comments(){
    global $connection;

    $query="SELECT * FROM comments WHERE comment_status='approved' ";
    $select_approved_comment_query=mysqli_query($connection, $query);

    $approved_comment_count=mysqli_num_rows($select_approved_comment_query);
   
    return   $approved_comment_count;
            
   

}
count_approved_comments();



function user_role_subscriber(){
    global $connection;

    $query="SELECT * FROM users WHERE user_role='subscriber' ";
    $select_user_subscriber_query=mysqli_query($connection, $query);

    $user_subscriber_count=mysqli_num_rows($select_user_subscriber_query);

   return  $user_subscriber_count;

}



user_role_subscriber();

function user_role_admin(){
    global $connection;

    $query="SELECT * FROM users WHERE user_role='admin' ";
    $select_admin_subscriber_query=mysqli_query($connection, $query);

    $user_admin_count=mysqli_num_rows($select_admin_subscriber_query);

   return  $user_admin_count;

}



user_role_admin();


function count_publish_posts(){
    global $connection;

    $query="SELECT * FROM posts WHERE post_status='published' ";
    $select_publish_posts_query=mysqli_query($connection, $query);

    $post_publish_count=mysqli_num_rows($select_publish_posts_query);

    return $post_publish_count;

}



count_publish_posts();




?>


 <?php
 
   
          $element_text=['All Posts','Active Posts','Draft Posts','Comments','Approved Comments','pending Comments','Categories','Users','Admin','Subscribers'];
         $element_count=[count_all_posts(),count_publish_posts(),count_draft_posts(),count_approved_comments(),count_all_comments(),count_unapproved_comments(),count_all_categories(), count_all_users(),user_role_admin(),user_role_subscriber()];

        
?>  


 
 <?php


  
     ?>

  <!-- BAR Chart -->
     
                                  
                              

      <!-- <li><div data-percentage="33" class="bar"></div><span>Option 2</span></li>
        <li><div data-percentage="54" class="bar"></div><span>Option 3</span></li>
        <li><div data-percentage="94" class="bar"></div><span>Option 4</span></li>
        <li><div data-percentage="44" class="bar"></div><span>Option 5</span></li>
        <li><div data-percentage="23" class="bar"></div><span>Option 6</span></li>  -->
      </ul> 
      <?php 
        $dataPoints = array();
        for($x=0;$x<sizeof($element_count);$x++){
            
            $point = array("label" => $element_text[$x], "y" => $element_count[$x]);
            array_push($dataPoints , $point); 
            //echo json_encode($dataPoints , JSON_NUMERIC_CHECK); 

        
       
        ?>
   
   <?php
        }
?>
  <div class="col-lg-6">
      
      
  



  
 <script>

 var dataPoints=<?php echo json_encode($dataPoints , JSON_NUMERIC_CHECK)?>;
 //alert(dataPoints);
 
    //alert(dataPoints[i]);

 window.onload = function () {
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     zoomEnabled:true,
     exportEnabled: true,
     theme: "light1", // "light1", "light2", "dark1", "dark2"
     title:{
         text: "General Information"
     },
     data: [{
         type: "column", //change type to bar, line, area, pie, etc
         indexLabel: "{y}", //Shows y value on all Data Points
         indexLabelFontColor: "#5A5757",
         indexLabelPlacement: "outside",   
         dataPoints: dataPoints
     }]
 });
 chart.render();
  
 }

 </script>
  
     
    </div>
   



    



                           

                
                <!-- /.row -->

            </div>

             <div id="chartContainer" style="height: 300px; width: 100%;"></div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    

   
    <?php include("includes/footer.php");  ?>

   
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/jquery.canvasjs.min.js"></script>