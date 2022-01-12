<?php


function redirect($location){

   header("Location:".$location);

 }
    

function add_category(){


    global $connection;
    if(isset($_POST['submit'])){
        
            $cat_title= $_POST['cat_title'];
            if($cat_title==""||empty($cat_title)){
                echo "category title should not be empty";
        
            }else{
        
                $query="INSERT INTO categories(cat_title) VALUES('{$cat_title}')";
                $add_category_query=mysqli_query($connection, $query);
                
                if(!$add_category_query){
                    die("problem with add category query".mysqli_error($connection));
                }
        
            }
        }
}

function update_category(){
    global $connection;

    if(isset($_POST['update'])){

        $cat_title= $_POST['cat_title'];
        $cat_id= $_POST['cat_id'];
        if($cat_title==""||empty($cat_title)){
            echo "category title should not be empty";

        }else{

        $query="UPDATE categories SET cat_title='{$cat_title}' WHERE cat_id={$cat_id}";
            $update_category_query=mysqli_query($connection, $query);
            
            if(!$update_category_query){
                die("problem with add category query".mysqli_error($connection));
            }

        }
    }

}


function find_all_category(){
    global $connection;

    $query="SELECT * FROM categories order by cat_id desc";
    $select_all_categories_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_all_categories_query)){
    $cat_id=$row['cat_id'];
    $cat_title=$row['cat_title'];
    echo " 
    <tr><td>{$cat_id}</td>".
    "<td>{$cat_title}</td>".
    //"<td><a onClick=\"javascript: return confirm('Are you sure your want to delete record')\" href='categories.php?delete_cat_id={$cat_id}'>Delete</a></td>".
    "<td><a class='delete_link' rel='$cat_id' href='javascript:void(0)'>Delete</a></td>".
    "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>".

    "</tr>";
    }

}

function delete_category(){
    global $connection;
    if(isset($_SESSION['user_role'])){
        if($_SESSION['user_role']=="admin"){
    if(isset($_POST['delete_cat_id'])){
        
        $cat_id=$_POST['delete_cat_id'];
        $cat_id=mysqli_real_escape_string($connection,$cat_id);
        $query="DELETE from categories WHERE cat_id='{$cat_id}'";
        $delete_categories_query=mysqli_query($connection, $query);

        if(!$delete_categories_query){
            die("problem with deleting query ".mysqli_error($connection));
        }

        header("Location:categories.php");

    }
}
    }

}







function find_category_by_id(){
    global $connection;


   

    

}

  

function find_all_posts(){
    global $connection;

    $query="SELECT * FROM cms.posts order by post_id desc";
    $select_all_posts_query=mysqli_query($connection, $query);

    while($row=mysqli_fetch_assoc($select_all_posts_query)){
    $post_id=$row['post_id'];
    $post_user=$row['post_user'];
    $post_title=$row['post_title'];
    $post_category_id=$row['post_category_id'];
    $post_status=$row['post_status'];
    $post_image=$row['post_image'];
    $post_tags=$row['post_tags'];
    //$post_comment_count=$row['post_comment_count'];
    $post_view_count=$row['post_view_count'];
    $post_date=$row['post_date'];



    //select username from users
    $query="SELECT username FROM users WHERE user_id='{$post_user}' ";
    $select_username_query=mysqli_query($connection, $query);
    $row=mysqli_fetch_assoc($select_username_query);
    $username=$row['username'];


                //select category by id to display category title
                
                $cat_id=$post_category_id;
    
                $query="SELECT * from categories WHERE cat_id='{$cat_id}'";
                $select_categories_query=mysqli_query($connection, $query);
    
                if(!$select_categories_query){
                die("problem with select category query ".mysqli_error($connection));
                }
    
                while($row=mysqli_fetch_assoc($select_categories_query)){
    
                $cat_title=$row['cat_title'];

                //end select category by id to display category title one bracket below
  
                $query="SELECT * FROM comments WHERE comment_post_id=$post_id";
                $select_all_comments_query=mysqli_query($connection, $query);
                $row=mysqli_fetch_array($select_all_comments_query);
                $comment_id=$row['comment_id'];
                $comment_count=mysqli_num_rows($select_all_comments_query);
            

    echo " 
    <tr>".
    "<th><input type=checkbox class=checkbox name=checkBoxArray[] id=selectCheckBox value= $post_id />  </th>".
    "<th scope='row'>{$post_id}</th>".
    "<td>{$username}</td>".
    "<td>{$post_title}</td>".
    "<td>{$cat_title}</td>".
    "<td>{$post_status}</td>".
    "<td><img width='100' src='../images/{$post_image}' /></td>".
    "<td>{$post_tags}</td>".
    "<td><a href='post_comment.php?pid={$post_id}'>{$comment_count}</a></td>".
    "<td><a href='post.php?reset={$post_id}'>{$post_view_count}</a></td>".
    "<td>{$post_date}</td>".
    "<td><a href='../post.php?source={$post_id}'>View Post</a></td>".
    // "<td><a onClick=\"javascript: return confirm('Are you sure your want to delete record')\" href='post.php?source=delete_post&delete_post_id={$post_id}'>Delete</a></td>".
    "<td><a class='delete_link' rel='$post_id' href='javascript:void(0)'>Delete</a></td>".
    "<td><a  href='post.php?source=edit_post&edit_post_id={$post_id}'>Edit</a></td>".
    "</tr>";
                }
            
    }

}


