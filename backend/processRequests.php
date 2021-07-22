<?php
    
    // To send database request
    function sendRequest($sql){
        $db_host = "localhost";
        $db_user = "root";
        $db_pass = "abc@123";
        $db_name = "Users";
        $db = new PDO('mysql:host='.$db_host.';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db->prepare($sql);
    }    
    // Sign IN
    function signIn($data){
        session_start();
        $email 			= $data['email'];
        $signInType     = $data['signInType'];
        $password 		= $data['password'];
        $sql = "";
        if($signInType == "Hospital"){
            $sql = "SELECT id,email,password FROM `HospitalUsers` WHERE email=? LIMIT 1";
        }else{
            $sql = "SELECT id,email,password FROM `ReceiverUsers` WHERE email=? LIMIT 1";
        }
        
        $stmt = sendRequest($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $result['id'];
        if(!empty($result)){
            if($result['password']==$password){
                $_SESSION['username'] = $email;
                $_SESSION['usertype'] = $signInType;
                $_SESSION['id'] =  $result['id'];
                echo ' You are logged in ';
                return true;
            }else{
                return false;
            }
        }else{
            echo 'The User Id was wrong';
            return false;
        }
    }
    function checkUser($email, $signInType){
        $sql = "";
        if($signInType == "Hospital"){
            $sql = "SELECT email,password FROM `HospitalUsers` WHERE email=? LIMIT 1";
        }else{
            $sql = "SELECT email,password FROM `ReceiverUsers` WHERE email=? LIMIT 1";
        }
        
        $stmt = sendRequest($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if(empty($result)){
            return true;
        }else{
            return false;
        }
    }
    // Register hospital User
    function processHospitalUser($data){
        
        $hospitalName 	= $data['hospitalName'];
        $name 			= $data['name'];
        $email 			= $data['email'];
        $password 		= $data['password'];
        $phonenumber	= $data['phoneNumber'];
        $bloodGrps = array('Ap' => "0" , 'An' => "0", 'Bp' => '0','Bn'=>'0','Op'=>'0','On'=>'0','ABp'=>'0','ABn'=>'0');
        
        if(!checkUser($email,"Hospital")){
            echo "User Already exists, Please change the email";
            return null;
        }

        $json = json_encode($bloodGrps);
        $sql = "INSERT INTO HospitalUsers (HospitalName,name, email, password,  PhoneNumber, BloodGroupsAvailable) VALUES (?,?,?,?,?,?)";
        
        $stmtinsert = sendRequest($sql);
        $result = $stmtinsert->execute([$hospitalName, $name, $email, $password,$phonenumber,$json]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }
    // Register user
    function processUser($data){
        $bloodGroup     = $data['bloodGroup'];
        $gender         = $data['gender'];
        $age            = $data['age'];
        $name           = $data['name'];
        $email          = $data['email'];
        $password 		= $data['password'];
        $phonenumber	= $data['phoneNumber'];
        
        if(!checkUser($email,"Receiver")){
            echo "User Already exists, Please change the email";
            return null;
        }

        $sql = "INSERT INTO ReceiverUsers(name, email, password, age, bloodGroup, PhoneNumber, gender) VALUES (?,?,?,?,?,?,?)";
        $stmt = sendRequest($sql);
        $result = $stmt->execute([$name,$email,$password,$age,$bloodGroup,$phonenumber,$gender]);
        if($result){
            echo 'Successfully saved.';
        }else{
            echo 'There were errors while saving the data.';
        }
    }
    // Retrieve blood groups of one hospital
    function getAllBloodGrps($data){
        session_start();
        $email 	= $_SESSION["username"];
        $sql = "SELECT email, BloodGroupsAvailable FROM `HospitalUsers` WHERE email=? LIMIT 1";
        $stmt = sendRequest($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if(!empty($result)){
            $_SESSION['username'] = $email;
            echo $result['BloodGroupsAvailable'];
        } else {
            echo 'No data';
            return false;
        }
    }
    //Save blood bank details
    function saveBloodGrps($data){
        session_start();
        $email 			= $_SESSION['username'];
        $bloodGrps      = $data['blood_grps'];
        $sql = "UPDATE HospitalUsers SET BloodGroupsAvailable=? WHERE email=?";
        $stmt = sendRequest($sql);
        $result = $stmt->execute([$bloodGrps,$email]);
        
        if($result){
            return true;
        } else {
            echo 'No data';
            return false;
        }
    }
    // Retrieve all blood bank details
    function getAllBloodBanks($data){
        $sql = "SELECT id,email,HospitalName, BloodGroupsAvailable FROM HospitalUsers";
        $stmt = sendRequest($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if(!empty($result)){
            echo json_encode($result);
        } else {
            echo 'No data';
            return false;
        }
    }
    // Send Blood Request
    function sendBloodReq($data){
        session_start();
        $bloodGroup     = $data['bloodGrp'];
        $hospitalId   = $data['hospitalName'];
        $bloodQty       = $data['bloodQty'];
        $userId           = $_SESSION['id'];
        
        if(empty($userId)){
            return ;
        }

        $sql = "INSERT INTO `BloodSampleRequests`(`HospitalUser`, `ReceiverUser`, `BloodType`, `Quantity`) VALUES (?,?,?,?)";
        $stmt = sendRequest($sql);
        $result = $stmt->execute([$hospitalId, $userId, $bloodGroup, $bloodQty]);
        if($result){
            echo 'Request Successfully sent.';
        }else{
            echo 'There were errors while requesting the blood group.';
        }
    }
    function getBloodReqReceiverData($data){
        $sql = "SELECT `id`, `name`, `email`,`bloodGroup`, `PhoneNumber` FROM `ReceiverUsers` WHERE id IN (".implode(',',$data).")";
        $stmt = sendRequest($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    function getBloodReq($data){
        session_start();
        $hospitalId = $_SESSION['id'];
        
        $sql = "SELECT * FROM `BloodSampleRequests` WHERE HospitalUser=?";
        $stmt = sendRequest($sql);
        $stmt->execute([$hospitalId]);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $userIds =  array(); 
        foreach ($result as $value) {
            array_push($userIds,$value['ReceiverUser']); 
        }
        $result2 = getBloodReqReceiverData($userIds);

        $finalReturnVal = array();
        foreach ($result2 as $value) {
            $recId = $value['id'];
            $recName = $value['name'];
            $recEmail  = $value['email'];
            foreach ($result as $val) {
                if($val['ReceiverUser'] == $recId){
                    
                    $row = array('recId' => $recId, 
                                'recEmail' => $recEmail, 
                                'recName' => $recName, 
                                'recBloodGrp' => $val['BloodType'], 
                                'recBloodQuantity' => $val['Quantity']);
                    array_push($finalReturnVal, $row);
                }
            }
        }

        echo json_encode($finalReturnVal);
        
    }