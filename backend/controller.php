<?php
require_once('processRequests.php');
?>
<?php
    if(isset($_POST['function2call']) && !empty($_POST['function2call'])) {
        $function2call = $_POST['function2call'];
        if(isset($_POST['data']) && !empty($_POST['data'])){
            $data = $_POST['data'];
            switch($function2call) {
                case 'signIn'               : signIn($data)              ;break;
                case 'processUser'          : processUser($data)         ;break;
                case 'processHospitalUser'  : processHospitalUser($data) ;break;
                case 'saveBloodGrps'        : saveBloodGrps($data)       ;break;
                case 'getAllBloodGrps'      : getAllBloodGrps($data)     ;break;
                case 'getAllBloodBanks'     : getAllBloodBanks($data)    ;break;
            }
        }
        
    }
?>