function add_post(){
    
    
        global $connection;
        if(isset($_POST['submit'])){

           
            $post_user=$_POST['post_user'];
            $post_title=$_POST['post_title'];
            $post_category_id=$_POST['post_category_id'];
            $post_status= $_POST['post_status'];
            $post_image= $_FILES['post_image']['name'];
            $post_image_temp=$_FILES['post_image']['tmp_name'];
            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];
            //$post_comment_count=$_POST['post_comment_count'];
            $post_date= date('d-m-y');

            move_uploaded_file($post_image_temp, "../images/$post_image");

                if( $post_user==""||empty($post_user)||$post_title==""||empty($post_title)||$post_category_id==""||empty($post_category_id)||$post_status==""||empty($post_status)||$post_content==""||empty($post_content)||$post_image==""||empty($post_image)||$post_tags==""||empty($post_tags)||$post_date==""||empty($post_date)){
                    echo "one of the fields is empty so check and fill it";
            
                }else{
            
                    $query="INSERT INTO posts(post_user,post_title,post_category_id,post_status,post_content,post_image,post_tags,post_date) VALUES('{$post_user}','{$post_title}',{$post_category_id},'{$post_status}','{$post_content}','{$post_image}','{$post_tags}',now())";
                    $add_post_query=mysqli_query($connection, $query);
                    $post_id= mysqli_insert_id($connection);
                    echo "<pa class='bg-success'>Post Added <a href='../post.php?source=$post_id'>View added post</a> or <a href='post.php?source=add_post'>Add post</a></pa>";
                    
                    if(!$add_post_query){
                        die("problem with add post query".mysqli_error($connection));
                    }
            
                }
            }
    }



    function update_post(){
        global $connection;
    
        if(isset($_POST['update'])){
    
            $post_id=$_POST['post_id'];
            $post_user=$_POST['post_user'];
            $post_title=$_POST['post_title'];
            $post_category_id=$_POST['post_category_id'];
            $post_status=$_POST['post_status'];
            $post_image= $_FILES['post_image']['name'];
            $post_image_temp=$_FILES['post_image']['tmp_name'];
            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];
            //$post_comment_count=$_POST['post_comment_count'];
            $post_date= date('d-m-y');
            
            move_uploaded_file($post_image_temp, "../images/$post_image");



            if( $post_user==""||empty($post_user)||$post_title==""||empty($post_title)||$post_category_id==""||empty($post_category_id)||$post_status==""||empty($post_status)||$post_content==""||empty($post_content)||$post_image==""||empty($post_image)||$post_tags==""||empty($post_tags)||$post_date==""||empty($post_date)){
                    echo "<tred style='color:red'>one of the fields is empty so check and fill it</tred>";
    
            }else{
    
            $query="UPDATE posts SET post_user='{$post_user}',post_title='{$post_title}',post_category_id='{$post_category_id}',post_status='{$post_status}',post_content='{$post_content}',post_image='{$post_image}',post_tags='{$post_tags}',post_date=now()   WHERE post_id={$post_id}";
            $update_post_query=mysqli_query($connection, $query);
            echo "<pa class='bg-success'>Post updated <a href='../post.php?source=$post_id'>View edited post</a> Or <a href='post.php?source=view_all_post'>Edit More Posts</a></pa>";
          
                
                if(!$update_post_query){
                    die("problem with update post query".mysqli_error($connection));
                }
                
    
            }
        }
    
    }




    function delete_post(){
        global $connection;
        if(isset($_SESSION['user_role'])){
            if($_SESSION['user_role']=="admin"){
        if(isset($_POST['delete_post_id'])){
            
            $post_id=$_POST['delete_post_id'];
            $post_id=mysqli_real_escape_string($connection,$post_id);
            $query="DELETE from posts WHERE post_id='{$post_id}'";
            $delete_post_query=mysqli_query($connection, $query);
    
            if(!$delete_post_query){
                die("problem with deleting query ".mysqli_error($connection));
            }
    
            header("Location:post.php");
    
        }
    }
}
    
    }
    



    //-----



    function find_all_comment(){
        global $connection;
    
        $query="SELECT * FROM cms.comments order by comment_id desc";
        $select_all_comments_query=mysqli_query($connection, $query);
    
        while($row=mysqli_fetch_assoc($select_all_comments_query)){
            
            $comment_id=$row['comment_id'];
            $comment_author=$row['comment_author'];
            $comment_post_id=$row['comment_post_id'];
            $comment_status=$row['comment_status'];
            $comment_content=$row['comment_content'];
            $comment_email=$row['comment_email'];
            $comment_date=$row['comment_date'];
    
    
                    //select category by id to display category title
                    
                    $post_id=$comment_post_id;
        
                    $query_post="SELECT * from posts WHERE post_id='{$post_id}' ";
                    $select_posts_query=mysqli_query($connection, $query_post);
        
                    if(!$select_posts_query){
                    die("problem with select post query ".mysqli_error($connection));
                    }
        
                    while($row=mysqli_fetch_assoc($select_posts_query)){
        
                    $post_title=$row['post_title'];
    
                    //end select category by id to display category title one bracket below
      
        
    
        echo " 
        <tr><td>{$comment_id}</td>".
        "<td>{$comment_author}</td>".
        "<td><a href='../post.php?source={$post_id}'>{$post_title}</a></td>".
        "<td>{$comment_status}</td>".
        "<td>{$comment_content}</td>".
        "<td>{$comment_email}</td>".
        "<td>{$comment_date}</td>".
        "<td><a href='comment.php?approve={$comment_id}'>Approve</a></td>".
        "<td><a href='comment.php?unapprove={$comment_id}'>Unapprove</a></td>".
        //"<td><a onClick=\"javascript: return confirm('Are you sure your want to delete record')\" href='comment.php?source=delete_comment&delete_comment_id={$comment_id}'>Delete</a></td>".
        "<td><a class='delete_link' rel='$comment_id' href='javascript:void(0)'>Delete</a></td>".
    
        "</tr>";
                    }
                
        }
    
    }
    
    
  
    // function add_comment(){
        
            
        
    //         global $connection;
    //         if(isset($_POST['submit'])){
    
    
    //             $comment_author=$_POST['comment_author'];
    //             $comment_post_id=$_POST['comment_post_id'];;
    //             $comment_status='unapproved';
    //             $comment_content=$_POST['comment_content'];
    //             $comment_email=$_POST['comment_email'];
    //             $comment_date= date('d-m-y');
                
    
    
    
    //                 if( $comment_author==""||empty($comment_author)||$comment_post_id==""||empty($comment_post_id)||$comment_status==""||empty($comment_status)||$comment_content==""||empty($comment_content)||$comment_email==""||empty($comment_email)||$comment_date==""||empty($comment_date)){
    //                     echo "one of the fields is empty so check and fill it";
                
    //                 }else{
    //                     //$query="INSERT INTO posts(post_user,post_title,post_category_id,post_status,post_content,post_image,post_tags,post_comment_count,post_date) VALUES('{$post_user}','{$post_title}',{$post_category_id},'{$post_status}','{$post_content}','{$post_image}','{$post_tags}',{$post_comment_count},now())";
    //                     $query="INSERT INTO comments(comment_author,comment_post_id,comment_status,comment_content,comment_email,comment_date) VALUES('{$comment_author}' ,{$comment_post_id},'{$comment_status}','{$comment_content}','{$comment_email}', now())";
    //                     $add_comment_query=mysqli_query($connection, $query);
                        
    //                     if(!$add_comment_query){
    //                         die("problem with add comment query".mysqli_error($connection));
    //                     }
                
    //                 }
    //             }
    //     }
    
    
    
        function update_comment(){
            global $connection;
        
            if(isset($_POST['update'])){
        
                $comment_id=$_POST['comment_id'];
                $comment_author=$_POST['comment_author'];
                $comment_post_id=$_POST['comment_post_id'];
                $comment_status=$_POST['comment_status'];
                $comment_content=$_POST['comment_content'];
                $comment_email=$_POST['comment_email'];
                $comment_date=$_POST['comment_date'];
                
 
    
    
                    if( $comment_author==""||empty($comment_author)||$comment_post_id==""||empty($comment_post_id)||$comment_status==""||empty($comment_status)||$comment_content==""||empty($comment_content)||$comment_email==""||empty($comment_email)||$comment_date==""||empty($comment_date)){
                        echo "one of the fields is empty so check and fill it";
                
                    }else{
        
                $query="UPDATE comments SET comment_author='{$post_user}',comment_post_id='{$comment_post_id}',comment_status='{$comment_status}',comment_content='{$comment_content}',comment_email='{$comment_email}',comment_date=now()   WHERE comment_id={$comment_id}";
                    $update_comment_query=mysqli_query($connection, $query);
                    
                    if(!$update_comment_query){
                        die("problem with update comment query".mysqli_error($connection));
                    }
        
                }
            }
        
        }
    
    
    
    
        function delete_comment(){
            global $connection;
            if(isset($_SESSION['user_role'])){
                if($_SESSION['user_role']=="admin"){
            if(isset($_POST['delete_comment_id'])){
                
                $comment_id=$_POST['delete_comment_id'];
                $comment_id=mysqli_real_escape_string($connection, $comment_id);
        
                $query="DELETE from comments WHERE comment_id='{$comment_id}'";
                $delete_comment_query=mysqli_query($connection, $query);
        
                if(!$delete_comment_query){
                    die("problem with deleting comment query ".mysqli_error($connection));
                }
        
                header("Location:comment.php");
        
            }
        }
    }
        
        }






        //--------


        function find_all_users(){
            global $connection;
        
            $query="SELECT * FROM users order by user_id desc";
            $select_all_users_query=mysqli_query($connection, $query);
        
            while($row=mysqli_fetch_assoc($select_all_users_query)){
            $user_id=$row['user_id'];
            $username=$row['username'];
           
            $user_firstname=$row['user_firstname'];
            $user_lastname=$row['user_lastname'];
            $user_email=$row['user_email'];
            $user_image=$row['user_image'];
            $user_role=$row['user_role'];
           
            
          
            
        
            echo " 
            <tr><td>{$user_id}</td>".
            "<td>{$username}</td>".
           
            "<td>{$user_firstname}</td>".
            "<td>{$user_lastname}</td>".
            "<td>{$user_email}</td>".
            "<td><img width='100' src='../images/{$user_image}' /></td>".
            "<td>{$user_role}</td>".
            "<td><a href='user.php?admin={$user_id}'>Admin</a></td>".
            "<td><a href='user.php?subscriber={$user_id}'>Subscriber</a></td>".
             //"<td><a onClick=\"javascript: return confirm('Are you sure your want to delete record')\" href='user.php?source=delete_user&delete_user_id={$user_id}'>Delete</a></td>".
            // "<td>".
            //     "<form action='user.php' method='post'>".
            //     "<input type='hidden' name='delete_user_id'  value=$user_id />".
            //     "<input class='' type='submit' value='delete' />".
            //     "</form>".
            // "</td>".
            "<td><a class='delete_link' rel='$user_id' href='javascript:void(0)'>Delete</a></td>".
            "<td><a href='user.php?source=edit_user&edit_user_id={$user_id}'>Edit</a></td>".
        
            "</tr>";
                        }
                    
            
        
        }
        
        
        function add_user(){
            
            
                global $connection;
                if(isset($_POST['submit'])){
                    

                    
                    $username=$_POST['username'];
                    $user_password=$_POST['user_password'];
                    $user_firstname=$_POST['user_firstname'];
                    $user_lastname=$_POST['user_lastname'];
                    $user_email=$_POST['user_email'];
                    $user_image= $_FILES['user_image']['name'];
                    $user_image_temp=$_FILES['user_image']['tmp_name'];
                    $user_role=$_POST['user_role'];
                  
                  
        
                    move_uploaded_file($user_image_temp, "../images/$user_image");
        
                        if( $username==""||empty($username)||$user_password==""||empty($user_password)||$user_firstname==""||empty($user_firstname)||$user_lastname==""||empty($user_lastname)||$user_email==""||empty($user_email)||$user_image==""||empty($user_image)||$user_role==""||empty($user_role)){
                            echo "one of the fields is empty so check and fill it";
                    
                        }else{

                            $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('costs'=> 12));

  //adding new data                  
                            $query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_image,user_role) VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_image}','{$user_role}')";
                            $add_user_query=mysqli_query($connection, $query);
                            
                            if(!$add_user_query){
                                die("problem with add post query".mysqli_error($connection));
                            }

                            echo "<t style='color:green' >User Created </t>"." "."<a href='user.php?source=view_all_user'>View All Users</a>";
                    
                        }
                    }
            }
        
        
        
            function update_user(){
                global $connection;
            
                if(isset($_POST['update'])){
            
                    $user_id=$_POST['user_id'];
                    $username=$_POST['username'];
                    $user_password=$_POST['user_password'];
                    $user_firstname=$_POST['user_firstname'];
                    $user_lastname=$_POST['user_lastname'];
                    $user_email=$_POST['user_email'];
                    $user_image= $_FILES['user_image']['name'];
                    $user_image_temp=$_FILES['user_image']['tmp_name'];
                    $user_role=$_POST['user_role'];
                    
                    move_uploaded_file($user_image_temp, "../images/$user_image");
        
        
        
                   // if( $username==""||empty($username)||$user_password==""||empty($user_password)||$user_firstname==""||empty($user_firstname)||$user_lastname==""||empty($user_lastname)||$user_email==""||empty($user_email)||$user_image==""||empty($user_image)||$user_role==""||empty($user_role)){
                        //echo "one of the fields is empty so check and fill it";
                        
                                if(!empty($user_password)||$user_password!=""){

                                    $query="SELECT user_password FROM users WHERE user_id=$user_id";
                                    $select_user_password_query=mysqli_query($connection, $query);
                                    $row=mysqli_fetch_assoc($select_user_password_query);
                                    $db_user_password=$row['user_password'];



                                    if($db_user_password!=$user_password){
                                        $user_password=password_hash($user_password,PASSWORD_BCRYPT,array('costs'=> 12));
                                    }


                                    $query="UPDATE users SET username='{$username}',user_password='{$user_password}',user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',user_image='{$user_image}',user_role='{$user_role}'   WHERE user_id={$user_id}";
                                    $update_user_query=mysqli_query($connection, $query);
                                    echo "<t style='color:green' >Update successful</t>";
                                    
                                    if(!$update_user_query){
                                        die("problem with update user query".mysqli_error($connection));
                                    }

                                    }elseif( $username=""||empty($username)||$user_firstname==""||empty($user_firstname)||$user_lastname==""||empty($user_lastname)||$user_email==""||empty($user_email)||$user_image==""||empty($user_image)||$user_role==""||empty($user_role)){
                                    
                                    echo "one of the fields apart from the password is empty so check and fill it";
                        
                                }elseif(empty($user_password)||$user_password==null){

                                    $query="UPDATE users SET username='{$username}',user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',user_image='{$user_image}',user_role='{$user_role}'   WHERE user_id={$user_id}";
                                    $update_user_query=mysqli_query($connection, $query);
                                    echo "Update successful2";
                                    if(!$update_user_query){
                                        die("problem with update user query".mysqli_error($connection));
                                    }

                        }

                       
                    }

                   
            
                    
                }
            
            
        
        
        
        
            function delete_user(){
                global $connection;
            if(isset($_SESSION['user_role'])){
                if($_SESSION['user_role']=="admin"){
                if(isset($_POST['delete_user_id'])){
                    
                    $user_id=$_POST['delete_user_id'];
                    $user_id=mysqli_real_escape_string($connection,$user_id);
                    $query="DELETE from users WHERE user_id={$user_id}";
                    $delete_user_query=mysqli_query($connection, $query);
            
                    if(!$delete_user_query){
                        die("problem with deleting user query ".mysqli_error($connection));
                    }
            
                    header("Location:user.php");
            
                }
            }
            }
            }
            

