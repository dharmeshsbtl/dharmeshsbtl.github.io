// Date Range Checker
$.validator.addMethod('DateRange', function (value, element, DateRange) {
    if (Date.parse(value) >= Date.parse(DateRange[0]) && Date.parse(value) <= Date.parse(DateRange[1])) {
        return true;
    }
    return false;
});
//
// Document Ready Function
function BtnType(type, text) {
    $('#actionbtn').val(type);
    $('#actionbtn').html(text);
}
function Btn_Action(type, id, element) {
    var rindex = $(element).closest("tr").index();
    uuid = id;
    if (type == 'edit') {
        BtnType('edit', 'Edit');
        Form_Filler(document.getElementById('TableData').rows[rindex]);
        $('#UserDetailModal').modal('toggle');
    }
    else if (type == 'delete') {
        $('#ConfirmModal').modal('toggle');
    }
}
$(document).ready(function () {
    Fetch_Data();
    $('#SignupBtn').click(function () {
        BtnType('signup', 'SignUp');
        $('#UserDetailForm').trigger('reset');
        $('#UserDetailModal').modal('toggle');
    });
    $('#actionbtn').click(function () {
        Trigger_Action($('#actionbtn').val());
    });
    $('#UserDetailForm').validate({
        errorClass: "Invalid",
        focusCleanup: true,
        rules: {
            fname: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            lname: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            email: {
                required: true,
                email: true
            },
            mnumber: {
                required: true,
                minlength: 1,
                maxlength: 10
            },
            dob: {
                required: true,
                date: true,
                DateRange: ['1901/01/01', '2022/12/31']
            },
            gender: 'required',
            hobbies: {
                required: true
            },
            inputState: {
                required: true
            },
            inputCity: {
                required: true
            },
            inputZip: {
                required: true,
                maxlength: 6,
                minlength: 1
            },
            pimage: {
                required: true
            },
            description: {
                required: true,
                minlength: 1,
                maxlength: 1000
            }
        },
        messages: {
            fname: {
                required: 'This field is required',
                minlength: 'Min Length : 2',
                maxlength: 'Max Length : 20',
            },
            lname: {
                required: 'This field is required',
                minlength: 'Min Length : 2',
                maxlength: 'Max Length : 20'
            },
            email: {
                required: 'This field is required',
                email: 'Invalid Email'
            },
            mnumber: {
                required: 'This field is required',
                minlength: 'Input 10 Digits!',
                maxlength: 'Input 10 Digits!'
            },
            dob: {
                required: 'This field is required',
                date: 'Invalid DOB',
                DateRange: "2001 To 2021"
            },
            gender: 'This field is required',
            hobbies: 'This field is required',
            inputState: {
                required: 'This field is required'
            },
            inputCity: {
                required: 'This field is required'
            },
            inputZip: {
                required: 'This field is required',
                maxlength: 'Input 6 Digits!',
                minlength: 'Input 6 Digits!'
            },
            pimage: 'Please Upload Profile Photo!',
            description: {
                required: 'This field is required',
                minlength: 'At least 100 characters!',
                maxlength: 'Not more than 1000 characters'
            }

        },
    });
    // $('#UserDetailModal').on('hidden.bs.modal', function () {
    //     $('.Invalid').removeClass('Invalid');
    // });
});
function Bind_Data() {
    let data = {};
    let hb = [];
    $('input:checkbox[name=hobbies]:checked').each(function () {
        hb.push($(this).val());
    });
    data['fname'] = $('#fname').val();
    data['lname'] = $('#lname').val();
    data['email'] = $('#email').val();
    data['mnumber'] = $('#mnumber').val();
    data['dob'] = $('#dob').val();
    data['gender'] = $('input:radio[name=gender]:checked').val();
    data['hobbies'] = hb;
    data['city'] = $('#inputCity').val();
    data['state'] = $('#inputCity').val();
    data['zip'] = $('#inputZip').val();
    data['description'] = $('#description').val();
    return JSON.stringify(data);
}
function Form_Filler(data) {
    $('#fname').val(data.cells[1].innerHTML);
    $('#lname').val(data.cells[2].innerHTML);
    $('#email').val(data.cells[3].innerHTML);
    $('#mnumber').val(data.cells[4].innerHTML);
    $('#dob').val(data.cells[5].innerHTML.substr(6, 4) + "-" + data.cells[5].innerHTML.substr(3, 2) + "-" + data.cells[5].innerHTML.substr(0, 2));
    $('input[type=radio][value=' + data.cells[6].innerHTML + ']').attr('checked', true);
    $.each(data.cells[7].innerHTML.split(','), function (i, val) {

        $("input[type=checkbox][value='" + val + "']").prop('checked', true);

    });
    $('#inputCity').val(data.cells[8].innerHTML);
    $('#inputState').val(data.cells[9].innerHTML);
    $('#inputZip').val(data.cells[10].innerHTML);
    $('#description').val(data.cells[11].innerHTML);
}
function Fetch_Data() {
    return $.ajax({
        type: "POST",
        url: 'Processor.php',
        data: { type: 'List' },
        dataType: "text",
        success: function (data, textStatus, jqXHR) {
            let response = JSON.parse(data);
            if (response.status == 'success') {
                $('#TableData').html(response.result);
            }
            else {
                $('.MsgHeader').html('Error!');
                $('.MsgBody').html('Error has occured while fetching the users! : ' + response.reason);
                $('#MsgModal').modal('toggle');
            }
        }
    });
}
function SignUp() {

    if ($('#UserDetailForm').valid()) {
        var pimage = document.getElementById('pimage').files[0];
        var UserData = new FormData();
        UserData.append('type', 'SignUp');
        UserData.append('data', Bind_Data());
        UserData.append('pimage', pimage);
        $.ajax({
            type: "POST",
            url: 'Processor.php',
            data: UserData,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                let response = JSON.parse(data);
                if (response.status == 'success') {
                    $('#UserDetailModal').modal('toggle');
                    $('#UserDetailForm').trigger('reset');
                    $('.MsgHeader').html('SignUp success!');
                    $('.MsgBody').html('You have successfully signed up!');
                    $('#MsgModal').modal('toggle');
                }
                else {
                    $('#UserDetailModal').modal('toggle');
                    $('.MsgHeader').html('Error!');
                    $('.MsgBody').html('Error has occured while signing you up! We regret for that!');
                    $('#MsgModal').modal('toggle');
                }
                Fetch_Data();
            }
        });
    }
}
function Edit_User() {

    if ($('#UserDetailForm').valid()) {
        var pimage = document.getElementById('pimage').files[0];
        var UserData = new FormData();
        UserData.append('type', 'Edit');
        UserData.append('data', Bind_Data());
        UserData.append('id', uuid);
        UserData.append('pimage', pimage);

        $.ajax({
            type: "POST",
            url: 'Processor.php',
            data: UserData,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                let response = JSON.parse(data);
                if (response.status == 'success') {
                    $('#UserDetailModal').modal('toggle');
                    $('#UserDetailForm').trigger('reset');
                    $('.MsgHeader').html('Edit Success!');
                    $('.MsgBody').html('User details have been edited successfully!');
                    $('#MsgModal').modal('toggle');
                }
                else {
                    $('.MsgHeader').html('Error!');
                    $('#UserDetailModal').modal('toggle');
                    $('.MsgBody').html('Error has occured while editing user details! We regret for that!');
                    $('#MsgModal').modal('toggle');
                }
                Fetch_Data();
            }
        });
    }
}
function Delete_User() {
    $.ajax({
        type: "POST",
        url: 'Processor.php',
        data: { type: 'Delete', id: uuid },
        dataType: "text",
        success: function (data, textStatus, jqXHR) {
            let response = JSON.parse(data);
            if (response.status == 'success') {
                $('.MsgHeader').html('Delete Success!');
                $('.MsgBody').html('The selected user has been deleted successfully!');
                $('#MsgModal').modal('toggle');
            }
            else {
                $('.MsgHeader').html('Error!');
                $('.MsgBody').html('Error occured while deleting the user! : ' + response.reason);
                $('#MsgModal').modal('toggle');
            }
            if(document.getElementById('TableData').rows.length==1)
            {
                document.getElementById('TableData').innerHTML="";
            }
            Fetch_Data();
        }
    });
}
function Trigger_Action(type) {
    if (type == "signup") {
        SignUp();
    }
    else if (type == "edit") {
        Edit_User();
    }
}
