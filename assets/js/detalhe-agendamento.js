
// === SCRIPT PARA MANDAR AS INFORMAÇÕES PARA O MODAL DE DETALHE DO AGENDAMENTO ==
$(document).ready(function () {
    $(document).on('click', '.btn_detalhe_agendamento', function () {
    //   alert("Ok")

    //    $('#add_event').modal('hide')


    //  Todos esses dados são pegos do botão que mostra o modal de detalhes

        const codAgendamento = $(this).attr("codAgendamento");
        const statusAgendamento = $(this).attr("statusAgendamento");
        // == PEGANDO O COD_DIAS_SEM_PACIENTE DA TABELA DIAS_SEMANA_PACIENTE QUE ESTA NO METODO DO BOTÃO  btn_detalhe_agendamento ===
        const codDiasSemPacienteAgd = $(this).attr("codDiasSemPaciente");

        const codDiasSemana = $(this).attr("codDiasSemana");



        const nomeProfissional = $(this).attr("nomeProfissional");
        const codProfissional = $(this).attr("codProfissional");

        const horarioInicial = $(this).attr("horarioInicial");
        const horarioFinal = $(this).attr("horarioFinal");

        const diaSem = $(this).attr("diaSemana");
       

        const codPaciente = $(this).attr("codPaciente");
        const nomePaciente = $(this).attr("nomePaciente");

        const codProcedimento = $(this).attr("codProcedimento");
        const procedimento = $(this).attr("procedimento");

        const telefone = $(this).attr("telefone");
        const rua = $(this).attr("rua");
        const bairro = $(this).attr("bairro");

        const presenca = $(this).attr("presenca");
        const ausencia = $(this).attr("ausencia");

        const observacao = $(this).attr("observacao");


        //  alert(codDiasSemPaciente);     

        // COLOCAR VALORES NOS INPUTS DO MODAL DETALHE DO AGENDAMENTO
        let codProfissional_detalhe = document.querySelector("#codProfissionalDetalhe");
        codProfissional_detalhe.value = codProfissional
        //NOME DO PROFISSIONAL
        let nomeProfissional_detalhe = document.querySelector("#nomeProfissionalDetalhe");
        nomeProfissional_detalhe.value = nomeProfissional

        //CODIGO E NOME DO PACIENTE PASSAR PARA O MODAL DE DETALHE
        let codPaciente_detalhe = document.querySelector("#codPacienteDetalhe");
        codPaciente_detalhe.value = codPaciente
        //NOME DO PACIENTE
        let nomePaciente_detalhe = document.querySelector("#nomePacienteDetalhe");
        nomePaciente_detalhe.value = nomePaciente

        //CODIGO E NOME DO PACIENTE PASSAR PARA O MODAL DE DETALHE
        let codProcedimento_detalhe = document.querySelector("#codProcedimentoDetalhe");
        codProcedimento_detalhe.value = codProcedimento
        //NOME DO PACIENTE
        let nomeProcedimento_detalhe = document.querySelector("#nomeProcedimentoDetalhe");
        nomeProcedimento_detalhe.value = procedimento


        //== HORARIOS ==
        let horarioInicialDetalhe = document.querySelector("#horarioInicialDetalhe");
        horarioInicialDetalhe.value = horarioInicial

        let horarioFinalDetalhe = document.querySelector("#horarioFinalDetalhe");
        horarioFinalDetalhe.value = horarioFinal 

        //=== OBSERVACAO ===
        let observacaoPaciente = document.querySelector("#observacaoDetalhe");
        observacaoPaciente.value = observacao

        //=== CODIGO DA TABELA DIAS-SEMANA_PACIENTE ===
        let codDiasSemanaDetalhe = document.querySelector("#codDiasSemanaDetalhe");
        codDiasSemanaDetalhe.value = codDiasSemana





        let profissional = document.querySelector("#profissional_agd")
        profissional.textContent = nomeProfissional

        let horario_agd = document.querySelector("#horario_agd")
        horario_agd.textContent = diaSem + ' das '  + horarioInicial + ' - ' + horarioFinal  

        let nomePaciente_agd = document.querySelector("#paciente_agd")
        nomePaciente_agd.textContent = nomePaciente

        let procedimentoPaciente_agd = document.querySelector("#procedimento_agd")
        procedimentoPaciente_agd.textContent = procedimento

        let telefonePaciente_agd = document.querySelector("#telefone_agd")
        telefonePaciente_agd.textContent = telefone

        let enderecoPaciente_agd = document.querySelector("#endereco_agd")
        enderecoPaciente_agd.textContent = rua + ' ' + bairro

        let presencaPaciente_agd = document.querySelector("#presenca_agd")
        presencaPaciente_agd.textContent = presenca

        let ausenciaPaciente_agd = document.querySelector("#ausencia_agd")
        ausenciaPaciente_agd.textContent = ausencia

        if (ausencia >= 3) {
            ausenciaPaciente_agd.style.color = 'red'
        }

        // COLOCAR O CODIGO DO AGENDAMENTO DENTRO DO INPUT DO MODAL DETALHE AGENDAMENTO 
        let codAgendamentoDetalhe = document.querySelector("#codAgendamentoDetalhe")
        codAgendamentoDetalhe.value = codAgendamento


        // == COLOCAR O CODIGO cod_dias_sem_paciente da tabela dias_semana_paciente dentro do input do modal detalhe de agendamento ==
        let codDiasSemPaciente = document.querySelector("#codDiasSemPaciente")
        codDiasSemPaciente.value = codDiasSemPacienteAgd

        // COLOCAR NO SELECT QUAL O STATUS que o PACIENTE ESTA         
        let statusDetalhe = document.querySelector("#statusDetalhe")
        // let statusDetCom = document.querySelector("#statusDetCom")
        // let statusDetFin = document.querySelector("#statusDetFin")

        if(statusAgendamento == 1){
           var nomeStatus = "Agendado";
           
        }

        if(statusAgendamento == 2){
           var nomeStatus = "Concluido";
        }

        if(statusAgendamento == 3){
           var nomeStatus = "Arquivado";
        }

        statusDetalhe.value = statusAgendamento
        statusDetalhe.text = nomeStatus

        // if (statusAgendamento == '1') {
        //     statusDetalhe.textContent = 'Agendado'
        //     statusDetalhe.value = 1

        //     statusDetCom.textContent = 'Concluido'
        //     statusDetCom.value = 2

        //     statusDetFin.textContent = 'Finalizado '
        //     statusDetFin.value = 3
        // }

        // if (statusAgendamento == '2') {
        //     statusDetalhe.textContent = 'Concluido'
        //     statusDetalhe.value = 2

        //     statusDetFin.textContent = 'Finalizado '
        //     statusDetFin.value = 3

        //     statusDetCom.textContent = 'Agendado'
        //     statusDetCom.value = 1          
            

        // }

        // if (statusAgendamento == '3') {
        //     statusDetalhe.textContent = 'Finalizado'
        //     statusDetalhe.value = 3

        //     statusDetCom.textContent = 'Concluido '
        //     statusDetCom.value = 2

        //     statusDetFin.textContent = 'Agendado'
        //     statusDetFin.value = 1          
            

        // }

    });
});

