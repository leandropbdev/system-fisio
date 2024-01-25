
//* == Pegar o codPeciente e manda para o modal de cadastro da nova avaliação ===
$(document).ready(function () {
    $(document).on('click', '.btn_nova_av', function () {        
       
        const codPaciente = $(this).attr("codPaciente");      
        const codPacienteAv = document.querySelector("#codPaciente");
        codPacienteAv.setAttribute('value',codPaciente );
    })

})





//*----=== Pegando a ação do botão cadastrar AV ------

$(document).ready(function () {
    $("#btn_cadastro_av").click(function (e) {        


        //*----=== VALIDAÇÃO DOS CAMPOS OBRIGATORIOS ------
        var msg = "";
        let fisio = $("#fisio").val();      

        if (fisio == 0 ) {

            e.preventDefault()

            if (fisio == 0) {
                msg = 'Selecione a Fisioterapeuta.';
                let alert_fisio = document.querySelector("#alert_fisio")
                alert_fisio.innerHTML = "Selecione uma Fisioterapeuta";
                alert_fisio.style.color = 'red';


            }
           

            const Toast = Swal.mixin({
                toast: true,
                width: '380',
                position: 'top',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'warning',
                title: '<span style="font-size:14px">' + msg + '</span>'
            })

        } else {
            msg = '';
            let alert_fisio = document.querySelector("#alert_fisio")
            alert_fisio.innerHTML = "";
            alert_fisio.style.color = 'green';

            //*====== SCRIPT PARA MANDA OS DADOS PARA A PAGE CADASTRO =====

            //  alert("Ola")
            var form = document.querySelector("#form");
            var formData = new FormData(form);

            $.ajax({
                url: "View/CadastrosPaciente/cadastro-paciente.php",
                type: 'POST',
                data: formData,

                success: function (mensagem) {
                    $('#mensagem-recuperar').text('');
                    $('#mensagem-recuperar').removeClass()
                    if (mensagem.trim() != "") {
                        //$('#btn-fechar-rec').click();					
                        // $('#email-recuperar').val('');
                        // $('#mensagem-recuperar').addClass('text-success')
                        // $('#mensagem-recuperar').text('Cadastrado com sucesso')


                        // const Toast = Swal.mixin({
                        //     toast: true,
                        //     position: 'top',
                        //     background: '#269e05',
                        //     color: 'white',
                        //     showConfirmButton: false,
                        //     timer: 2000,
                        //     timerProgressBar: true,
                        //     didOpen: (toast) => {
                        //         toast.addEventListener('mouseenter', Swal.stopTimer)
                        //         toast.addEventListener('mouseleave', Swal.resumeTimer)
                        //     }
                        // })

                        // Toast.fire({
                        //     icon: 'success',
                        //     color: 'white',
                        //     title: mensagem
                        // })

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
                            title: '<span style="font-size:14px">Cadastrado com sucesso</span>'
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
                            timer: 5000,
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



        }





    })
})