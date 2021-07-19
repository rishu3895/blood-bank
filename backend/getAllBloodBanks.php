<?php
require_once('config.php');
?>
<?php
session_start();
if(isset($_POST)){
	$email 			= $_SESSION['username'];
    $sql = "SELECT email,HospitalName, BloodGroupsAvailable FROM HospitalUsers";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if(!empty($result)){
        
        // $jsonIterator = new RecursiveIteratorIterator(
        //     new RecursiveArrayIterator(json_decode($json, TRUE)),
        //     RecursiveIteratorIterator::SELF_FIRST);
        // $finVal 
        // foreach ($jsonIterator as $key => $val) {
        //     echo "$key => $val";
        // }
        echo $result['BloodGroupsAvailable'];
        return $result['BloodGroupsAvailable'];
    } else {
        echo 'No data';
        return false;
    }
}else{
    echo 'No data';
    return false;
} 
?>