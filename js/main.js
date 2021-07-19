function moveToHosReg() {
    event.preventDefault();
    window.location.href="/hospitalRegistration.php";
}

function moveToRecReg() {
    event.preventDefault();
    window.location.href='/receiversRegistration.php';
}

function moveToHome(){
    event.preventDefault();
    window.location.href='/index.php';
}

function preventDefaults(){
    event.preventDefault();
}
function validateHospitalSignUp(){
    event.preventDefault();
    var hosName = document.hospitalSignUp.HospitalName;
    var name = document.hospitalSignUp.Name;
    var email = document.hospitalSignUp.Email;
    var inpPass = document.hospitalSignUp.inputSignUpPassword;
    var confirmPass = document.hospitalSignUp.inputConfirmPassword;
    if( hosName.value == "" ){
        alert("Please provide hospital name");
        hoName.focus();
        return false;
    }
    if( name.value == "" ) {
       alert( "Please provide your name!" );
       name.focus() ;
       return false;
    }
    if( email.value == "" ) {
        alert( "Please provide your Email!" );
        email.focus() ;
        return false;
    }
    if( inpPass.value == ""){
        alert("Please provide your password!");
        inpPass.focus();
        return false;
    }
    if( confirmPass.value == ""){
        alert("Please provide confirm password!");
        confirmPass.focus();
        return false;
    }
    if( inpPass.value.length < 8){
        alert("The length of password should be 8 characters or more");
        inpPass.value = "";
        confirmPass.value = "";
        inpPass.focus();
        return false;
    }
    if( inpPass.value != confirmPass.value){
        alert("Passwords do not Match, Please try again");
        inpPass.value = "";
        confirmPass.value = "";
        inpPass.focus() ;
        return false;
    }
    return( true );
}

function validateReceiversSignUpInputs(){

}