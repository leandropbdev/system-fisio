
//----=== VALIDAÇÃO DOS CAMPOS OBRIGATORIOS ------

$(document).ready(function () {
    $("#btn_cad_agendamento").click(function (e) {
        //  alert("Ola mundo");



        var msg = "";
        let fisdias_semanaio = $("#dias_semana").val();




        let nome_paciente = $("#pesquisa").val();
        let horarioInicio = $("#horario_inicio").val();
        let horarioFinal = $("#horario_final").val();
        let profissional = $("#profissional").val();
        let procedimento = $("#procedimento").val();

        // alert(nome_paciente)


        if (nome_paciente == "" || horarioInicio == "" || horarioFinal == "" || profissional == "" || procedimento == "") {



            e.preventDefault()

            if (horarioInicio == "") {

                let alert_horarioInicial = document.querySelector("#alert_horarioInicio");
                alert_horarioInicial.innerHTML = 'Obrigatorio.';
                alert_horarioInicial.style.color = 'red';

                msg = 'Preencha o horario inicial.';


            } else if (horarioFinal == "") {

                let alert_horarioFinal = document.querySelector("#alert_horarioFinal");
                alert_horarioFinal.innerHTML = ' Obrigatorio.';
                alert_horarioFinal.style.color = 'red';

                msg = 'Preencha o horario final';



            } else if (profissional == "") {

                let alert_profissional = document.querySelector("#alert_profissional");
                alert_profissional.innerHTML = ' Obrigatorio.';
                alert_profissional.style.color = 'red';

                msg = 'Selecione o profissional.';


            } else if (nome_paciente == "") {

                let alert_nomePaciente = document.querySelector("#alert_nomePaciente");
                alert_nomePaciente.innerHTML = 'Obrigatorio.';
                alert_nomePaciente.style.color = 'red';

                msg = 'Digite o nome do paciente.';


            } else if (procedimento == "") {

                let alert_procedimento = document.querySelector("#alert_procedimento");
                alert_procedimento.innerHTML = 'Obrigatorio.';
                alert_procedimento.style.color = 'red';

                msg = 'Selecione o procedimento.';


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


            //====== SCRIPT PARA MANDA OS DADOS PARA A PAGE CADASTRO =====

            // alert("Ola")
            var form = document.querySelector("#form");
            var formData = new FormData(form);

            $.ajax({
                url: "View/CadastroAgendamento/cadastro-agendamento.php",
                type: 'POST',
                data: formData,

                success: function (mensagem) {
                    $('#mensagem-recuperar').text('');
                    $('#mensagem-recuperar').removeClass()
                    if (mensagem.trim() == "Paciente agendado com sucesso") {

                        const Toast = Swal.mixin({
                            toast: true,
                            width: '380',
                            position: 'top',
                            background: '#269e05',
                            color: 'white',
                            showConfirmButton: false,
                            timer: 25000,
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


                    }else if (mensagem.trim() == "Novo dia da semana adicionado.") {

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



                    }else if(mensagem.trim() == "Novo agendamento realizado."){

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
                            width: '380',
                            position: 'top',
                            background: 'red',
                            color: 'white',
                            showConfirmButton: false,
                            timer: 2000,
                            timerProgressBar: true,
                            didOpen: (toast) => {
                                toast.addEventListener('mouseenter', Swal.stopTimer)
                                toast.addEventListener('mouseleave', Swal.resumeTimer)
                            }
                        })

                        // Toast3.fire({
                        //     icon: 'error',
                        //     color: 'white',
                        //     title: mensagem
                        // })

                        Toast3.fire({
                            icon: 'warning',
                            title: '<span style="font-size:14px">' + mensagem + '</span>'
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