<?php
    if(isset($_POST['btn_AdcAluno'])){
        include_once("../Classes/ClassPessoa.php");
        include_once("../Classes/ClassTurma.php");

        $nome = $_POST['nome']. ' '. $_POST['sobrenome'];
        $usuario =  $_POST['usuario'];
        $senha =  $_POST['senha'];
        $situacao =  $_POST['cbx_situacao'];

        $p = new Pessoa();
        if(Turma::VerificaSeATumaAberta($_COOKIE['idTurmaSelecionada'])){
            $verificaInsercao = $p->InserirNovaPessoa($nome, null, $usuario, $senha, 'A', $situacao);
            if($verificaInsercao){
                $pessoa = $p->RetornaUltimo();
                setcookie('alunoInserido', $pessoa->CD_Pessoa);
                echo "
                <script>
                    alert('ALUNO ADICIONADO COM SUCESSO');
                    window.location.href = 'crud_turma.php?novoAluno=verdade&finalizarTurma=falso';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO ADICIONAR NOVO ALUNO');
                    window.location.href = '../CoordenadorNovoAluno.html';
                </script>'";
            }
        }
        else{
            echo "
            <script>
                alert('Turma Selecionada Fechada, Impossivel adicionar aluno');
                window.location.href = '../CoordenadorNovoAluno.html';
            </script>'";
        }
         
    }

    if($_GET['acao'] == "abrirDoc"){
        if(!empty($_GET['nameDoc'])){
           /* $arquivo = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Convenio\\".$_GET['nameDoc'].".pdf";
            fgets(fopen($arquivo, "r"));
            print_r(fopen($arquivo, "r"));*/
            if($_GET['tipo'] == 'C')
                $file = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Curriculo\\".$_GET['nameDoc']."_DOC_Curriculo.pdf";
            else
                $file = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Relatorio\\".$_GET['nameDoc']."_DOC_Relatorio.pdf";

            $filename = "Custom file name for".$_GET['nameDoc']." .pdf"; /* Note: Always use .pdf at the end. */

            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($file));
            header('Accept-Ranges: bytes');

            @readfile($file);
        }
    }

    if($_COOKIE['acaoA'] == "editar"){
        if(isset($_POST['btn_Editar'])){
            include_once("../Classes/ClassPessoa.php");

            $nome = $_POST['nome']. ' '. $_POST['sobrenome'];
            $usuario =  $_POST['usuario'];
            $id = $_COOKIE['idAluno'];

            $p = new Pessoa();
        
            $verificaUpdate = $p->EditarPessoa($id,$nome, null, $usuario,'A');

            if($verificaUpdate){
                echo "
                <script>
                    alert('ALUNO EDITADO COM SUCESSO');
                    window.location.href = '../CoordenadorTurmas.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR ALUNO');
                
                </script>";
                echo $nome."<br>";
                echo $usuario."<br>";
            }

        }
    }

    if($_GET['acao'] == "apagar"){
        if(!empty($_GET['id'])){
            include_once("../Classes/ClassPessoa.php");
            $id = $_GET['id'];

            $p = new Pessoa();

            if($p->DeletarPessoa($id)){
                echo "
                <script>
                    alert('ALUNO DELETADO COM SUCESSO');
                    window.location.href = '../CoordenadorAlunos.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO DELETAR ALUNO');
                
                </script>";
            }
        }
        else{
            echo "
            <script>
                alert('Para Apagar um aluno é preciso selecioná-lo');
                window.location.href = '../CoordenadorAlunos.php';
            </script>";
        }
    }

?>