function users_online(){
   
   
   // echo $_GET['onlineuser'];
if(isset($_GET['onlineuser'])){

//echo $_GET['onlineuser'];
global $connection;
//echo $connection;

        if(!$connection){
            session_start();
          
           
            $db['db_host']="localhost:3306";
            $db['db_user']="root";
            $db['db_pass']="";
            $db['db_name']="cms";
            
            foreach($db as $key=> $value){
                define(strtoupper($key), $value);
            }
            
            $connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


            $session=session_id();
            $time=time();
            $time_out_in_seconds=1;
            $timeout=$time-$time_out_in_seconds;
            $query="SELECT * FROM users_online WHERE session='$session'";
            $send_query=mysqli_query($connection,$query);
            $count=mysqli_num_rows($send_query);
            if($count==null){
                $query="INSERT INTO users_online(session,time)  VALUES('$session','$time')";
                $send_query=mysqli_query($connection,$query);
                if(!$send_query){
                    die("query failed". mysqli_error($connection));
                }
            }else{
                $query="UPDATE users_online SET time='$time' WHERE session='$session'";
                $send_query=mysqli_query($connection,$query);
                if(!$send_query){
                    die("query failed". mysqli_error($connection));
                }
            }
    
            $query="SELECT * FROM users_online WHERE   time > '$timeout'";
            $send_query=mysqli_query($connection,$query);
            echo $count_users_online=mysqli_num_rows($send_query);
        if(!$send_query){
            die("query failed". mysqli_error($connection));
        }
            

            //$count_users_online;
        }

       
}
}
users_online();

