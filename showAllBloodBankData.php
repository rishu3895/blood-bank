<!DOCTYPE html>

<?php include("./pages/navBar.php");?>

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