// === SCRIPT PARA PEGAR O VALOR QUE FOI SELECIONADO NO SELECT DO STATUS , SE O VALOR FOR 2 MOSTRARÁ A OPÇÃO DE ADICIONA A EVOLUÇÃO E A AVALIACAO DO ATENDIMENTO =====
function altualizaSelect(){
    // alert("Ola mundo")

    var opselect = document.querySelector("#status");
    // var inputbusca = document.querySelector(".form-control")
    var optionValue = opselect.options[opselect.selectedIndex];


    var valueLote = optionValue.value;
    // alert(valueLote)

    if(valueLote == 2){
      
        //CODIGO PARA CHAMAR O MODAL DO BOOSTRAP
        // $('#modal_ev_paciente').modal('show');
        

       let formEvolucao = document.querySelector("#form_evolucao")
       formEvolucao.style.display = ''

        //  TREXO DE CODIGO PARA PASSAR O COD DO PROFISSIONAL E DO PACIENTE PARA O MODAL DE EVOLUÇÃO 
        // let codProfissionalDetalhe = document.querySelector("#codProfissionalDetalhe").value; 
        // let codProfissional = document.querySelector("#codProfissional").value = codProfissionalDetalhe       
       
        // let codPacienteDetalhe = document.querySelector("#codPacienteDetalhe").value
        // let codPaciente = document.querySelector("#codPaciente").value = codPacienteDetalhe       

      
    }else if(valueLote == 1){
        let formEvolucao = document.querySelector("#form_evolucao")
        formEvolucao.style.display = 'none'
 
    }else if(valueLote == 3){
        let formEvolucao = document.querySelector("#form_evolucao")
        formEvolucao.style.display = 'none'

    }

}

