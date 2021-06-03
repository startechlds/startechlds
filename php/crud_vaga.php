<?php
    if(isset($_POST['btn_novaVaga'])){
        include_once("../Classes/ClassVaga.php");
        $emp = new Vaga();

        $cargo = $_POST['cargo'];
        $cd_empresa = $_POST['cbx_Empresa'];
        $valor_bolsa = $_POST['valor_bolsa'];
        $qtd = $_POST['qtd'];
        $HSemanais = $_POST['HSemanais'];
        $descricao = $_POST['descricao'];
       
        $vaga = new Vaga();
        $result = $vaga->InserirNovaVaga($cargo, $cd_empresa, $valor_bolsa, $HSemanais, $qtd, $descricao);

        if($result){
            echo "
            <script>
                alert('VAGA ADICIONADA COM SUCESSO');
                window.location.href = '../CoordenadorVagas.php';
            </script>";
        }
        else{
            echo "
            <script>
                alert('ERRO AO ADICIONAR VAGA $result');
            </script>";
        }
    }
?>