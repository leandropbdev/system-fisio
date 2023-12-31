<?php
session_start();
include('../autentication/login-invalid.php');

include_once('../../db/db-conection.php');

//Recuperar o valor da palavra
$busca = isset($_POST['palavra']) ? $_POST['palavra'] : null;





if (isset($busca)) {

    //Pesquisar no banco de dados O nome referente a palavra digitada pelo usuário
    $queryPaciente = "SELECT * FROM pacientes WHERE  nome_paciente like '%$busca%'  ORDER BY cod_paciente DESC  limit 1";
    $resultado_paciente = mysqli_query($mysqli, $queryPaciente);

    if (mysqli_num_rows($resultado_paciente) <= 0) { ?>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="form-group">
                    <label>Sexo: <span class="text-danger">*</span></label>
                    <select class="form-control select" id="sexo_paciente" name="sexo_paciente" required>
                        <option value="0" selected>Sexo do paciente</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="form-group">
                    <label>Data de nasciemento: <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="data_nascimento">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Sus: <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="sus_paciente">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="form-group">
                    <label>CPF: <span class="text-danger">*</span></label>
                    <input class="form-control " type="text" name="cpf_paciente" id="cpf_paciente">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">
                    <label>Rua: <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="rua_paciente" placeholder="Av. das flores, 2343">
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">

                <div class="form-group">
                    <label>Bairro: <span class="text-danger">*</span></label>
                    <select class="form-control select" name="bairro_paciente">
                        <option selected value="">Bairro do paciente</option>
                        <?php
                        // BUCAR BAIRROS
                        $querySelectBairro = "SELECT * FROM bairros";
                        $resultQueryBairro = mysqli_query($mysqli, $querySelectBairro);

                        while ($row_result_bairro = mysqli_fetch_array($resultQueryBairro)) {
                            $cod_bairro = $row_result_bairro['cod_bairro'];
                            $nome_Bairro = $row_result_bairro['nome_bairro'];

                        ?>
                            <option value="<?php echo $nome_Bairro ?>"><?php echo $nome_Bairro; ?></option>

                        <?php

                        }

                        ?>


                    </select>
                </div>
            </div>
        </div>





    <?php
    } else {
        while ($rows = mysqli_fetch_assoc($resultado_paciente)) {
            $codPaciente = $rows['cod_paciente'];
            $nomePaciente = $rows['nome_paciente'];
            $sexoPaciente =  $rows['sexo_paciente'];
        } ?>

        <div class="row" style="display: none;">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <div class="form-group">                  
                    <input class="form-control" type="hidden" name="cod_paciente" value="<?php  echo $codPaciente; ?>" >
                </div>
            </div>
           
        </div>

        <div class="row mb-3 ">
            <div class="col-lg-12 col-md-6 col-sm-6 col-3" style="margin-top:-15px; ">
                <span class="text-primary"><span class="text-success">*</span> Paciente <?php echo $nomePaciente; ?> cadastrado.</span>
            </div>
        </div>


<?php
    }
}


?>
<!-- SCRIPT PARA COLOCAR MASCARA NOS CAMPOS -->
<script src="assets/js/jQuery-Mask-Plugin-master/src/jquery.mask.js"></script>
<!-- COLOCANDO MASCARA NO FOMRULARIO -->
<script>
    $(document).ready(function() {
        $('#cpf_paciente').mask('000.000.000-00', {
            placeholder: '___.___.___-___'
        });




    })
</script>