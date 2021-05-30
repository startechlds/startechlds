<?php
    if(isset($_POST['btn_novoProfessor'])){
        include_once("../Classes/ClassPessoa.php");

        $nome = $_POST['nome']. ' '. $_POST['sbnome'];
        $usuario =  $_POST['usuario'];
        $senha =  $_POST['senha'];
        $situacao = null;

        $p = new Pessoa();
        
        $verificaInsercao = $p->InserirNovaPessoa($nome, null, $usuario, $senha, 'P', $situacao);
        if($verificaInsercao){
            echo "
            <script>
                alert('PROFESSOR ADICIONADO COM SUCESSO');
                window.location.href = '../CoordenadorProfessor.php';
            </script>";
        }
        else{
            echo "
            <script>
                alert('ERRO AO ADICIONAR NOVO PROFESSOR');
                window.location.href = '../CoordenadorProfessor.html';
            </script>'";
        }
    }

    if($_COOKIE['acaoP'] == "editar"){
        if(isset($_POST['btn_editar'])){
            include_once("../Classes/ClassPessoa.php");

            $nome = $_POST['nome']. ' '. $_POST['sbnome'];
            $usuario =  $_POST['usuario'];
            $id = $_COOKIE['idProf'];

            $p = new Pessoa();
        
            $verificaUpdate = $p->EditarPessoa($id,$nome, null, $usuario,'P');

            if($verificaUpdate){
                echo "
                <script>
                    alert('PROFESSOR EDITADO COM SUCESSO');
                    window.location.href = '../CoordenadorProfessor.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR NOVO PROFESSOR');
                
                </script>";
                echo $nome."<br>";
                echo $usuario."<br>";
            }

        }
    }
    if(isset($_GET['acao'])){
        if($_GET['acao'] == "apagar"){
            include_once("../Classes/ClassPessoa.php");
            $id = $_GET['id'];

            $p = new Pessoa();

            if($p->DeletarPessoa($id)){
                echo "
                <script>
                    alert('PROFESSOR DELETADO COM SUCESSO');
                    window.location.href = '../CoordenadorProfessor.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO DELETAR NOVO PROFESSOR');
                
                </script>";
            }
        }
    }

?>