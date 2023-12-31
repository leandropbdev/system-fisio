
// FUNÇÕES PARA VALIDAR AÇÃO DO BOTAO SE O PACIENTE TEM OU NÃO EXAMES, HABILITAR E DESABILITAR O CAMPO DECRICAO COM O CKECKBOX ==
let exameSim = document.querySelector("#exameSim");
let exameNao = document.querySelector("#exameNao");
let desc_exame = document.querySelector("#desc_exame");

function exmeSim() {
    if (exameSim.checked) {

        exameNao.checked = false;

        $("#desc_exame").prop('disabled', false);

    } else {
        $("#desc_exame").prop('disabled', true);
    }
}

function exmeNao() {
    if (exameNao.checked) {

        exameSim.checked = false;

        $("#desc_exame").prop('disabled', true);

    }
}

// ==== SE O PACIENTE ESTA USANDO OU NÃO MEDICAMENTO ====
let medicamentoSim = document.querySelector("#medicamentoSim");
let medicamentoNao = document.querySelector("#medicamentoNao");
let desc_medicamento_paciente = document.querySelector("#desc_medicamento_paciente");

function medSim() {

    if (medicamentoSim.checked) {
        medicamentoNao.checked = false;
        $("#desc_medicamento_paciente").prop('disabled', false);
    } else {
        $("#desc_medicamento_paciente").prop('disabled', true);
    }
}
function medNao() {
    if (medicamentoNao.checked) {
        medicamentoSim.checked = false;
        $("#desc_medicamento_paciente").prop('disabled', true);

    }
}

// ==== SE O PACIENTE TEM CIRURGIA  OU NÃO MEDICAMENTO PARA ATIVAR OU DESATIVA O CAMPO DESCRIÇÃO ====
let cirurgiaSim = document.querySelector("#cirurgiaSim");
let cirurgiaNao = document.querySelector("#cirurgiaNao");
let desc_cirurgia_paciente = document.querySelector("#desc_cirurgia_paciente");

function ciruSim() {

    if (cirurgiaSim.checked) {
        cirurgiaNao.checked = false;
        $("#desc_cirurgia_paciente").prop('disabled', false);
    } else {
        $("#desc_cirurgia_paciente").prop('disabled', true);
    }
}
function ciruNao() {
    if (cirurgiaNao.checked) {
        cirurgiaSim.checked = false;
        $("#desc_cirurgia_paciente").prop('disabled', true);

    }
}



//----=== VALIDAÇÃO DOS CAMPOS OBRIGATORIOS ------

$(document).ready(function () {
    $("#btn_cadstro").click(function (e) {
        // alert("Ola mundo");



        var msg = "";
        let fisio = $("#fisio").val();
        let nome_paciente = $("#nome_paciente").val();
        let data_nasc_paciente = $("#data_nasc_paciente").val();
        let sexo_paciente = $("#sexo_paciente").val();

        if (fisio == 0 || nome_paciente == "" || data_nasc_paciente == "" || sexo_paciente == 0) {

            e.preventDefault()

            if (fisio == 0) {
                msg = 'Selecione a Fisioterapeuta.';
                let alert_fisio = document.querySelector("#alert_fisio")
                alert_fisio.innerHTML = "Selecione uma Fisioterapeuta";
                alert_fisio.style.color = 'red';


            } else if (nome_paciente == "") {

                let alert_nome = document.querySelector("#alert_nome");
                alert_nome.innerHTML = 'Nome do paciente é obrigatorio.';
                alert_nome.style.color = 'red';

                msg = 'Preencha o nome do paciente.';


            } else if (data_nasc_paciente == "") {

                let alert_data_nasc = document.querySelector("#alert_data_nasc");
                alert_data_nasc.innerHTML = 'Data de nascimento é obrigatorio.';
                alert_data_nasc.style.color = 'red';

                msg = 'Preencha a data de nascimento.';



            } else if (sexo_paciente == 0) {

                let alert_sexo = document.querySelector("#alert_sexo");
                alert_sexo.innerHTML = 'Sexo é obrigatorio.';
                alert_sexo.style.color = 'red';

                msg = 'Selecione o sexo do paciente.';


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
                url: "View/CadastrosPaciente/cadastro-paciente.php",
                type: 'POST',
                data: formData,

                success: function (mensagem) {
                    $('#mensagem-recuperar').text('');
                    $('#mensagem-recuperar').removeClass()
                    if (mensagem.trim() == "Cadastro realizado com sucesso") {
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