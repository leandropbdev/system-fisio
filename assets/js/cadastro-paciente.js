
//* FUNÇÕES PARA VALIDAR AÇÃO DO BOTAO SE O PACIENTE TEM OU NÃO EXAMES, HABILITAR E DESABILITAR O CAMPO DECRICAO COM O CKECKBOX ==
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

//* ==== SE O PACIENTE TEM CIRURGIA  OU NÃO MEDICAMENTO PARA ATIVAR OU DESATIVA O CAMPO DESCRIÇÃO ====
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



//*----=== Pegando a ação do botão cadastrar  e mandar os dados para a page cadastro-paciente.php------

$(document).ready(function () {
    $("#btn_cadastro").click(function (e) {
        // alert("Ola mundo");


        //*----=== VALIDAÇÃO DOS CAMPOS OBRIGATORIOS ------
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


            //*====== SCRIPT PARA MANDA OS DADOS PARA A PAGE CADASTRO =====

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
                    if (mensagem.trim() != "") {

                        Swal.fire({
                            title: '<span style="font-size:20px">Cadastro realizado </span>',
                            text: "Deseja realizar a impressão ?",
                            icon: "success",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            cancelButtonText: "Não",
                            confirmButtonText: "Sim, Desejo Imprimir!"
                        }).then((result) => {
                            if (result.isConfirmed) {
                                Swal.fire({
                                    title: "Certo!",
                                    text: "Impressão sendo gerada.",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                });
                                //* Encaminhar o codigo do paciente para a page print-avaliacao-paciente.php para realizar a impressão








                                setTimeout(function () {
                                    //?==== ENVIANDO O CODIGO DO PACIENTE POR METODO GET PARA A PAGE DE IMPRESSÃO ===
                                    // window.location.href='View/Prints/prints.php?codPaciente='+ mensagem;

                                    //*RESETAR TODOS OS DADOS DO FORMULARIO

                                    form.reset();                           


                                    window.open('View/Prints/print-avaliacao-paciente.php?codPaciente=' + mensagem)

                                }, 2000);



                            } else {
                                Swal.fire({
                                    title: "Certo!",
                                    text: "Já pode cadastrar um novo paciente.",
                                    icon: "success",
                                    showConfirmButton: false,
                                    timer: 2000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }


                                });

                                setTimeout(function () {

                                    window.location.reload("#")
                                }, 2000);

                            }
                        });




                        // const Toast = Swal.mixin({
                        //     toast: true,
                        //     width: '380',
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
                        //     title: '<span style="font-size:14px">' + mensagem + '</span>'
                        // })




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