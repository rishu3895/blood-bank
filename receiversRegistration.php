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
            <img class="logo blood-logo" src="./images/bloodBankIcon.png" />
        </a>
        <form class="d-flex">
            <button type="button" class="btn btn-primary sign-in-btn" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Sign in
            </button>
            <button type="button" class="btn btn-primary home-btn" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="moveToHome()">
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
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="example@mail.com">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label" placeholder="Password">Password</label>
                            <input type="password" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal End -->
</nav>
<!-- nav ends -->

<!-- Body Starts Here -->

<body class="complete-body">
    <div class="card-body" style="width: 24rem;">
        <h5 class="card-title">Sign Up for receivers</h5>
        <form class="card-text">
            <div class="mb-3">
                <label for="sign-up-name" class="form-label">Name</label>
                <input type="text" class="form-control" name="Name" id="sign-up-name" aria-describedby="nameHelp" required>
            </div>
            <div class="mb-3">
                <label for="bloodGroup" class="form-label">Blood Group</label>
                <select class="form-select" aria-label="Default select example" required id="blood-group">
                    <option selected>A+</option>
                    <option value="1">A-</option>
                    <option value="2">B+</option>
                    <option value="3">B-</option>
                    <option value="4">AB+</option>
                    <option value="5">AB-</option>
                    <option value="4">O+</option>
                    <option value="5">O-</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" id="gender" required>
                    <option selected>Gender</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="sign-up-age" class="form-label" >Age</label>
                <input type="number" class="form-control" id="sign-up-age">
            </div>
            <div class="mb-3">
                <label for="sign-up-phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="sign-up-phone" pattern="[0-9]{10}">
            </div>
            <div class="mb-3">
                <label for="sign-up-email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="Email" id="sign-up-email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">Your email address will be used as username while logging in. </div>
            </div>
            <div class="mb-3">
                <div class="col-auto">
                    <label for="inputSignUpPassword" class="form-label" placeholder="Password">Password</label>
                    <input type="password" name="inputSignUpPassword" id="inputSignUpPassword" class="form-control" aria-describedby="passwordHelpInline" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required>
                </div>
                <div class="col-auto">
                    <span id="passwordHelpInline" class="form-text">
                        Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="registerUser">Sign Up</button>
        </form>
    </div>

</body>
<!-- body ends here -->
<script type="text/javascript">
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
                    url: 'processUser.php',
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
</script>
</html>