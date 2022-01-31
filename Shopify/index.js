$(document).ready(function(){
        Fetch_Data();
        $('#downloadData').click(function(){
            window.open("http://localhost/slim/app/src/public/Csv");
        });
});
function Fetch_Data(){$.ajax({
    type: "POST",
    url: 'http://localhost/slim/app/src/public/TblCsv',
    data: null,
    dataType: "text",
    success: function (resp, textStatus, jqXHR) {
        var data="";
        data=`<table class='hover order-column table-bordered table-striped' id='Tbl'>
        <thead>
            <th>Store Url</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>Action</th>
        </thead>
        <tbody>`;
        resp=JSON.parse(resp);
        for(var i=0;i<resp.length;i++)
        {
            data+="<tr>";
            data+="<td>";
            data+=resp[i]['storeurl'];
            data+="</td>";
            data+="<td>";
            data+=resp[i]['email'];
            data+="</td>";
            data+="<td>";
            data+=resp[i]['telephone'];
            data+="</td>";
            data+="<td>";
            data+="<button type='button' class='btn btn-danger' value='"+resp[i]['id']+"' onclick='Confirm(this.value);'>Delete</button>";
            data+="</td>";
            data+="</tr>";   
        }
        data+=`</tbody>
        </table>`;
        $('#DataTbl').html(data);
        $('#Tbl').DataTable();
    },
});};
function Delete()
{
    $.ajax({
        type: "POST",
        url: 'http://localhost/slim/app/src/public/Delete',
        data: {id:uid},
        dataType: "text",
        success: function()
        {
            $('#DataTbl').html('');
            Fetch_Data();
            $('#MsgModal').modal('toggle');
        }
    });
}
function Confirm(val)
{
    uid=val;
    $('#ConfirmModal').modal('toggle');
}