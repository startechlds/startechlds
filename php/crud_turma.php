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
?>