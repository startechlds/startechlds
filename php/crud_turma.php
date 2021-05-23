<?php
//deletar turma
    if(isset($_GET['btn_ApagarTurma'])){
        include_once("../Classes/ClassTurma.php");
        $turma = new Turma();

        $idtuma = $_GET['btn_ApagarTurma'];

        $mensagem = $turma->DeletarTurma($idtuma);
        echo "
            <script>
                alert('".$mensagem."');
                window.location.href = '../CoordenadorTurmasSelect.php?id=".$idtuma."';
            </script>'";
    }

    //CADASTRAR TURMA
    if(isset($_POST['btn_cadTurma'])){
        include_once("../Classes/ClassTurma.php");
        $turma = new Turma();
        
        $semestre = $_POST['semestreSelecionado'];
        $idprofessor = $_POST['professor'];
        $dia = $_POST['dia'];
        $horarioI = $_POST['horaI'];
      //  $teste = true;

        $resposta = $turma->InserirNovaTurma($semestre, $dia, $horarioI, $idprofessor);
        if($resposta == "invalido"){
           // echo($resposta);
            echo "
            <script>
                alert('Verifique se o semestre anterior existe');
                window.location.href = '../CoordenadorEditarTurma.php';
            </script>'";
        }
        else if($resposta == false){
            echo "
            <script>
                alert('Falha na criação de um novosemestre ou inserção da turma');
                window.location.href = '../CoordenadorEditarTurma.php';
            </script>'";
        }
        else if($resposta == true){
            echo "
            <script>
                alert('turma inserida com sucesso');
                window.location.href = '../CoordenadorTurmas.php';
            </script>'";
        }
        
       // header("Location: http://localhost/projeto_final/startechlds/CoordenadorCadNovaTurma2.php");

    }
    else{
        echo "por algum motivo está vazio<br/>";
    }

    //EDITAR TURMA
    if(isset($_POST['btn_EditarTurma'])){
        include_once("../Classes/ClassTurma.php");
        $turma = new Turma();
        
        $semestre = $_POST['semestreSelecionado'];
        $idprofessor = $_POST['professor'];
        $dia = $_POST['dia'];
        $horarioI = $_POST['horaI'];
        session_start();
        $id =  $_SESSION['id'];
        $teste = true;

        $resposta = $turma->EditarTurma($id, $semestre, $dia, $horarioI, $idprofessor);
        if($resposta == "invalido"){
            echo "
            <script>
                alert('Verifique se o semestre anterior existe');
                window.location.href = '../CoordenadorCadNovaTurma.php';
            </script>'";
        }
        else if($resposta == false){
            echo "
            <script>
                alert('Falha na criação de um novosemestre ou inserção da turma');
                window.location.href = '../CoordenadorCadNovaTurma.php';
            </script>'";
        }
        else if($resposta == true){
            echo "
            <script>
                alert('turma EDITADA com sucesso');
                window.location.href = '../CoordenadorTurmas.php';
            </script>'";
        }
    }

    if($_GET['finalizarTurma'] == true){
        include_once("../Classes/ClassTurma.php");
        $turma = new Turma();
        
        $resposta = $turma->FinalizarTurma($_GET['id']);

        if($resposta){
            echo "
            <script>
                alert('turma FINALIZADA com sucesso');
                window.location.href = '../CoordenadorTurmas.php';
            </script>'";
        }
        else{
            echo "
            <script>
                alert('Erro ao finalizar turma');
                window.location.href = '../CoordenadorTurmas.php';
            </script>'";
        }
    }

?>