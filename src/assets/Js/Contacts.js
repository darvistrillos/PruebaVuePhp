const $ = require('jquery')
// Lo declaramos globalmente
window.$ = $

$(document).ready(function () {
    //*************************/
    //**/ Limpia los campos **/
    function LimpiaForm() {
        $('#TxtNombre').val('');
        $('#TxtEmail').val('');
        $('#TxtDepartamento').val('');
        $('#TxtMunicipio').val('');


    }
    ///////////////////////
    // Guardar Contacto //
    //////////////////////
    $('#BtnGuardar').click(function () {

        jNombre = $('#TxtNombre').val();
        jEmail = $('#TxtEmail').val();
        jDepartamento = $('#TxtDepartamento').val();
        jMunicipio = $('#TxtMunicipio').val();
        if (jDepartamento == '' || !jDepartamento) {
            $('#modalguarda2').trigger('click');
            $('#TxtDepartamento').focus();
            return false;
        }
        if (jMunicipio == '' || !jMunicipio) {
            $('#modalguarda3').trigger('click');
            $('#TxtMunicipio').focus();
            return false;
        }
        if (jNombre == '') {
            $('#modalguarda4').trigger('click');
            $('#TxtNombre').focus();
            return false;
        }
        if ($('#TxtEmail').val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
            $('#modalguarda7').trigger('click');
            $('#TxtEmail').focus();
            return false;

        }
        if (jEmail == '') {

            $('#modalguarda5').trigger('click');
            $('#TxtEmail').focus();
            return false;
        }

        $.ajax({
            url: 'http://localhost/Custumer.php',
            dataType: 'json',
            cache: false,
            type: 'POST',
            data: {
                jNombre: jNombre,
                jEmail: jEmail,
                jDepartamento: jDepartamento,
                jMunicipio: jMunicipio
            },
            success: function (datos) {
                $('.modalguarda1').trigger('click');

                LimpiaForm();
            }
        });
    });
});

