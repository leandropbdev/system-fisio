$(document).ready(function () {
    $(document).on('click', '.btn_delete', function () {



        const codPaciente = $(this).attr("codPaciente")
        const codPacienteDel = document.querySelector("#codPacienteDel")
        codPacienteDel.value = codPaciente

        const nomePaciente = $(this).attr("nomePaciente")
        const modal_title = document.querySelector(".modal-title")
        modal_title.innerHTML = "Paciente " + nomePaciente

        // alert(codpeciente);






    });
});


$(document).ready(function () {
    $('.btn-del').click(function (e) {
        // alert("Ola mundo")
        const codPacienteDel = document.querySelector("#codPacienteDel")


        var dados = {
            codPacienteDel: codPacienteDel.value
        }
        $.post('View/Deletes/delete-paciente.php', dados, function (retorna) {
             //$('#Modal-confirm').modal('show')
            $('.body-teste').fadeIn().html(retorna);


            const Toast = Swal.mixin({
                toast: true,
                width: '380',
                position: 'top',
                background: '#269e05',
                color: 'white',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: '<span style="font-size:14px">'+ retorna +'</span>'
            })

            setTimeout(function () {                
                window.location.reload("#")
            }, 2000);



        })


    });
});
