




                    <?php
if(isset($_POST['apply'])){
    foreach($_POST['checkBoxArray'] as $checkboxValue){
       // echo $checkboxValue;

      $bulkOptions= $_POST['bulkOptions'];

      switch($bulkOptions){
          case 'publish':
          $query="UPDATE posts SET post_status='published' WHERE post_id=$checkboxValue";
          mysqli_query($connection, $query);
          break;

          case 'draft':
          $query="UPDATE posts SET post_status='draft' WHERE post_id=$checkboxValue";
          mysqli_query($connection, $query);
          break;

          case 'delete':
          $query="DELETE from posts WHERE post_id='{$checkboxValue}'";
          
          mysqli_query($connection, $query);
          break;

          case 'clone':
          $query="SELECT * FROM posts WHERE post_id='{$checkboxValue}'";
          $select_all_posts_query=mysqli_query($connection, $query);
      
          while($row=mysqli_fetch_assoc($select_all_posts_query)){
          $post_id=$row['post_id'];
          $post_user=$row['post_user'];
          $post_title=$row['post_title'];
          $post_category_id=$row['post_category_id'];
          $post_status=$row['post_status'];
          $post_image=$row['post_image'];
          $post_content=$row['post_content'];
          $post_tags=$row['post_tags'];
          $post_comment_count=$row['post_comment_count'];
          $post_date=$row['post_date'];
         


         

          $query="INSERT INTO posts(post_user,post_title,post_category_id,post_status,post_content,post_image,post_tags,post_date) VALUES('{$post_user}','{$post_title}',{$post_category_id},'{$post_status}','{$post_content}','{$post_image}','{$post_tags}',now())";
          $add_post_query=mysqli_query($connection, $query);
          $post_id= mysqli_insert_id($connection);
          echo "<pa class='bg-success'>Post Added <a href='../post.php?source=$post_id'>View edited post</a> or <a href='post.php?source=add_post'>Add post</a></pa>";
          
          if(!$add_post_query){
              die("problem with add post query".mysqli_error($connection));
          }
          
         
          break;
        }
      }
    }
}
?>
 <div class= "row">
                    <div class="col-lg-12">
                    <div style="overflow-x:auto;">
                   
                        
                    <form action="" method=post>
                    <div id=bulkOptionsContainer style="margin-left:2%" class="col-lg-4">
                        <select class="form-control" name="bulkOptions">
                            <option value="">Select Options</option>
                            <option value=published>Publish</option>
                            <option value=draft>Draft</option>
                            <option value=delete>Delete</option>
                            <option value=clone>Clone</option>
                            
                        </select>
                        
                    </div>
                    <div class="col-lg-4">
                        <input  type=submit name=apply class="btn btn-success" value='Apply'/>
                        <a href="post.php?source=add_post" class="btn btn-primary" >Add New</a>
                    </div>

                    
                    
                  
                   
                        <table id="myTable" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                            <th><input type=checkbox class=checkbox id=selectAllCheckBoxes  /></th>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Image</th>
                                <th>Tags</th>
                                <th>Comments</th>
                                <th>Post View Count</th>
                                <th>Date</th>
                                <th>View Post</th>
                                <th>Action Delete</th>
                                <th>Action Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>




            <?php 
        //find all posts
      find_all_posts();

            ?>




</form>

                           
                        </tbody>
                    </table>


                    <script>
    $(document).ready(function(){
    
// var part_url="post.php?delete_post_id";
// del(part_url);
var url="post.php";
var data="delete_post_id=";
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