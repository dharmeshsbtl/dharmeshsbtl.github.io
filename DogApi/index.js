$(document).ready(function(){
    $.ajax({
        url:'curl.php',
        type:'GET',
        success:function(response){
            response=JSON.parse(response);
            if(response.status=="success")
            {
                $('.dogImgDiv').html('<img src="'+response.message+'" alt="Wait! Image is Loading">');
            }
        }
    });
});