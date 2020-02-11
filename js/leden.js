// leden functies
function getLid(id) {
    return $.getJSON("ajax/get.lid.php", { "id": id });
}

function saveLid(id, naam, email, telefoon) {
    return $.getJSON("ajax/save.lid.php", { "id": id, "naam": naam, "email": email, "telefoon": telefoon });
}

$(document).ready(function(){
    // editlid
    $('.editlid').click(function () {
        // id van aan geklikte row
        let id = $(this).closest('tr').data('id');
        $('#staticLidId').val(id);

        // netjes wachten tot het klaar is
        getLid(id).done(function(info) {
            $('#inputNaam').val(info['naam']);
            $('#inputTelefoon').val(info['telefoon']);
            $('#inputEmail').val(info['email']);
            $('#editLedenModal').modal('show');
        });
    });

    $('#modelEditLedenSave').click(function () {
        let id = $('#fromEditLedenModal #staticLidId').val();
        let naam = $('#fromEditLedenModal #inputNaam').val();
        let telefoon = $('#fromEditLedenModal #inputTelefoon').val();
        let email = $('#fromEditLedenModal #inputEmail').val();

        saveLid(id, naam, email, telefoon).done(function(info) {
            if (!isNaN(info)) {
                $('#editLedenModal').modal('hide');

                // dirty!
                location.reload();
            }
        })
    });

    // dellid
    $('.dellid').click(function () {
        // id van aan geklikte row
        let id = $(this).closest('tr').data('id');
        getLid(id).done(function(info) {
            bootbox.confirm({
                message: "Weet je zeker dat je <strong>" + info['naam'] + "</strong> wilt verwijderen?",
                buttons: {
                    confirm: {
                        label: 'Ja',
                        className: 'btn-danger'
                    },
                    cancel: {
                        label: 'Nee',
                        className: 'btn-success'
                    }
                },
                callback: function (result) {
                    if (result) {
                        alert('delete!');
                    }
                }
            });
        });
    });
});