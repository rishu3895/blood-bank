//This function redirects to hospitalRegistration page
function moveToHosReg() {
    event.preventDefault();
    window.location.href = "/hospitalRegistration.php";
}

//This function redirects to receiversRegistration page
function moveToRecReg() {
    event.preventDefault();
    window.location.href = '/receiversRegistration.php';
}

//This function redirects to home page on click of home
function moveToHome() {
    event.preventDefault();
    window.location.href = '/index.php';
}
//This function will be called when Request btn will be clicked without logging in
function sendBloodReq(){
    event.preventDefault();
    console.log('not logged');
    $('.sign-in-btn').click();
}
//This function will be called when Request btn will be clicked with user logged in 
function sendBloodRequ(){
    event.preventDefault();
    var valid = this.form.checkValidity();
    if(valid){
        console.log('logged');
    }

}
//This function is used to preventDefaults
function preventDefaults() {
    event.preventDefault();
}

//This functions logsOut the user
function logOut() {
    event.preventDefault();
    window.location.href = '/index.php';
}

//This function redirect to the allBloodGroup page
$(function () {
    $('#show-blood-bank-data-btn').click(function (e) {
        window.location.href = '/showAllBloodBankData.php';
        e.preventDefault();

    });
});

//This function sets the nav bar button according to the respective page
function navBarOnLoad(login, logout, home, showAllBloodBanks) {
    $('.sign-in-btn').attr('hidden', !login);
    $('.log-out-btn').attr('hidden', !logout);
    $('.home-btn').attr('hidden', !home);
    $('.show-all-blood-bank-btn').attr('hidden', !showAllBloodBanks);
}

