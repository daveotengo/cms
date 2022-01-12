

<script type="text/javascript" src="js/scriptss.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>



  <script>
//       var checkboxes=document.getElementById("selectAllCheckBoxes");
// if(document.getElementById("selectAllCheckBoxes").addEventListener('change',validate)){
//    
// }
$(document).ready(function(){
    
  $("#selectAllCheckBoxes").click(function(event){
  
    //$("#selectCheckBox").check()=true;
    if(this.checked==true){
        $(".checkbox").each(function(event){
        this.checked=true;
        });
    }else if(this.checked==false){

        $(".checkbox").each(function(event){
        this.checked=false;
        });
    }
  });
 
    


  var div_box="<div id='load-screen' style='background: url(../images/header-back.png);position: fixed; z-index: 10000;top:0px; width: 100%;  height: 1600px;'><div id='loading' style='width: 500px;height: 500px; margin: 10% auto;background: url(../images/loader.gif); background-size: 40%; background-repeat: no-repeat;background-position: center;'></div></div>";
    
   
    $("body").prepend(div_box);
    $('#load-screen').delay(100).fadeOut(600, function(){
    $(this).remove();
    });
    



});




  </script>

<script>
  $(document).ready(function() {
 
  // function loadUsersOnline() {
  // //alert("hello");
  
// $.get("functions.php?onlineusers=result", function(data){

//   alert("hi");

//   $(".usersonline").text(data);

// });

  // }


 

  // setInterval(function(){

  //   loadUsersOnline();
    
  //  }, 500);


  function loadUsersOnline(){
   // get request to functions.php
 
    // $.get("includes/functions.php?onlineusers=result", function(data){
    //   alert("hi");
    //   $(".usersonline").text(data);
     
    // });


$.ajax({

  type:'GET',
  url:'includes/functions.php',
  data:{onlineuser:'result'},
  success: function(data){
    //alert("hi");
   // alert(data);
    $(".usersonline").text(data);
  }

});


  }

 

  setInterval(function(){

    loadUsersOnline();
    
  }, 100);

  
 
});
</script>


    

</body>

</html>
