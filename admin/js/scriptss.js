




// function del(part_url){
    
//     $(".delete_link").on('click', function(){
//     // alert('hi');

//     var id= $(this).attr("rel");
//     //var part_url="post.php?source=delete_post&delete_post_id";
//     var delete_url= part_url+"="+ id +" ";

//     //alert(delete_url);

//     $(".modal_delete_link").attr("href", delete_url);

//     $('#myModal').modal('show');

//     });

// }


function del(url,data){
    
    $(".delete_link").on('click', function(){
    // alert('hi');
   // var userid = $(this).attr('rel');
    //var parent = $(this).parent("td").parent("tr");matchMedia
       var id= $(this).attr("rel");
//alert(id);
       
    //var part_url="post.php?source=delete_post&delete_post_id";
    //var delete_url= part_url+"="+ id +" ";

    //alert(delete_url);
    $('#myModal').modal('show');

    $(".modal_delete_link").on('click', function(){

        $.ajax({
            type: 'POST',
            url: url,
            data: data+id
            })
            .done(function(response){
           //alert(response);
        //$('#myModal').modal('hide');
            })
            .fail(function(){
            bootbox.alert('Error....');
            })

    });

   

  

    });

}


   