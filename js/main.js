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

function logOut(){
    event.preventDefault();
    window.location.href='/index.php';
}

function navBarOnLoad(login, logout, home, showAllBloodBanks){
        $('.sign-in-btn').attr('hidden',!login);
        $('.log-out-btn').attr('hidden',!logout);
        $('.home-btn').attr('hidden',!home);
        $('.show-all-blood-bank-btn').attr('hidden',!showAllBloodBanks);
}

//This function is for sign in 
$(function() {
    $('#sign-in-btn').click(function(e) {
        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var function2call = 'signIn';
            var email = $('#sign-in-email').val();
            var signInType = $('#sign-in-type').val();
            var password = $('#sign-in-password').val();
            $.ajax({
                type: 'POST',
                url: './backend/controller.php',
                data: {
                    function2call: function2call,
                    data:{
                        email: email,
                        signInType: signInType,
                        password: password
                    }
                },
                success: function(data) {
                    if(data){
                        if(signInType == 'Hospital'){
                            window.location.href='/hospitalHome.php';
                        }else{
                            window.location.href='/receiverHome.php';
                        }
                        
                        console.log(data);
                        
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

//This function is for registration of users
$(function() {
    $('#registerUser').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var function2call = 'processUser';
            var name = $('#sign-up-name').val();
            var email = $('#sign-up-email').val();
            var bloodGroup = $('#blood-group').val();
            var gender = $('#gender').val();
            var age = $('#sign-up-age').val();
            var phoneNumber = $('#sign-up-phone').val();
            var password = $('#inputSignUpPassword').val();
            
            $.ajax({
                type: 'POST',
                url: './backend/controller.php',
                data: {
                    function2call:function2call,
                    data:{
                        name: name,
                        bloodGroup: bloodGroup,
                        gender:gender,
                        age:age,
                        email: email,
                        phoneNumber: phoneNumber,
                        password: password
                    }
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

//This function is for registration of hospitals
$(function() {
    $('#registerHospital').click(function(e) {

        var valid = this.form.checkValidity();

        if (valid) {
            e.preventDefault();
            var function2call = 'processHospitalUser';
            var hospitalName = $('#sign-up-hospital-name').val();
            var name = $('#sign-up-name').val();
            var email = $('#sign-up-email').val();
            var phoneNumber = $('#sign-up-phone').val();
            var password = $('#inputSignUpPassword').val();
            console.log(phoneNumber);

            $.ajax({
                type: 'POST',
                url: './backend/controller.php',
                data: {
                    function2call:function2call,
                    data:{
                        hospitalName: hospitalName,
                        name: name,
                        email: email,
                        phoneNumber: phoneNumber,
                        password: password
                    }
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

//This function is for trial
$(function() {
    $('#show-blood-bank-data-btn').click(function(e) {
        console.log('i m here');
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: './backend/controller.php',
            data: {
                function2call: "doSomething",
                dat: {

                }
            },
            success: function(data) {
                Swal.fire({
                    'title': 'Successful',
                    'text': data,
                    'type': 'success'
                })

            }
        });
    });
});

//This function is for retrieving hospital blood groups available
function getBloodGrpsForHospital(){
    var function2call = 'getAllBloodGrps';

    $.ajax({
        type: 'POST',
        url: './backend/controller.php',
        data:{
            function2call: function2call,
            data:{
                empty:'empty'
            }
        },
        success: function(data) {
            if (data) {
                console.log(data);
                var json = jQuery.parseJSON(data);
                
                var arr = [];
                arr.push({
                    BloodGroupName: 'Ap',
                    BloodGroup: 'A+',
                    Quantity: json.Ap
                });
                arr.push({
                    BloodGroupName: 'An',
                    BloodGroup: 'A-',
                    Quantity: json.An
                });
                arr.push({
                    BloodGroupName: 'Bp',
                    BloodGroup: 'B+',
                    Quantity: json.Bp
                });
                arr.push({
                    BloodGroupName: 'Bn',
                    BloodGroup: 'B-',
                    Quantity: json.Bn
                });
                arr.push({
                    BloodGroupName: 'Op',
                    BloodGroup: 'O+',
                    Quantity: json.Op
                });
                arr.push({
                    BloodGroupName: 'On',
                    BloodGroup: 'O-',
                    Quantity: json.On
                });
                arr.push({
                    BloodGroupName: 'ABp',
                    BloodGroup: 'AB+',
                    Quantity: json.ABp
                });
                arr.push({
                    BloodGroupName: 'ABn',
                    BloodGroup: 'AB-',
                    Quantity: json.ABn
                });
                //console.log(arr);
                var add = $('#hospital-blood-group-table');
                $.each(arr, function(index, value) {
                    var $newRow = $(`<tr>
                        <th scope="row">
                            <label for="blood-group-${value.BloodGroup}" class="form-label">${value.BloodGroup}</label>
                        </th>
                        <td>
                            <input type="number" id="${value.BloodGroupName}" class="form-control blood-group ${value.BloodGroupName}" value="${value.Quantity}"  readonly="true"/>
                        </td>
                    </tr>`);
                    add.append($newRow);
                });
            } else {
                console.log(data);
            }
        }
    });
}    

//This function is for editing blood bank details
$(function() {
    $('#edit-blood-bank-table').click(function(e){
        event.preventDefault();
        $( ".blood-group" ).attr("readonly",false);
        $("#save-blood-bank-table").attr("hidden",false);
        $("#edit-blood-bank-table").attr("hidden",true);
    });
});

//This function is for saving blood bank details
$(function(){
    $('#save-blood-bank-table').click(function(e){
        event.preventDefault();
        var function2call = 'saveBloodGrps';
        var json = {'Ap':$( ".Ap" ).val(),
                    'An':$( ".An" ).val(),
                    'Bp':$( ".Bp" ).val(),
                    'Bn':$( ".Bn" ).val(),
                    'Op':$( ".Op" ).val(),
                    'On':$( ".On" ).val(),
                    'ABp':$( ".ABp" ).val(),
                    'ABn':$( ".ABn" ).val()
                };
        var blood_grps = JSON.stringify(json);
        console.log(json);
        $( ".blood-group" ).attr("readonly",true);
        $("#save-blood-bank-table").attr("hidden",true);
        $("#edit-blood-bank-table").attr("hidden",false);
        $.ajax({
            type: 'POST',
            url: './backend/controller.php',
            data: {
                function2call: function2call,
                data:{
                    blood_grps:blood_grps
                }
            },
            success: function(data) {
                Swal.fire({
                    'title': 'Successfully Saved',
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
    });
});

//This function is for showing all blood banks data
$(function() {
    $('#show-blood-bank-data-btn').click(function(e) {
        e.preventDefault();
        console.log('i m here');
        var function2call = 'getAllBloodBanks';
        $.ajax({
            type: 'POST',
            url: './backend/getAllBloodBanks.php',
            data: {
                function2call: function2call,
                data:{
                    empty:'empty'
                }
            },
            success: function(data) {
                window.location.href='/showAllBloodBankData.php';
                console.log(data);
            },
            error: function(data) {
                Swal.fire({
                    'title': 'Errors',
                    'text': 'There were errors while saving the data.',
                    'type': 'error'
                })
            }
        });
    });
});