function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection,trim($string));
}

function confirm_query($query){
    global $connection;
    if(!$query){
        die("query failed user_role".mysqli_error($connection));
       }
}

function is_admin($username){

    global $connection;

    $query="SELECT user_role FROM users WHERE username = '$username'";

    $send_query=mysqli_query($connection,$query);

    confirm_query($send_query);
    $row=mysqli_fetch_assoc($send_query);

    if($row['user_role']=='admin'){
        return true;
    }else{
        return false;
    }
    
}


function username_exists($username){
    
        global $connection;
    
        $query="SELECT username FROM users WHERE username = '$username'";
    
        $send_query=mysqli_query($connection,$query);
    
        confirm_query($send_query);
        $row=mysqli_fetch_assoc($send_query);
    
        if($row > 0){
            return true;
        }else{
            return false;
        }
        
    }

    
    function login($username,$password){
        
        global $connection;
        $username=escape($username);
        $password=escape($password);

        $query="SELECT * FROM users WHERE username='{$username}'";
        $select_all_users_query=mysqli_query($connection, $query);

       
        confirm_query($select_all_users_query);
        while($row=mysqli_fetch_assoc($select_all_users_query)){
        $user_id=$row['user_id'];
        $db_username=$row['username'];
        $db_user_password=$row['user_password'];
        $db_user_firstname=$row['user_firstname'];
        $db_user_lastname=$row['user_lastname'];
        $db_user_email=$row['user_email'];
        $db_user_image=$row['user_image'];
        $db_user_role=$row['user_role'];
    }

        if( password_verify($password, $db_user_password)){
            
                    
            
                    $_SESSION['username']=$db_username;
                    $_SESSION['first_name']=$db_user_firstname;
                    $_SESSION['last_name']=$db_user_lastname;
                    $_SESSION['user_role']=$db_user_role;
                    
                    redirect("/cms/admin");
            
      
    
        }else{
            
            redirect("/cms/index.php");
       
        }

    
  
 
   
   

    }





function register_user($username,$password,$email){

        global $connection;

        $username=escape($username);
        $password=escape($password);
        $email=escape($email);

            $password=password_hash($password,PASSWORD_BCRYPT,array('costs'=> 12));
    
            $query1="INSERT INTO users (username,user_password,user_email,user_role) VALUES('$username', '$password', '$email' ,'subscriber')";

            $query_insert_users=mysqli_query($connection,$query1);
            
            confirm_query($query_insert_users);

            //$message="Your Registration has been submitted";
            
        }



        
    function email_exists($user_email){
        
            global $connection;
        
            $query="SELECT user_email FROM users WHERE user_email = '$user_email'";
        
            $send_query=mysqli_query($connection,$query);
        
            confirm_query($send_query);
            $row=mysqli_fetch_assoc($send_query);
        
            if($row > 0){
                return true;
            }else{
                return false;
            }
            
        }

?>