//This function is for sign in 
$(function () {
    $('#sign-in-btn').click(function (e) {
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
                    data: {
                        email: email,
                        signInType: signInType,
                        password: password
                    }
                },
                success: function (data) {
                    if (data) {
                        if (signInType == 'Hospital') {
                            window.location.href = '/hospitalHome.php';
                        } else {
                            window.location.href = '/receiverHome.php';
                        }

                        console.log(data);

                    } else {
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
$(function () {
    $('#registerUser').click(function (e) {

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
                    function2call: function2call,
                    data: {
                        name: name,
                        bloodGroup: bloodGroup,
                        gender: gender,
                        age: age,
                        email: email,
                        phoneNumber: phoneNumber,
                        password: password
                    }
                },
                success: function (data) {
                    Swal.fire({
                        'title': 'Successful',
                        'text': data,
                        'type': 'success'
                    })

                },
                error: function (data) {
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
$(function () {
    $('#registerHospital').click(function (e) {

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
                    function2call: function2call,
                    data: {
                        hospitalName: hospitalName,
                        name: name,
                        email: email,
                        phoneNumber: phoneNumber,
                        password: password
                    }
                },
                success: function (data) {
                    Swal.fire({
                        'title': 'Successful',
                        'text': data,
                        'type': 'success'
                    })

                },
                error: function (data) {
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

//This function converts json into an array of blood groups and their quantities
function getBloodGroupArray(json) {
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
    return arr;
}
function addBloodGroupDetails(arr, selector) {
    $.each(arr, function (index, value) {
        var $newRow = $(`<tr>
            <th scope="row">
                <label for="blood-group-${value.BloodGroup}" class="form-label">${value.BloodGroup}</label>
            </th>
            <td>
                <input type="number" id="${value.BloodGroupName}" class="form-control blood-group ${value.BloodGroupName}" value="${value.Quantity}"  readonly="true"/>
            </td>
        </tr>`);
        selector.append($newRow);
    });
}
function createBloodGroupTable(a, email, HospitalName, selector) {
    var newTable = $(`<div class="card-body" style="width: 24rem;">
                        <h5 class="card-title" id="${email}">${HospitalName}</h5>
                        <form class="card-text">
                            <table class="table table-hover" id="hospital-blood-group">
                                <thead>
                                    <tr>
                                        <th scope="col">Blood Group</th>
                                        <th scope="col">Quantity</th>
                                    </tr>
                                </thead>
                                <tbody id="hospital-blood-group-table-${a}">
                                    
                                </tbody>
                            </table>
                    </div>`);
    selector.append(newTable);
}
//This function is for retrieving hospital blood groups available
function getBloodGrpsForHospital() {
    var function2call = 'getAllBloodGrps';

    $.ajax({
        type: 'POST',
        url: './backend/controller.php',
        data: {
            function2call: function2call,
            data: {
                empty: 'empty'
            }
        },
        success: function (data) {
            if (data) {
                var json = JSON.parse(data);
                var arr = getBloodGroupArray(json);
                var selector = $('#hospital-blood-group-table');
                addBloodGroupDetails(arr, selector);
            } else {
                console.log(data);
            }
        }
    });
}
//This function will create the request form
function createRequestForm(selector,hospitals,disable,onclickfunc){

    var newForm = $(`<div class="card-body" style="width: 24rem;">
                        <h5 class="card-title">Request for blood sample</h5>
                        <form class="card-text" >
                            <div class="mb-3">
                                <label for="hospital" class="form-label">Select Hospital</label>
                                <select class="form-select hospitals-list" aria-label="Default select example" required id="hospital-list" ${disable} >
                                    <option selected>Select</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="blood-group-list" class="form-label">Blood Group</label>
                                <select class="form-select blood-group-list" aria-label="Default select example" required id="blood-group-list" ${disable}>
                                    <option selected>Select</option>
                                    <option value="A+">A+</option>
                                    <option value="A-">A-</option>
                                    <option value="B+">B+</option>
                                    <option value="B-">B-</option>
                                    <option value="AB+">AB+</option>
                                    <option value=AB-">AB-</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="blood-quantity" class="form-label">Blood Quantity</label>
                                <input id="blood-quantity" class="form-control blood-quantity" required ${disable}/>
                            </div>
                            <button type="submit" class="btn btn-primary send-blood-request" id="sendBloodRequest" onclick="${onclickfunc}">Send Request</button>
                        </form>
                    </div>`);
    selector.append(newForm);

    var sel = $("#hospital-list");
    $.each(hospitals, function(index,value){
        var newOption = $(`<option value="${value}">${value}</option>`);
        sel.append(newOption);
    });

}
//This function is for editing blood bank details
$(function () {
    $('#edit-blood-bank-table').click(function (e) {
        event.preventDefault();
        $(".blood-group").attr("readonly", false);
        $("#save-blood-bank-table").attr("hidden", false);
        $("#edit-blood-bank-table").attr("hidden", true);
    });
});

//This function is for saving blood bank details
$(function () {
    $('#save-blood-bank-table').click(function (e) {
        event.preventDefault();
        var function2call = 'saveBloodGrps';
        var json = {
            'Ap': $(".Ap").val(),
            'An': $(".An").val(),
            'Bp': $(".Bp").val(),
            'Bn': $(".Bn").val(),
            'Op': $(".Op").val(),
            'On': $(".On").val(),
            'ABp': $(".ABp").val(),
            'ABn': $(".ABn").val()
        };
        var blood_grps = JSON.stringify(json);
        console.log(json);
        $(".blood-group").attr("readonly", true);
        $("#save-blood-bank-table").attr("hidden", true);
        $("#edit-blood-bank-table").attr("hidden", false);
        $.ajax({
            type: 'POST',
            url: './backend/controller.php',
            data: {
                function2call: function2call,
                data: {
                    blood_grps: blood_grps
                }
            },
            success: function (data) {
                Swal.fire({
                    'title': 'Successfully Saved',
                    'text': data,
                    'type': 'success'
                })

            },
            error: function (data) {
                Swal.fire({
                    'title': 'Errors',
                    'text': 'There were errors while saving the data.',
                    'type': 'error'
                })
            }
        });
    });
});


function handleAllJson(data,disable) {
    var json = JSON.parse(data);
    var hospitals = []; 
    var onclickfunc = '';
    //console.log(json);
    for (var a in json) {
        var email = json[a].email;
        var HospitalName = json[a].HospitalName;
        hospitals.push(HospitalName);
        var bloodGroupsAv = json[a].BloodGroupsAvailable;
        var selector = $('.complete-body');
        createBloodGroupTable(a, email, HospitalName, selector);

        var selector1 = $(`#hospital-blood-group-table-${a}`);
        var arr = getBloodGroupArray(JSON.parse(bloodGroupsAv));
        addBloodGroupDetails(arr, selector1);

    }
    if(disable == ''){
        onclickfunc = 'sendBloodRequ()';
    }else{
        onclickfunc = 'sendBloodReq()';
    }
    createRequestForm($('.complete-body'),hospitals,disable,onclickfunc);
}



//This function is for showing all blood banks data
function getAllBloodGrps(disable) {
    var function2call = 'getAllBloodBanks';
    $.ajax({
        type: 'POST',
        url: './backend/controller.php',
        data: {
            function2call: function2call,
            data: {
                empty: 'empty'
            }
        },
        success: function (data) {
            handleAllJson(data,disable);
        },
        error: function (data) {
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
            })
        }
    });
}

