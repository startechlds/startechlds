<?php
//deletar turma
    if(isset($_GET['btn_ApagarTurma'])){
        include_once("../Classes/ClassTurma.php");
        $idtuma = $_GET['btn_ApagarTurma'];

        $turma = new Turma();

        $mensagem = $turma->DeletarTurma($idtuma);
        echo "
            <script>
                alert('".$mensagem."');
                window.location.href = '../CoordenadorTurmasSelect.php?id=".$idtuma."';
            </script>'";
    }
    else{
        echo"vazio";
    }
    if(isset($_POST['btn_cadTurma'])){
 
        
       // header("Location: http://localhost/projeto_final/startechlds/CoordenadorCadNovaTurma2.php");

    }
    else{
        echo "por algum motivo está vazio";
    }
    //cadastrar turma
?>