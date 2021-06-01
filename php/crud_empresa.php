<?php
    if(isset($_POST['btn_novaEmpresa'])){
        include_once("../Classes/ClassEmpresa.php");
        $emp = new Empresa();

        $nome_fantasia = $_POST['nome_fantasia'];
        $cnpj = $_POST['CNPJ'];
        $rua_empresa = $_POST['rua_empresa'];
        $bairro_empresa = $_POST['bairro_empresa'];
        $num_empresa = $_POST['num_empresa'];
        $telefone_empresa = $_POST['telefone_empresa'];
        $wpp_empresa = $_POST['wpp_empresa'];
        $nome_responsavel = $_POST['nome_responsavel']. ' '. $_POST['sbnome_responsavel'];
        $cargo_responsavel = $_POST['cargo'];
        $telefone_responsavel = $_POST['telefone_responsavel'];
        $doc_convenio = null;
        $dt_expiracao = $_POST['dt_convenio'];

        $emp = new Empresa();
        $result = $emp->CadastrarEmpresa($nome_fantasia, $cnpj, $rua_empresa, $bairro_empresa, $num_empresa, $telefone_empresa, $wpp_empresa, 
        $nome_responsavel, $cargo_responsavel, $telefone_responsavel, $doc_convenio, $dt_expiracao);

        if($result){
            echo "
            <script>
                alert('EMPRESA ADICIONADA COM SUCESSO');
                window.location.href = '../CoordenadorEmpresa.php';
            </script>";
        }
        else{
            echo "
            <script>
                alert('ERRO AO ADICIONAR EMPRESA');
                window.location.href = '../CoordenadorNovaEmpresa.html';
            </script>'";
        }
    }
?>