//===- SCRIPT PARA MANDAR AS INFORMAÇÕES PARA CADASTRAR A EVOLUÇÃO E A AVALIAÇÃO DO ATENDIMENTO DO PACIENTE =====

$(document).ready(function(){
    $(document).on('click','.btn_cad_ev_paciente', function(){
      

    let codProfissional = document.querySelector("#codProfissional").value
    let codPaciente = document.querySelector("#codPaciente").value
    let descricaoEvolucao = document.querySelector("#descricao_evolucao").value

    // PEGANDO O VALOR DE UM INPUT DO TYPE RAIO
    let avaliacao_at = document.querySelector("input[name='avaliacao_at']:checked").value
    // alert(avaliacao_at)

    var dados = {
        codProfissional: codProfissional,
        codPaciente: codPaciente,
        descricaoEvolucao:descricaoEvolucao,
        avaliacao_at:avaliacao_at

    }



    $.post('View/Evolucao_avaliacao_atendimento/cad-evolucao-avaliacao.php', dados, function (retorna) {
        // $('#Modal-confirm').modal('show')
        // $('.body-teste').fadeIn().html(retorna);

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
            title: '<span style="font-size:14px">' + retorna + '</span>'
        })

        

         setTimeout(function () {

            $('#modal_ev_paciente').modal('hide')

         }, 2000);


    });


    


    })

});




// == SCRIPT PARA MANDAS INFORMAÇÃO PARA CADASTRAR O ATENDIMENTO EM CASO DE PRESENÇA OU AUSENCIA =====
$(document).ready(function () {
    $(document).on('click', '.btn_frequencia', function () {

        //CODIGO DO PROFISSIONAL 
        let codProfissional = document.querySelector("#codProfissionalDetalhe")
        codProfissional = codProfissional.value

         //CODIGO DO PACIENTE 
         let codPaciente = document.querySelector("#codPacienteDetalhe")
         codPaciente = codPaciente.value

        //PEGAR CODIGO AGENDAMENTO =====
        let codAgendamento = document.querySelector("#codAgendamentoDetalhe");
        codAgendamento = codAgendamento.value

        //PEGAR SE O FREQUENCIA SE O PACIENTE ESTA PRESENTE OU AUSENTE
        let frequenciaPaciente = $(this).attr("frequencia");

        // PEGAR O COD_DIAS_SEM_PACIENTE DO INPUT QUE ESTA NO MODAL DE DETALHE DE AGENDAMENTO ==
        let codDiasSemPaciente = document.querySelector("#codDiasSemPaciente")
        codDiasSemPaciente = codDiasSemPaciente.value

        //PEGAR O VALOR DO SELECT DO STATUS QUE ESTA NO MODAL DE DATALHE DO AGENDAMENTO 
        let statusAgendamento = document.querySelector("#status")
        statusAgendamento = statusAgendamento.value

        //PEGAR A OBSERVAÇÃO QUE ESTA NO MODAL DE DATALHE DO AGENDAMENTO 
        let obsAtendimento = document.querySelector("#obs_atendimento")
        obsAtendimento = obsAtendimento.value
        // alert(obsAtendimento);


         // === INFORMAÇÕES PARA CADASTRA A EVOLUÇÃO E A AVALIAÇÃO DO ATENDIMENTO DO PACIENTE ===
         let descricaoEvolucao = document.querySelector("#descricao_evolucao")
         descricaoEvolucao = descricaoEvolucao.value
          
        
 
         // PEGANDO O VALOR DE UM INPUT DO TYPE RADIO
         let avaliacao_at = document.querySelector("input[name='avaliacao_at']:checked")
         avaliacao_at = avaliacao_at.value
         

      
    
            var dados = {
                codProfissional:codProfissional,
                codPaciente:codPaciente,
                codAgendamento: codAgendamento,
                frequenciaPaciente: frequenciaPaciente,
                codDiasSemPaciente: codDiasSemPaciente,
                statusAgendamento: statusAgendamento,
                obsAtendimento: obsAtendimento,
                descricaoEvolucao:descricaoEvolucao,
                avaliacao_at:avaliacao_at
            }
             
     


        $.post('View/Atendimentos/cadastro-atendimento.php', dados, function (retorna) {
            // $('#Modal-confirm').modal('show')
            // $('.body-teste').fadeIn().html(retorna);

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
                title: '<span style="font-size:14px">' + retorna + '</span>'
            })

            setTimeout(function () {

                $('#changeoffice').modal('hide')
                window.location.reload("#")
            }, 2000);


        });

    });
});


