<!DOCTYPE html>


<?php include("navBar.php");?>

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

<script>
$(function() {
    $('#show-blood-bank-data-btn').click(function(e) {
        e.preventDefault();
        console.log('i m here');
        
        $.ajax({
            type: 'POST',
            url: './backend/getAllBloodBanks.php',
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
</script>

</html>