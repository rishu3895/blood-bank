<!DOCTYPE html>

<?php include("navBar.php");?>
<!-- Body Starts Here -->
<body class="complete-body">
    <div class="card-body" style="width: 24rem;">
        <h5 class="card-title">Sign Up for Hospitals</h5>
        <form class="card-text" name="hospitalSignUp">
            <div class="mb-3">
                <label for="sign-up-hospital-name" class="form-label">Hospital Name</label>
                <input type="text" class="form-control" name="HospitalName" id="sign-up-hospital-name" aria-describedby="nameHelp" required>
            </div>
            <div class="mb-3">
                <label for="sign-up-name" class="form-label">Name</label>
                <input type="text" class="form-control" name="Name" id="sign-up-name" aria-describedby="nameHelp" required>
            </div>
            <div class="mb-3">
                <label for="sign-up-email" class="form-label">Email address</label>
                <input type="email" class="form-control" name="Email" id="sign-up-email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text">Your email address will be used as username while logging in. </div>
            </div>
            <div class="mb-3">
                <label for="sign-up-phone" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" name="phone" id="sign-up-phone" pattern="[0-9]{10}">
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
            <button type="submit" id="registerHospital" class="btn btn-primary">Sign Up</button>
        </form>
    </div>

</body>
<!-- body ends here -->



</html>