<!DOCTYPE html>

<?php include("navBarHome.php");?>
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
                <label for="gender" class="form-label">Gender</label>
                <select class="form-select" aria-label="Default select example" id="gender" required>
                    <option selected>Gender</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
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
</html>