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
    if(isset($_POST['btn_cadTurma'])){
        include_once("../Classes/ClassTurma.php");
        $turma = new Turma();
        
        $semestre = $_POST['semestreSelecionado'];
        $idprofessor = $_POST['professor'];
        $dia = $_POST['dia'];
        $horarioI = $_POST['horaI'];
        $teste = true;

        $resposta = $turma->InserirNovaTurma($semestre, $dia, $horarioI, $idprofessor);
        if($resposta == "invalido"){
           // echo($resposta);
            echo "
            <script>
                alert('VErifique o semestre anterior');
                window.location.href = '../CoordenadorCadNovaTurma.php';
            </script>'";
        }
        else if($resposta == false){
            echo "
            <script>
                alert('Falha na abetura do semestre ou inserção da turma');
                window.location.href = '../CoordenadorCadNovaTurma.php';
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
        echo "por algum motivo está vazio";
    }
    //cadastrar turma
?>