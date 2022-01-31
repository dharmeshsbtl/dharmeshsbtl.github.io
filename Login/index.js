function BBCC(){ //BCC = BODY BACKGROUND COLOR CHANGE
        var col1=$('#GColor1').val();
        var col2=$('#GColor2').val();

        if(col1!='none' && col2!='none')
        {
            $('body').css('background','linear-gradient(to bottom, '+col1+','+col2+')');
        }
}
function VLF(event){ //VLF = VALIDATE LOGIN FORM
    var verified=false;
    var vcaccessed=false;
    var uid=$('#userid').val();
    var pswd=$('#password').val();
    if(!(inrange(uid.trim().length,5,50)))
    {
        $('#UidErrMsg').text('Error in User ID');
        $('#userid').addClass('CredentialsErr');
        vcaccessed=true;
    }
    else
    {
        $('#UidErrMsg').text('');
        $('#userid').removeClass('CredentialsErr');
    }
    if(!(inrange(pswd.trim().length,5,50)))
    {
        $('#PswdErrMsg').text('Error in Password');
        $('#password').addClass('CredentialsErr');
        vcaccessed=true;
    }
    else
    {
        $('#PswdErrMsg').text('');
        $('#password').removeClass('CredentialsErr');
    }
    vcaccessed ? verified=false : verified=true;

    // if(verified)
    // {
    //     // $('#LoginMsg').text('Logged In!');
    //     // event.preventDefault();
    // }
    if(!verified)
    {
        $('#LoginMsg').text('');
        event.preventDefault();
    }

}
function FS(){
    var elemgroup='.' + $('#elmgroup').val();
    var fsize=$('#font-size').val();
    var fcolor=$('#font-color').val();

    if(elemgroup!='none'){
        if(fsize>0){
            $(elemgroup).css('font-size',parseInt(fsize)+'px');
        }
        if(fcolor!='none'){
            $(elemgroup).css('color',fcolor);
        }
    }
}
// ON DOCUMENT READY
$(document).ready(function(){
    $('.GColorSelectors').change(function(){BBCC();});
    $('.ElmGroupSelectors').change(function(){FS();});
    $('#loginuserform').submit(function(event){VLF(event);});
})
// 

// CUSTOM FUNCTION
function inrange(value,range1,range2)
{
    if(value>=range1 && value<=range2)
    return true;
    else
    return false;
}
// 
