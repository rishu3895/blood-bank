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


$(function() {
    $('#sign-in-btn').click(function(e) {
        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var email = $('#sign-in-email').val();
            var signInType = $('#sign-in-type').val();
            var password = $('#sign-in-password').val();
            $.ajax({
                type: 'POST',
                url: './backend/signIn.php',
                data: {
                    email: email,
                    signInType: signInType,
                    password: password
                },
                success: function(data) {
                    if(data){
                        console.log('Data');
                        
                    }else{
                        console.log('Email or Password wrong')
                    }
                }
            });
        } else {
            console.log('Something wrong');
        }
    });
});

$(function() {
    $('#registerUser').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var name = $('#sign-up-name').val();
            var email = $('#sign-up-email').val();
            var bloodGroup = $('#blood-group').val();
            var gender = $('#gender').val();
            var age = $('#sign-up-age').val();
            var phoneNumber = $('#sign-up-phone').val();
            var password = $('#inputSignUpPassword').val();
            
            $.ajax({
                type: 'POST',
                url: './backend/processUser.php',
                data: {
                    name: name,
                    bloodGroup: bloodGroup,
                    gender:gender,
                    age:age,
                    email: email,
                    phoneNumber: phoneNumber,
                    password: password
                },
                success: function(data) {
                    Swal.fire({
                        'title': 'Successful',
                        'text': data,
                        'type': 'success'
                    })

                },
                error: function(data) {
                    Swal.fire({
                        'title': 'Errors',
                        'text': 'There were errors while saving the data.',
                        'type': 'error'
                    })
                }
            });
        } else {
            console.log('Something wrong');
        }
    });
});

$(function() {
    $('#registerHospital').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var hospitalName = $('#sign-up-hospital-name').val();
            var name = $('#sign-up-name').val();
            var email = $('#sign-up-email').val();
            var phoneNumber = $('#sign-up-phone').val();
            var password = $('#inputSignUpPassword').val();
            console.log(phoneNumber);

            $.ajax({
                type: 'POST',
                url: './backend/process.php',
                data: {
                    hospitalName: hospitalName,
                    name: name,
                    email: email,
                    phoneNumber: phoneNumber,
                    password: password
                },
                success: function(data) {
                    Swal.fire({
                        'title': 'Successful',
                        'text': data,
                        'type': 'success'
                    })

                },
                error: function(data) {
                    Swal.fire({
                        'title': 'Errors',
                        'text': 'There were errors while saving the data.',
                        'type': 'error'
                    })
                }
            });
        } else {
            console.log('Something wrong');
        }
    });
});