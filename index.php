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
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Sign in
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
    <div class="row">

        <div class="col blood-bank-image" style="width:60vw; height:80vh;">

        </div>
        <div class="col card-body  d-flex justify-content-center align-items-center" style="max-width: 24rem; ">
            <div class="body-registration">
                <h5 class="card-title">Registration</h5>
                <form class="card-text">
                    <div class="mb-3">
                        <label for="sign-up-age" class="form-label"></label>
                        <button type="submit" class="btn btn-primary" onclick="moveToHosReg()">Hospitals</button>
                    </div>
                    <div class="mb-3">
                        <label for="sign-up-age" class="form-label"></label>
                        <button type="submit" class="btn btn-primary" onclick="moveToRecReg()">Receivers</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
<!-- body ends here -->

</html>