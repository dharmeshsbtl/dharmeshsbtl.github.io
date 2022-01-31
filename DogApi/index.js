$(document).ready(function(){
    $.ajax({
        url:'https://dog.ceo/api/breeds/image/random',
//         url:'curl.php',
        type:'GET',
        success:function(response){
//             response=JSON.parse(response);
            if(response.status=="success")
            {
                $('.dogImgDiv').html('<img src="'+response.message+'" alt="Wait! Image is Loading">');
            }
        }
    });
});