//=== SCRIPT PARA EDITAR O AGENDAMENTO, PEGAR O CODIDO DO AGENDAMENTO  PASSAR AS INFORMAÕES DO AGENDAMENTO PARA  MODAL DE EDIÇÃO==
$(document).ready(function () {
    $(document).on('click', '.btn_edt_agendamento', function () {
        //  alert("ok")

        // TRAZER O CHECKBOX DO DIA DA SEMANA MARCA NO MODAL DE EDIÇÃO 

        let codDiasSemanaDetalhe = document.querySelector("#codDiasSemanaDetalhe")
        // alert(codDiasSemanaDetalhe.value)


        let dias_semana_edt_seg = document.querySelector(".dias_semana_edt1")
        let dias_semana_edt_ter = document.querySelector(".dias_semana_edt2")
        let dias_semana_edt_qua = document.querySelector(".dias_semana_edt3")
        let dias_semana_edt_qui = document.querySelector(".dias_semana_edt4")
        let dias_semana_edt_sex = document.querySelector(".dias_semana_edt5")

        //   alert(dias_semana_edt_seg.value)

        // !===== marcar os checks  ==

        if (dias_semana_edt_seg.value == codDiasSemanaDetalhe.value) {
            // alert(dias_semana_edt_seg.value)
            dias_semana_edt_seg.checked=true;

        }else if(dias_semana_edt_ter.value == codDiasSemanaDetalhe.value){
            dias_semana_edt_ter.checked=true;
            
        }else if(dias_semana_edt_qua.value == codDiasSemanaDetalhe.value){
            dias_semana_edt_qua.checked=true;

        }else if(dias_semana_edt_qui.value == codDiasSemanaDetalhe.value){
            dias_semana_edt_qui.checked=true;

        }else if(dias_semana_edt_sex.value == codDiasSemanaDetalhe.value){
            dias_semana_edt_sex.checked=true;
        }

        let codAgendamentoDetalhe = document.querySelector("#codAgendamentoDetalhe")


        let codAgendamento_edt = document.querySelector("#codAgendamento_edt");
        codAgendamento_edt.value = codAgendamentoDetalhe.value

        //== PASSAR VALORES PARA O FORM DE EDIÇÃO DO AGENDAMENTO, PEGANDO O VALORES DO MODAL DETALHE DO AGENDAMENTO E MANDANDO PARA O EDIÇÃO ===

        let horarioInicialDetalhe = document.querySelector("#horarioInicialDetalhe")
        let horario_inicio = document.querySelector("#horario_inicio_edt");
        horario_inicio.value = horarioInicialDetalhe.value

        let horarioFinalDetalhe = document.querySelector("#horarioFinalDetalhe")
        let horario_final = document.querySelector("#horario_final_edt");
        horario_final.value = horarioFinalDetalhe.value

        let codProfissionalDetalhe = document.querySelector("#codProfissionalDetalhe")
        let nomeProfissionalDetalhe = document.querySelector("#nomeProfissionalDetalhe")
        let option_prof_edt = document.querySelector("#option_prof_edt");
        option_prof_edt.textContent = nomeProfissionalDetalhe.value
        option_prof_edt.value = codProfissionalDetalhe.value

        let codPacieneteDetalhe = document.querySelector("#codPacienteDetalhe")
        let nomePacienteDetalhe = document.querySelector("#nomePacienteDetalhe")
        let cod_paciente_edt = document.querySelector("#cod_paciente_edt");
        let nome_paciente_edt = document.querySelector("#nome_paciente_edt");
        nome_paciente_edt.value = nomePacienteDetalhe.value
        cod_paciente_edt.value = codPacieneteDetalhe.value


        let codProcedimentoDetalhe = document.querySelector("#codProcedimentoDetalhe")
        let nomeProcedimentoDetalhe = document.querySelector("#nomeProcedimentoDetalhe")
        let option_proc_edt = document.querySelector("#option_proc_edt");
        option_proc_edt.textContent = nomeProcedimentoDetalhe.value
        option_proc_edt.value = codProcedimentoDetalhe.value

        let observacaoDetalhe = document.querySelector("#observacaoDetalhe")
        let observacao_edt = document.querySelector("#observacao_edt")
        observacao_edt.innerHTML = observacaoDetalhe.value

        let codDiasSemPaciente = document.querySelector("#codDiasSemPaciente")
        let codDiasSemPaciente_edt = document.querySelector("#codDiasSemPaciente_edt")
        codDiasSemPaciente_edt.value = codDiasSemPaciente.value








    });
});

