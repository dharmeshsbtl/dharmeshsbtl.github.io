<?php
$response = array();
if (isset($_POST['type'])) {
    if ($_POST['type'] == 'SignUp') {
        $data = json_decode($_POST['data']);
        $uid=uniqid();
        $v1 = $data->fname;
        $v2 = $data->lname;
        $v3 = $data->email;
        $v4 = $data->mnumber;
        $v5 = $data->dob;
        $v6 = $data->gender;
        $v7 = implode(',', $data->hobbies);
        $v8 = $data->city;
        $v9 = $data->state;
        $v10 = $data->zip;
        $v11 = $data->description;
        $conn = new mysqli('localhost', 'root', '', 'user');
        $sql = "INSERT INTO `user` (uid,fname,lname,email,mnumber,dob,gender,hobbies,city,state,zip,description) VALUES ('$uid','$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9','$v10','$v11')";
        if($conn->query($sql)===TRUE)
        {
            $response['status'] = 'success';
            echo json_encode($response);
        }
        $conn->close();
        $FilePath = "./uploads/". $uid . ".png";
        if(file_exists($FilePath)){
            unlink($FilePath);
        }
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $FilePath);
    }
    elseif ($_POST['type'] == 'List') {
        $table = "";
        $conn = new mysqli('localhost', 'root', '', 'user');
        $sql = "SELECT * FROM `user` ORDER BY `id` ASC";
        $result = $conn->query($sql);
        $i = 0;
        if ($result->num_rows > 0) {
            while ($data = $result->fetch_assoc()) {
                $i++;
                $table .= "<tr>
                        <th scope='row'>". $i ."</th>
                        <td>" . $data['fname'] . "</td>
                        <td>" . $data['lname'] . "</td>
                        <td>" . $data['email'] . "</td>
                        <td>" . $data['mnumber'] . "</td>
                        <td>" . date('d-m-Y', strtotime($data['dob'])) . "</td>
                        <td>" . $data['gender'] . "</td>
                        <td>" . $data['hobbies'] . "</td>
                        <td>" . $data['city'] . "</td>
                        <td>" . $data['state'] . "</td>
                        <td>" . $data['zip'] . "</td>
                        <td>" . $data['description'] . "</td>
                        <td><img src='http://localhost/dntukadiya/SignUpCorePHP/uploads/".$data['uid'].".png' width='50px' height='50px' alt='Profile Image'></td>
                        <td>
                        <button type='button'  value='".$data['uid']."' class='btn btn-warning' onclick=\"Btn_Action('edit',this.value,this);\">Edit</button>
                        <button type='button'  value='".$data['uid']."' class='btn btn-danger' onclick=\"Btn_Action('delete',this.value,this);\">Delete</button>
                        </td>
                        </tr>";
            }
        }
        $conn->close();
        if ($i > 0) {
            $response['status'] = 'success';
            $response['result'] = $table;
        } else {
            $response['status'] = 'reject';
            $response['reason'] = 'No records found!';
        }
        echo json_encode($response);
    }
    elseif ($_POST['type'] == 'Edit') {
        $data = json_decode($_POST['data']);
        $v1 = $data->fname;
        $v2 = $data->lname;
        $v3 = $data->email;
        $v4 = $data->mnumber;
        $v5 = $data->dob;
        $v6 = $data->gender;
        $v7 = implode(',', $data->hobbies);
        $v8 = $data->city;
        $v9 = $data->state;
        $v10 = $data->zip;
        $v11 = $data->description;
        $conn = new mysqli('localhost', 'root', '', 'user');
        $sql="UPDATE `user` SET fname='$v1', lname='$v2', email='$v3', mnumber='$v4', dob='$v5', gender='$v6', hobbies='$v7', city='$v8', state='$v9', zip='$v10', description='$v11' WHERE `uid`='".$_POST['id']."'";
        if($conn->query($sql)===TRUE)
        {
            $response['status'] = 'success';
            echo json_encode($response);
        }
        else
        {
            $response['status'] = 'success';
            $response['reason'] = 'User Not Found';
            echo json_encode($response);
        }
        $conn->close();
        $FilePath = "./uploads/". $_POST['id'] . ".png";
        if(file_exists($FilePath)){
            unlink($FilePath);
        }
        move_uploaded_file($_FILES["pimage"]["tmp_name"], $FilePath);
    }
    elseif ($_POST['type'] == 'Delete') {
        $conn = new mysqli('localhost', 'root', '', 'user');
        $sql="DELETE FROM `user` WHERE `uid`='".$_POST['id']."'";
        if($conn->query($sql)===TRUE)
        {
            $response['status'] = 'success';
            echo json_encode($response);
        }

        $conn->close();
        $FilePath = "./uploads/". $_POST['id'] . ".png";
        if(file_exists($FilePath)){
            unlink($FilePath);
        }
    }
}
?>