




                    <div class= "row">
                    <div class="col-lg-12">
                    <div style="overflow-x:auto;">
                    <table id="myTable" class="table table-bordered table-hover table-responsive">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>User Name</th>
                                
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Image</th>
                                <th>Role</th>
                                <th>Admin</th>
                                <th>Subscriber</th>                              
                                <th>Action Delete</th>
                                <th>Action Edit</th>
                               
                            </tr>
                        </thead>
                        <tbody>

            <?php 
        //find all users
        find_all_users();

            ?>



                           
                        </tbody>
                    </table>

                    <script>
    $(document).ready(function(){
    
var url="user.php";
var data="delete_user_id=";
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