//== SCRIPT PRA MANDA OS DADO DO FORNULARIO DO MODAL DE EDIÇÃO DO AGENDAMENTO PARA A EDIÇÃO View/EditarAgendamento/editar-agendamento.php
$(document).ready(function () {
    $("#btn_cad_agendamento_edt").click(function (e) {
        //   alert("Ola mundo");



        var msg = "";
        let fisdias_semanaio = $("#dias_semana").val();

        let nome_paciente = $("#nome_paciente_edt").val();
        let horarioInicio = $("#horario_inicio_edt").val();
        let horarioFinal = $("#horario_final_edt").val();
        let profissional = $("#profissional_edt").val();
        let procedimento = $("#procedimento_edt").val();


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
            var form_edt = document.querySelector("#form_edt");
            var formData_edt = new FormData(form_edt);

            $.ajax({
                url: "View/EditarAgendamento/editar-agendamento.php",
                type: 'POST',
                data: formData_edt,

                success: function (mensagem) {
                    $('#mensagem-recuperar').text('');
                    $('#mensagem-recuperar').removeClass()
                    if (mensagem.trim() == "Agendamento alterado") {

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


// =============================================== SCRIPT PARA CHAMAR  E PASSAR DADOS PARA O MODAL DE DELETE DE UM AGENDAMENTO ========================================
// SCRIPT PARA PASSAR COD DO AGENDAMENTO PARA O MODAL DE ALERT DO DELETE PARA DELETAR O AGENDAMENTO ====
$(document).ready(function () {
    $(document).on('click', '.btn_delete01', function () {

        // alert("Ola mundo")


        let codAgendamentoDetalhe = document.querySelector("#codAgendamentoDetalhe")
        let codAgendamentoDelete = document.querySelector("#codAgendamentoDelete")

        codAgendamentoDelete.value = codAgendamentoDetalhe.value

        let codDiasSemPaciente = document.querySelector("#codDiasSemPaciente")
        let codDiasSemDelete = document.querySelector("#codDiasSemDelete")

        codDiasSemDelete.value = codDiasSemPaciente.value

    });
});

// SCRITP PARA MANDAR O COD DO AGENDAMENTO PARA A PAGINA DE DELETE PHP View/Delets/delete_agendamento.php
$(document).ready(function () {
    $(document).on('click', '.btn_delete_agendamento', function () {


        var form = document.querySelector("#formDelete");
        var formData = new FormData(form);


        $.ajax({
            url: "View/Deletes/delete_agendamento.php",
            type: 'POST',
            data: formData,

            success: function (mensagem) {
                $('#mensagem-recuperar').text('');
                $('#mensagem-recuperar').removeClass()
                if (mensagem.trim() == "Deletado com sucesso") {
                    //$('#btn-fechar-rec').click();					
                    // $('#email-recuperar').val('');
                    // $('#mensagem-recuperar').addClass('text-success')
                    // $('#mensagem-recuperar').text('Cadastrado com sucesso')


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
                    const Toast2 = Swal.mixin({
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

                    Toast2.fire({
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








    });
});

