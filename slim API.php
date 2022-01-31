$app->post('/SignUp', function ($request, $response) {

    $params = $request->getParsedBody();
    if($params['type'] =="List")
    {
        $db = connectdb();
        $db->select("user");
        return $response->withJson($db->result_array());
    }
    elseif($params['type']=="SignUp")
    {
        $data=json_decode($params['data']);
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
        $db = connectdb();
        $Arr=array('uid'=>$uid,'fname'=>$v1,'lname'=>$v2,'email'=>$v3,'mnumber'=>$v4,'dob'=>$v5,'gender'=>$v6,'hobbies'=>$v7,'city'=>$v8,'state'=>$v9,'zip'=>$v10,'description'=>$v11);
        // $db->query("INSERT INTO `user` (uid,fname,lname,email,mnumber,dob,gender,hobbies,city,state,zip,description) VALUES ('$uid','$v1','$v2','$v3','$v4','$v5','$v6','$v7','$v8','$v9','$v10','$v11')");
        $db->insert('user',$Arr);
        return $response->withJson(array('status'=>'success'));
    }
    elseif($params['type']=="Edit")
    {
        $data=json_decode($params['data']);
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
        $db = connectdb();
        $Arr=array('fname'=>$v1,'lname'=>$v2,'email'=>$v3,'mnumber'=>$v4,'dob'=>$v5,'gender'=>$v6,'hobbies'=>$v7,'city'=>$v8,'state'=>$v9,'zip'=>$v10,'description'=>$v11);
        // $db->query("UPDATE `user` SET fname='$v1', lname='$v2', email='$v3', mnumber='$v4', dob='$v5', gender='$v6', hobbies='$v7', city='$v8', state='$v9', zip='$v10', description='$v11' WHERE `uid`='".$params['id']."'");
        $db->update('user',$Arr,array('uid'=>$params['id']));
        return $response->withJson(array('status'=>'success'));
    }
    elseif($params['type']=="Delete")
    {
        $db = connectdb();
        // $db->query("DELETE FROM `user` WHERE `uid`='".$params['id']."'");
        $db->delete('user',array('uid'=>$params['id']));
        return $response->withJson(array('status'=>'success'));
    }
    elseif($params['type']=="BulkDelete")
    {
        $DelArr=json_decode($params['DelArr']);
        $sql="DELETE FROM `user` WHERE `uid` IN (";
        for($i=0;$i<sizeof($DelArr);$i++)
        {
            if($i==sizeof($DelArr)-1)
            {
                $sql.="'".$DelArr[$i]."'";
            }
            else
            {
                $sql.="'".$DelArr[$i]."',";
            }
        }
        $sql.=")";
        $db = connectdb();
        $db->query($sql);
        return $response->withJson(array('status'=>'success'));
    }
    
});

$app->post('/TblCsv', function ($request, $response){
    $db = connectdb();
    $db->select("TblCsv");
    return $response->withJson($db->result_array());
});

$app->get('/Csv', function ($request, $response){
    $db = connectdb();
    $db->select("TblCsv");
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=inquiry_list.csv');
    $output = fopen('php://output', 'w');
    fputcsv($output,['StoreURL','Email','Telephone']);
    foreach($db->result_array() as $data)
    {
        fputcsv($output,[$data['storeurl'],$data['email'],$data['telephone']]);
    }
    fclose($output);
});

$app->post('/Delete', function ($request, $response){
    $params = $request->getParsedBody();
    $db = connectdb();
    $db->delete('TblCsv',array("id"=> $params['id']) );
});
