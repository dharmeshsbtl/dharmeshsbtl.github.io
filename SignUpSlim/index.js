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
    $('#SlctAll').change(function () {
        Select_All($(this).is(':checked'));
    });
    $('#BulkDelete').click(function () {
        $('#BulkDeleteConfirmModal').modal('toggle');
    });
    $('#SignupBtn').click(function () {
        BtnType('signup', 'SignUp');
        $('#UserDetailForm').trigger('reset');
        $('#UserDetailModal').modal('toggle');
    });
    $('#actionbtn').click(function () {
        Trigger_Action($('#actionbtn').val());
    });
    $('[name=SrtAsc]').click(function () {
        JsonSortAsc($(this)[0].value);
        if (Empty_Checker(CurObjData)) {
            Create_Pagination(CurObjData.length);
            $($(".pagination").find("button")[0]).removeClass('btn-secondary');
            $($(".pagination").find("button")[0]).addClass('ActivePageBtn');
            FillToTable(1, CurObjData);
        }
    });
    $('[name=SrtDesc]').click(function () {
        JsonSortDesc($(this)[0].value);
        if (Empty_Checker(CurObjData)) {
            Create_Pagination(CurObjData.length);
            $($(".pagination").find("button")[0]).removeClass('btn-secondary');
            $($(".pagination").find("button")[0]).addClass('ActivePageBtn');
            FillToTable(1, CurObjData);
        }
    });
    $('#QTblFlds').keyup(function () {
        Prepare_Search_Options();
    });
    $('.M-close').click(function () {
        $('#MsgModal').css('display', 'none');
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
                required: false
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
    data['state'] = $('#inputState').val();
    data['zip'] = $('#inputZip').val();
    data['description'] = $('#description').val();
    return JSON.stringify(data);
}
function Form_Filler(data) {
    $('#fname').val(data.cells[2].innerHTML);
    $('#lname').val(data.cells[3].innerHTML);
    $('#email').val(data.cells[4].innerHTML);
    $('#mnumber').val(data.cells[5].innerHTML);
    $('#dob').val(data.cells[6].innerHTML);
    $('input[type=radio][value=' + data.cells[7].innerHTML + ']').attr('checked', true);
    $.each(data.cells[8].innerHTML.split(','), function (i, val) {

        $("input[type=checkbox][value='" + val + "']").prop('checked', true);

    });
    $('#inputCity').val(data.cells[9].innerHTML);
    $('#inputState').val(data.cells[10].innerHTML);
    $('#inputZip').val(data.cells[11].innerHTML);
    $('#description').val(data.cells[12].innerHTML);
}

function Trigger_Action(type) {
    if (type == "signup") {
        SignUp();
    }
    else if (type == "edit") {
        Edit_User();
    }
}

function AppendToTable(data) {
    JsonData = data;
    CurObjData = JsonData;
    if (Empty_Checker(CurObjData)) {
        JsonSortAsc($(this)[0].value);
        Create_Pagination(CurObjData.length);
        $($(".pagination").find("button")[0]).removeClass('btn-secondary');
        $($(".pagination").find("button")[0]).addClass('ActivePageBtn');
        FillToTable(1, CurObjData);
    }
}
function Create_Pagination(TotalEntry) {
    dvsr = 3;
    if (TotalEntry > 0) {
        let BtnGrp = `<div class="btn-group" role="group">`;
        for (let i = 0; i < Math.ceil(TotalEntry / dvsr); i++) {
            BtnGrp += `<button type="button" class="btn btn-secondary" value="` + (i + 1) + `" onclick="Change_Page(this);">` + (i + 1) + `</button>`;
        }
        BtnGrp += "</div>";
        $('.pagination').html(BtnGrp);
    }
}
function Change_Page(PageElem) {
    $('.ActivePageBtn').addClass('btn-secondary');
    $('.ActivePageBtn').removeClass('ActivePageBtn');
    $(PageElem).removeClass('btn-secondary');
    $(PageElem).addClass('ActivePageBtn');
    FillToTable(PageElem.value, CurObjData);
}
function FillToTable(section, data) {
    $('#TableData').html('');
    var row = "";
    for (var i = dvsr * section - dvsr; i < dvsr * section; i++) {
        if (i == data.length) {
            break;
        }
        row += "<tr>";
        row += "<td><input type='checkbox' name='DelArr' value='" + data[i]['uid'] + "'></td>";
        row += "<th scope='row'>" + (i + 1) + "</th>";
        row += `<td>` + data[i]['fname'] + `</td>
            <td>` + data[i]['lname'] + `</td>
            <td>` + data[i]['email'] + `</td>
            <td>` + data[i]['mnumber'] + `</td>
            <td>` + data[i]['dob'].substr(8, 2) + "-" + data[i]['dob'].substr(5, 2) + "-" + data[i]['dob'].substr(0, 4) + `</td>
            <td>` + data[i]['gender'] + `</td>
            <td>` + data[i]['hobbies'] + `</td>
            <td>` + data[i]['city'] + `</td>
            <td>` + data[i]['state'] + `</td>
            <td>` + data[i]['zip'] + `</td>
            <td>` + data[i]['description'] + `</td>
            <td><img src='' width='50px' height='50px' alt='Profile Image'></td>
            <td>
            <button type='button'  value='`+ data[i]['uid'] + `' class='btn btn-warning' onclick="Btn_Action('edit',this.value,this);">Edit</button>
            <button type='button'  value='`+ data[i]['uid'] + `' class='btn btn-danger' onclick="Btn_Action('delete',this.value,this);">Delete</button>
            </td>;`;
        row += "</tr>";
        $('#TableData').append(row);
        row = "";
    }
}
function Empty_Checker(data) {
    if (data.length > 0) {
        return true;
    }
    else {
        $('#TableData').html("<tr><td colspan='15' class='text-center'>No Records Found to Show!</td></tr>");
    }
}
function Select_All(checked) {
    if (checked) {
        $('[name=DelArr]').prop('checked', true);
    }
    else {
        $('[name=DelArr]').prop('checked', false);
    }
}
function Bulk_Delete() {
    vals = [];
    $('input:checkbox[name=DelArr]:checked').each(function () {
        vals.push($(this).val());
    });
    if (vals.length == 0) {
        return;
    }
    $.ajax({
        type: "POST",
        url: 'http://localhost/slim/app/src/public/SignUp',
        data: { type: 'BulkDelete', DelArr: JSON.stringify(vals) },
        dataType: "text",
        success: function (data, textStatus, jqXHR) {
            if (data.status == 'success') {
                $('.MsgHeader').html('Bulk Delete Success!');
                $('.MsgBody').html('The selected users have been deleted successfully!');
                Show_Message();
            }
            if (document.getElementById('TableData').rows.length == 1) {
                document.getElementById('TableData').innerHTML = "";
            }
            Fetch_Data();
        }
    });
    $('[name=SlctAll]').prop('checked', false);
}
function Fetch_Data() {
    return $.ajax({
        type: "POST",
        url: 'http://localhost/slim/app/src/public/SignUp',
        data: { type: 'List' },
        dataType: "text",
        success: function (data, textStatus, jqXHR) {
            AppendToTable(JSON.parse(data));
        }
    });
}
function Delete_User() {
    $.ajax({
        type: "POST",
        // url: 'http://localhost/Ajax/Processor.php',
        url: 'http://localhost/slim/app/src/public/SignUp',
        data: { type: 'Delete', id: uuid },
        dataType: "text",
        success: function (data, textStatus, jqXHR) {
            if (data.status == 'success') {
                $('.MsgHeader').html('Delete Success!');
                $('.MsgBody').html('The selected user has been deleted successfully!');
                Show_Message();
            }
            if (document.getElementById('TableData').rows.length == 1) {
                document.getElementById('TableData').innerHTML = "";
            }
            Fetch_Data();
        }
    });
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
            // url: 'http://localhost/Ajax/Processor.php',
            url: 'http://localhost/slim/app/src/public/SignUp',
            data: UserData,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                if (data.status == 'success') {
                    $('#UserDetailModal').modal('toggle');
                    $('#UserDetailForm').trigger('reset');
                    $('.MsgHeader').html('Edit Success!');
                    $('.MsgBody').html('User details have been edited successfully!');
                    Show_Message();
                }
                Fetch_Data();
            }
        });
    }
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
            // url: 'http://localhost/Ajax/Processor.php',
            url: 'http://localhost/slim/app/src/public/SignUp',
            data: UserData,
            contentType: false,
            processData: false,
            success: function (data, textStatus, jqXHR) {
                if (data.status == 'success') {
                    $('#UserDetailModal').modal('toggle');
                    $('#UserDetailForm').trigger('reset');
                    $('.MsgHeader').html('SignUp success!');
                    $('.MsgBody').html('You have successfully signed up!');
                    Show_Message();
                }
                Fetch_Data();
            }
        });
    }
}
function JsonSortAsc(key) {
    CurObjData.sort(
        function (a, b) {
            var x = a[key]; var y = b[key];
            return ((x < y) ? -1 : ((x > y) ? 1 : 0));
        }
    );
}
function JsonSortDesc(key) {
    CurObjData.sort(
        function (a, b) {
            var x = a[key]; var y = b[key];
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        }
    );
}
function Prepare_Search_Options() {
    var Keys = ['fname', 'lname', 'email', 'mnumber', 'dob', 'gender', 'hobbies', 'city', 'state', 'zip', 'description'];
    var val = $('#QTblFlds').val();
    var TmpObj = [];
    var FinalObj = [];
    if (JsonData.length == 0) {
        return;
    }
    for (let i = 0; i < JsonData.length; i++) {
        for (let j = 0; j < Keys.length; j++) {
            if (String(JsonData[i][Keys[j]]).toLowerCase().includes(String(val).toLowerCase())) {
                TmpObj.push(JsonData[i]);
            }
        }
    }
    $.each(TmpObj, function (i, el) {
        if ($.inArray(el, FinalObj) === -1) FinalObj.push(el);
    });
    CurObjData = FinalObj;
    FinalObj = [];
    TmpObj = [];
    if (Empty_Checker(CurObjData)) {
        Create_Pagination(CurObjData.length);
        $($(".pagination").find("button")[0]).removeClass('btn-secondary');
        $($(".pagination").find("button")[0]).addClass('ActivePageBtn');
        FillToTable(1, CurObjData);
    }
}
function Show_Message() {
    $('#MsgModal').css({display:'block',opacity:1});
    $('#MsgModal').animate(
        { opacity: 0 },
        3000,
        function () {
            $('#MsgModal').css('display', 'none');
        }
    );
}