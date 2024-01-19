







//----=== EDITAR A AVALIAÇÃO DO PACIENTE ------

$(document).ready(function () {
    $(".btn_edit_avaliacao").click(function (e) {
        //   alert("Ola mundo");


    
            //====== SCRIPT PARA MANDA OS DADOS PARA A PAGE CADASTRO =====

            // alert("Ola")
            var form = document.querySelector(".form_ed");
            var formData = new FormData(form);

            $.ajax({
                url: "View/EditarPaciente/editar-paciente.php",
                type: 'POST',
                data: formData,

                success: function (mensagem) {
                    $('#mensagem-recuperar').text('');
                    $('#mensagem-recuperar').removeClass()
                    if (mensagem.trim() == "Alteração realizado com sucesso") {
                       

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
                            title: '<span style="font-size:14px">' + mensagem + '</span>'
                        })

                        setTimeout(function () {

                            $('#changeoffice').modal('hide')
                            window.location.reload("#")
                        }, 2000);


                    } else {
                        const Toast3 = Swal.mixin({
                            toast: true,
                            position: 'top',
                            background: 'red',
                            color: 'white',
                            showConfirmButton: false,
                            // timer: 5000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        Toast3.fire({
                            icon: 'error',
                            color: 'white',
                            title: mensagem
                        })

                        // setTimeout(function () {

                        //     $('#changeoffice').modal('hide')
                        //     window.location.reload("#")
                        // }, 2000);

                    }


                },

                cache: false,
                contentType: false,
                processData: false,

            });



        





    })
})