



 <div class= "row">
                    <div class="col-lg-12">
                    <div style="overflow-x:auto;">
                    
                    <table id="myTable" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Coment Id</th>
                                <th>Author</th>
                                <th>In Response to</th>
                                <th>Comment Status</th>
                                <th>Content</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Approve</th>
                                <th>Unapprove</th>
                                <th>Action Delete</th>
                              
                               
                            </tr>
                        </thead>
                        <tbody>

            <?php 
        //find all comments
        find_all_comment();

            ?>



                           
                        </tbody>
                    </table>

                    <script>
    $(document).ready(function(){
    
// var part_url="post.php?delete_post_id";
// del(part_url);
var url="comment.php";
var data="delete_comment_id=";
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