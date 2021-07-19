<!DOCTYPE html>

<?php include("navBarLogOut.php"); ?>
<!-- Body Starts Here -->

<body class="complete-body">
    <?php
    //login_success.php  
    session_start();
    if (isset($_SESSION["username"])) {
        echo '<h6>Login Success, Welcome - ' . $_SESSION["username"] . $_SESSION["usertype"] . '</h6>';
        echo '<br /><br /><a href="logout.php">Logout</a>';
    }
    ?>
    <div class="card-body" style="width: 24rem;">
        <h5 class="card-title">Blood Samples Table</h5>
        <form class="card-text">

            <table class="table table-hover" id="hospital-blood-group">
                <thead>
                    <tr>
                        <th scope="col">Blood Group</th>
                        <th scope="col">Quantity</th>
                    </tr>
                </thead>
                <tbody id="hospital-blood-group-table">
                    <form>
                        <fieldset disabled id="hospital-blood-group-fieldSet">
                            
                        </fieldset>
                    </form>
                </tbody>
            </table>
            <script>
                var obj = [{
                        BloodGroup: "Andrea",
                        Quantity: "Ely"
                    },
                    {
                        BloodGroup: "John",
                        Quantity: "Shaw"
                    },
                    {
                        BloodGroup: "Leslie",
                        Quantity: "Mac"
                    },
                    {
                        BloodGroup: "David",
                        Quantity: "Millr"
                    },
                    {
                        BloodGroup: "Rehana",
                        Quantity: "Rewa"
                    }
                ];
                var add = $('#hospital-blood-group-table');
                $.each(obj, function(index, value) {
                    var $newRow = $(`<tr>
                                        <th scope="row">
                                            ${value.BloodGroup}
                                        </th>
                                        <td>
                                            <input type="number" default="${value.Quantity}"/>
                                        </td>
                                    </tr>`);
                    add.append($newRow);
                });
            </script>
            <button type="submit" class="btn btn-primary" id="registerUser">Sign Up</button>
        </form>
    </div>
</body>
<!-- body ends here -->

</html>