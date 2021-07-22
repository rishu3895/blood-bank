<!DOCTYPE html>
<?php include("navBar.php"); ?>
<!-- Body Starts Here -->
<body class="complete-body" onload="navBarOnLoad(false,true,false,false);getBloodGrpsForHospital();addViewRequestBtn()">
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
                    <form id="hospital-blood-group-fieldSet">
                    </form>
                </tbody>
            </table>
            <button type="submit" class="btn btn-primary" id="edit-blood-bank-table">Edit</button>
            <button type="submit" class="btn btn-primary" id="save-blood-bank-table" hidden="true">Save</button>
        </form>
    </div>
</body>
<!-- body ends here -->


</html>