var statusArr = [];
var statusCode = -1;
var verified=false;
$(document).ready(function () {
    Assign_Validate_Function('url','string');
    Assign_Validate_Function('count','number');
    $('#check').click(function () {
        statusArr = [];
        if(!verified)
        {
            return;
        }
        $('#responseData').html('');
        for (var i = 0; i < parseInt($('#count').val()); i++) {
            Curl();
        }
    });
});
function Curl() {
    $.ajax({
        url: 'http://localhost/HealthChecker/curl.php?url=' + $('#url').val(),
        type: 'GET',
        cache: false,
        success: function (response) {
            statusCode = parseInt(response);
            if (!statusArr.includes(statusCode)) {
                if (statusCode == 0) {
                    $('#responseData').append('<tr class="text-black"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s0">0</span></span></td><td>No Site Found!</td></tr>');
                }
                else if (statusCode >= 100 && statusCode <= 199) {
                    $('#responseData').append('<tr class="text-info"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s' + statusCode + '">0</span></span></td><td>Informational!</td></tr>');
                }
                else if (statusCode >= 200 && statusCode <= 299) {
                    $('#responseData').append('<tr class="text-success"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s' + statusCode + '">0</span></span></td><td>Success!</td></tr>');
                }
                else if (statusCode >= 300 && statusCode <= 399) {
                    $('#responseData').append('<tr class="text-primary"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s' + statusCode + '">0</span></span></td><td>Redirected!</td></tr>');
                }
                else if (statusCode >= 400 && statusCode <= 499) {
                    $('#responseData').append('<tr class="text-danger"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s' + statusCode + '">0</span></span></td><td>Client Error!</td></tr>');
                }
                else if (statusCode >= 500 && statusCode <= 599) {
                    $('#responseData').append('<tr class="text-warning"><td ><span class="statusCode">'+statusCode+'<span class="badge badge-dark sc-counter" id="s' + statusCode + '">0</span></span></td><td>Server Error!</td></tr>');
                }
                statusArr.push(statusCode);
            }

            $('#s' + statusCode).html(parseInt($('#s' + statusCode).html()) + 1);
        },
    });
}
function Assign_Validate_Function(elem,type){
    $('#'+elem).focusout(function(){
        if(type=='string')
        {
            if($('#'+elem).val().trim().length==0)
            {
                $('#'+elem).css('color','red');
                verified=false;
            }
        }
        if(type=='number')
        {
            if(isNaN(parseInt($('#'+elem).val().trim())))
            {
                $('#'+elem).css('color','red');
                verified=false;
            }
        }
    });
    $('#'+elem).focusin(function(){
        $('#'+elem).css('color','black');
        verified=true;
    });
}