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

    if($_COOKIE['acaoEmp'] == "editar"){
        if(isset($_POST['btn_editar'])){
            include_once("../Classes/ClassEmpresa.php");
            $id = $_COOKIE['idEmp'];
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
            $result = $emp->EditarEmpresa($id, $nome_fantasia, $cnpj, $rua_empresa, $bairro_empresa, $num_empresa, $telefone_empresa, $wpp_empresa, 
            $nome_responsavel, $cargo_responsavel, $telefone_responsavel, $doc_convenio, $dt_expiracao);

            //print_r($result);
            if($result == true){
                echo "
                <script>
                    alert('EMPRESA EDITADA COM SUCESSO');
                    window.location.href = '../CoordenadorEmpresas.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR EMPRESA');
                    window.location.href = '../CoordenadorEmpresas.php';
                </script>";
            }

        }
    }

    if($_GET['acao'] == "apagar"){
        if(!empty($_GET['id'])){
            include_once("../Classes/ClassEmpresa.php");

            $emp = new Empresa();
            $id = $_GET['id'];

            if($emp->DeletarEmpresa($id)){
                echo "
                <script>
                    alert('EMPRESA DELETADA COM SUCESSO');
                    window.location.href = '../CoordenadorProfessor.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO DELETAR EMPRESA');
                    window.location.href = '../CoordenadorEmpresas.php';
                </script>";
            }
        }
        else{
            echo "
            <script>
                alert('Para Apagar uma empresa é preciso selecioná-la');
                window.location.href = '../CoordenadorEmpresas.php';
            </script>";
        }
    }
?>