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
    <script src="index.js"></script>
    <link rel="stylesheet" href="index.css">
    <title>Current</title>
</head>

<body>
    <button type="button" class="btn btn-primary float-right" id="SignupBtn" name="SignupBtn">
        SignUp!
    </button>
    <!-- Modal Signup-->
    <div class="modal fade" id="UserDetailModal" role="dialog" aria-labelledby="UserDetailFormLabel" tabindex="-1">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <form action="" method="post" id="UserDetailForm" name="UserDetailForm" autocomplete="off" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="UserDetailFormLabel">Don't have Account? SignUp!</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                                    <label><input type="checkbox" name="hobbies" value="Programming" />&emsp;Programming</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies" value="Web Surfing" />&emsp;Web Surfing</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="hobbies" value="Travelling" />&emsp;Travelling</label>
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
                                    <textarea cols="30" rows="5" style="width: 100%;" name="description" id="description"></textarea>
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
    <div>
        <table class='table table-bordered' id="DataTable">
            <thead>
                <tr>
                    <th scope='col'>#</th>
                    <th scope='col'>First Name</th>
                    <th scope='col'>LastName</th>
                    <th scope='col'>Email</th>
                    <th scope='col'>Mobile</th>
                    <th scope='col'>DOB</th>
                    <th scope='col'>Gender</th>
                    <th scope='col'>Hobbies</th>
                    <th scope='col'>City</th>
                    <th scope='col'>State</th>
                    <th scope='col'>Zip</th>
                    <th scope='col'>Description</th>
                    <th scope='col'>Profile Image</th>
                    <th scope='col'>Action</th>
                </tr>
            </thead>
            <tbody id="TableData">

            </tbody>
        </table>
    </div>
    <!-- End -->
    <!-- Modal Message -->
    <div class="modal" tabindex="-1" id="MsgModal" name="MsgModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title MsgHeader"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="MsgBody"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!--  -->
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="Delete_User();">Delete</button>                
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>

</body>

</html>