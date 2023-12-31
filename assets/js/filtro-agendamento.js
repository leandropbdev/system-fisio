$(document).ready(function () {
    $(document).on('click', '.btn_filtro_agendado', function () {

        //  alert("Ola mundo")

        //    var statusValue = $(this).attr("status");

        let statusValue = $(this).attr("status");

        if (statusValue == 2) {
            var msg = "Concluidos "
        } else if (statusValue == 3) {
            var msg = "Finalizados por ausência"
        }



        var dados = {
            statusFiltro: statusValue,

        }




        $.post('View/Agendamentos/filtro-agendamento.php', dados, function (retorna) {
            // $('#Modal-confirm').modal('show')

            let msg_filtro = document.querySelector("#msg_filtro")
            msg_filtro.textContent = msg;
            $('#body_table_agem').fadeIn().html(retorna);



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
            //     title: '<span style="font-size:14px">' + retorna + '</span>'
            // })

            // setTimeout(function () {

            // $('#body_table_agem').load("View/Agendamentos/filtro-agendamento.php").fadeIn("slow");

            // $('#changeoffice').modal('hide')
            // window.location.reload("#")               


            // }, 100);


        });
    });
});
