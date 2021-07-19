

$(function() {
    $('#edit-blood-bank-table').click(function(e){
        event.preventDefault();
        $( ".blood-group" ).attr("readonly",false);
        $("#save-blood-bank-table").attr("hidden",false);
        $("#edit-blood-bank-table").attr("hidden",true);
    });
});

$(function(){
    $('#save-blood-bank-table').click(function(e){
        event.preventDefault();
        var json = {'Ap':$( ".Ap" ).val(),'An':$( ".An" ).val()};
        json.push({'Ap':$( ".Ap" ).val()});
        json.push({'An':$( ".An" ).val()});
        json.push({'Bp':$( ".Bp" ).val()});
        json.push({'Bn':$( ".Bn" ).val()});
        json.push({'Op':$( ".Op" ).val()});
        json.push({'On':$( ".On" ).val()});
        json.push({'ABp':$( ".ABp" ).val()});
        json.push({'ABn':$( ".ABn" ).val()});
        var blood_grps = JSON.stringify(json);
        console.log(json);
        $( ".blood-group" ).attr("readonly",true);
        $("#save-blood-bank-table").attr("hidden",true);
        $("#edit-blood-bank-table").attr("hidden",false);
        $.ajax({
            type: 'POST',
            url: './backend/saveBloodGrps.php',
            data: {
                blood_grps:blood_grps
            },
            success: function(data) {
                Swal.fire({
                    'title': 'Successfully Saved',
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
    });
});