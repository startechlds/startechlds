<?php
    if(isset($_POST['btn_novaVaga'])){
        include_once("../Classes/ClassVaga.php");

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

    if($_COOKIE['acaoV'] == "editar"){
        if(isset($_POST['btn_EditarVaga'])){
            include_once("../Classes/ClassVaga.php");

            $cargo = $_POST['cargo'];
            $cd_empresa = $_POST['cbx_Empresa'];
            $valor_bolsa = $_POST['valor_bolsa'];
            $qtd = $_POST['qtd'];
            $HSemanais = $_POST['HSemanais'];
            $descricao = $_POST['descricao'];

            $id = $_COOKIE['idVaga'];
       
            $vaga = new Vaga();
            $verificaUpdate = $vaga->EditarVaga($id, $cargo, $cd_empresa, $valor_bolsa, $HSemanais, $qtd, $descricao);
            if($verificaUpdate){
                echo "
                <script>
                    alert('VAGA EDITADA COM SUCESSO');
                    window.location.href = '../CoordenadorVagas.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR NOVO PROFESSOR');
                
                </script>";
            }

        }
    }

    if($_GET['acao'] == "apagar"){
        if(!empty($_GET['id'])){
            include_once("../Classes/ClassVaga.php");
            $id = $_GET['id'];

            $v = new Vaga();

            $mensagem = $v->DeletarVaga($id);
            echo "
                <script>
                    alert('".$mensagem."');
                    window.location.href = '../CoordenadorVagas.php';
                </script>";
        }
        else{
            echo "
            <script>
                alert('Para Apagar uma vaga é preciso selecioná-la');
                window.location.href = '../CoordenadorVagas.php';
            </script>";
        }
    }

    if($_GET['acao'] == "desativar"){
        if(!empty($_GET['id'])){
            include_once("../Classes/ClassVaga.php");
            $id = $_GET['id'];

            $v = new Vaga();

            $verificaUpdate = $v->DesativarVaga($id);
            if($verificaUpdate){
                echo "
                <script>
                    alert('VAGA DESATIVADA COM SUCESSO');
                    window.location.href = '../CoordenadorVagas.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO DESATIVAR VAGA');
                
                </script>";
                echo"$verificaUpdate";
            }

        }
        else{
            echo "
            <script>
                alert('Para Apagar uma vaga é preciso selecioná-la');
                window.location.href = '../CoordenadorVagas.php';
            </script>";
        }
    }
?>