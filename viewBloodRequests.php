<!DOCTYPE html>
<?php include("navBar.php"); ?>
<!-- Body Starts Here -->

<body class="complete-body view-blood-requests-class" id="view-blood-requests" onload="navBarOnLoad(false,true,false,false);addHomeBtn();viewBloodRequests();">
  <div class="card-body" style="width: 24rem;">
    <h5 class="card-title">Blood Requests</h5>
    <form class="card-text">
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Receiver's Name</th>
            <th scope="col">Receiver's email</th>
            <th scope="col">Blood Group Type</th>
            <th scope="col">Blood Quantity</th>
          </tr>
        </thead>
        <tbody class="hospital-blood-group-requests">

        </tbody>
      </table>
  </div>
</body>
<!-- body ends here -->


</html>