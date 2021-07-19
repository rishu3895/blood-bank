<!DOCTYPE html>

<head>
    <!-- metadata files -->
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css files -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="css/main.css">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>


    <script src="js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/main.js" type="text/javascript"></script>
</head>

<nav class="navbar navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand">
            <img class="logo blood-logo" src="./images/bloodBankIcon.png" alt="blood bank icon" />
        </a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary sign-in-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Sign in
            </button>
            <button type="button" class="btn btn-primary home-btn" onclick="moveToHome()">
                Home
            </button>
        </form>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Sign In</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="sign-in-email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="sign-in-email" aria-describedby="emailHelp" placeholder="example@mail.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="sign-in-type" class="form-label">Sign In Type</label>
                            <select class="form-select" aria-label="Default select example" id="sign-in-type" required>
                                <option selected>Select</option>
                                <option value="Hospital">Hospital</option>
                                <option value="Receiver">Receiver</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="sign-in-password" class="form-label" placeholder="Password">Password</label>
                            <input type="password" id="sign-in-password" class="form-control" aria-describedby="passwordHelpInline" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="sign-in-btn">Sign In</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal End -->
</nav>
<!-- nav ends -->

<script>
    $.ajax({
        type: 'POST',
        url: './backend/getAllBloodBanks.php',
        success: function(data) {
            if (data) {

                var json = jQuery.parseJSON(data);
                console.log(json);
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
                var $newTable = $(`<div class="card-body" style="width: 24rem;">
                                        <h5 class="card-title">${HospitalName}</h5>
                                        <form class="card-text">
                                            <table class="table table-hover" id="hospital-blood-group">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Blood Group</th>
                                                        <th scope="col">Quantity</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="hospital-blood-group-table">
                                                    
                                                </tbody>
                                            </table>

                                            <button type="submit" class="btn btn-primary" id="edit-blood-bank-table">Edit</button>
                                            <button type="submit" class="btn btn-primary" id="save-blood-bank-table" hidden="true">Save</button>
                                        </form>
                                    </div>`);
                var add = $('#hospital-blood-group-table');
                $.each(arr, function(index, value) {
                    var $newRow = $(`
                    <tr>
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
</script>

</html>