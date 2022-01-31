<?php
    session_start();
    if(isset($_POST['logout']))
    {
        session_destroy();
        echo "<script>window.location.href='http://localhost/slim/app/admin/dntukadiya/Login';</script>";
        exit();
    }
    if(!(isset($_SESSION['verified'])))
    {
        session_destroy();
        echo "<script>window.location.href='http://localhost/slim/app/admin/dntukadiya/Login';</script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> -->
    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Current</title>
</head>

<body>
    <div class="container">
        <div class="row">

            <div class="col-3">
                <button type="button" class="btn btn-warning float-left m-5 " id="BulkDelete" name="BulkDelete">
                    Delete Selected
                </button>
            </div>
            <div class="col-6">
                <input type="text" class="m-5" name="QTblFlds" id="QTblFlds" placeholder="Search Here">
            </div>
            <div class="col-3">
                <button type="button" class="btn btn-primary float-right m-5" id="SignupBtn" name="SignupBtn">
                    SignUp!
                </button>
            </div>

        </div>
    </div>
    <div>
        <table class='table table-bordered' id="UserDataTable">
            <thead>
                <tr>
                    <th scope='col'><input type="checkbox" name="SlctAll" id="SlctAll"></th>
                    <th>#</th>
                    <th scope='col'><div>First Name</div><button class="fa fa-arrow-up" name="SrtAsc"
                            value="fname"></button><button name="SrtDesc" value="fname"
                            class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Last Name</div><button class="fa fa-arrow-up" name="SrtAsc" value="lname"></button><button
                            name="SrtDesc" value="lname" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Email</div><button class="fa fa-arrow-up" name="SrtAsc" value="email"></button><button
                            name="SrtDesc" value="email" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Mobile</div><button class="fa fa-arrow-up" name="SrtAsc" value="mnumber"></button><button
                            name="SrtDesc" value="mnumber" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>DOB</div><button class="fa fa-arrow-up" name="SrtAsc" value="dob"></button><button
                            name="SrtDesc" value="dob" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Gender</div><button class="fa fa-arrow-up" name="SrtAsc" value="gender"></button><button
                            name="SrtDesc" value="gender" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Hobbies</div><button class="fa fa-arrow-up" name="SrtAsc" value="hobbies"></button><button
                            name="SrtDesc" value="hobbies" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>City</div><button class="fa fa-arrow-up" name="SrtAsc" value="city"></button><button
                            name="SrtDesc" value="city" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>State</div><button class="fa fa-arrow-up" name="SrtAsc" value="state"></button><button
                            name="SrtDesc" value="state" class="fa fa-arrow-down"></button></th>
                    <th scope='col'><div>Zip</div><button class="fa fa-arrow-up" name="SrtAsc" value="zip"></button><button
                            name="SrtDesc" value="zip" class="fa fa-arrow-down"></button></th>
                    <th scope='col'>Description<button class="fa fa-arrow-up" name="SrtAsc"
                            value="description"></button><button name="SrtDesc" value="description"
                            class="fa fa-arrow-down"></button></th>
                    <th scope='col'>Profile Image</th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody id="TableData"></tbody>
        </table>
        <div class="pagination justify-content-center"></div>
    </div>
    <!-- Modal Message -->
    <div id="MsgModal" name="MsgModal">
        <div class="M-header">
            <strong class="MsgHeader">Success</strong>
        </div>  
        <div class="M-close">&times;</div>          
        <div class="M-body"><div class="MsgBody">Done</div></div>            
    </div>
    <!--  -->
    <!-- Modal Signup-->
    <div class="modal fade" id="UserDetailModal" role="dialog" aria-labelledby="UserDetailFormLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="" method="post" id="UserDetailForm" name="UserDetailForm" autocomplete="off"
                enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="UserDetailFormLabel">Don't have Account? SignUp!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="fname">First Name</label>
                                <input type="text" class="form-control" name="fname" id="fname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lname">Last Name</label>
                                <input type="text" class="form-control" name="lname" id="lname">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="mnumber">Mobile</label>
                                <input type="number" class="form-control" name="mnumber" id="mnumber">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="password">DOB</label>
                                <input type="date" class="form-control" name="dob" id="dob">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                Select Gender
                            </div>
                            <fieldset class="form-group col-md-9">
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="male" />&emsp;Male</label>
                                </div>
                                <div class="radio">
                                    <label><input type="radio" name="gender" value="female" />&emsp;Female</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                Hobbies
                            </div>
                            <fieldset class="form-group col-md-9">
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies" value="Sports" />&emsp;Sports</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies"
                                            value="Programming" />&emsp;Programming</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies" value="Web Surfing" />&emsp;Web
                                        Surfing</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies"
                                            value="Travelling" />&emsp;Travelling</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies" value="Gaming" />&emsp;Gaming</label>
                                </div>
                            </fieldset>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" name="inputCity" id="inputCity">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control" name="inputState">
                                    <option value="">Select State</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip" name="inputZip">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="pimage">Choose Profile Photo</label>
                                <input type="file" class="form-control" id="pimage" name="pimage">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="txtar">Description : </label>
                                <div id="txtar">
                                    <textarea cols="30" rows="5" style="width: 100%;" name="description"
                                        id="description"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" name="actionbtn" id="actionbtn" value=""></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="ConfirmModal" name="ConfirmModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Do you want to Delete the User?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This action can't be reversed!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"
                        onclick="Delete_User();">Delete</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal" tabindex="-1" id="BulkDeleteConfirmModal" name="BulkDeleteConfirmModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Do you want to delete the selected user?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>This action can't be reversed!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="Bulk_Delete();">Delete
                        Selected User</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <form action="index.php" method="post">
        <button class="btn btn-danger" name="logout" id="logout">LogOut</button>
    </form>
</body>

</html>