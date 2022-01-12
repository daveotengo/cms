<!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script> -->
<!-- <script src="js/assets/jquery-datatables-editable/jquery.dataTables.js"></script> 
    <script src="js/assets/datatables/dataTables.bootstrap.js"></script>
    <script src="js/assets/jquery-datatables-editable/datatables.editable.init.js"></script> -->
  
    <script src="js\jquery.dataTables.js"></script>


            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">CMS Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
            <li><a href="../index.php">Index</a></li>
            <li>  <a>Users Online: <span class="usersonline" ></span><?php ?> </a> </li>             
       
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> 
                    <?php   
                            

                            if(isset($_SESSION['username'])){

                                echo $_SESSION['first_name']." ".$_SESSION['last_name'];
                            }else{
                                echo "Author";
                            }

                            ?>
                    
                    <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        
                        <li class="divider"></li>
                        <li>
                            <a href="../includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>