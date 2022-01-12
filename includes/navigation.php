<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Front</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                   
<?php 
    $query="SELECT * FROM categories";
    $select_all_categories_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_all_categories_query)){
        $cat_title=$row['cat_title'];
        $cat_id=$row['cat_id'];

        $category_class='';
        $registration_class='';
        $admin_class='';
        $contact_class='';
        $pageName=basename($_SERVER['PHP_SELF']);

        $registration='registration.php';
        $admin='admin/index.php';
        $contact='contact.php';

        if(isset($_GET['category']) && $_GET['category']==$cat_id){

            $category_class='active';

        }elseif($pageName==$registration){

            $registration_class='active';

        }elseif($pageName==$admin){

            $admin_class='active';

        }elseif($pageName==$contact){
            
            $contact_class='active';

        }

     echo "<li class=$category_class><a href='category.php?category={$cat_id}'>{$cat_title}</a></li>";


        }
?>
 <li  class='<?php echo $admin_class ?>'><a href="admin/index.php">Admin</a></li>
 <li class='<?php echo $registration_class ?>'><a href="registration.php">Registration</a></li>
 <li class='<?php echo  $contact_class ?>'><a href="contact.php">Contact</a></li>

                   
 <?php
 session_start();
if(isset($_SESSION['user_role'])){
  if($_SESSION['user_role']){

if(isset($_GET['source'])){

    $the_post_id=$_GET['source'];

    echo "<li><a href='./admin/post.php?source=edit_post&edit_post_id=$the_post_id'>Edit Current Post</a></li>";

 }
  }
}
 
 ?>
                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>