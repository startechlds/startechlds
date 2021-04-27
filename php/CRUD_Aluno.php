<?php
    if(isset($_POST['btn_AdcAluno'])){
        include_once("../Classes/ClassPessoa.php");

        $nome = $_POST['nome']. ' '. $_POST['sobrenome'];
        $usuario =  $_POST['usuario'];
        $senha =  $_POST['senha'];
        $situacao =  $_POST['cbx_situacao'];

        $p = new Pessoa();
        
        $verificaInsercao = $p->InserirNovaPessoa($nome, null, $usuario, $senha, 'A', $situacao);

        if($verificaInsercao){
            echo "
            <script>
                alert('Aluno(a) Adicionado com sucesso!');
                window.location.href = '../CoordenadorNovoAluno.html';
            </script>'";
        }
        else{
            echo "
            <script>
                alert('ERRO AO ADICIONAR NOVO ALUNO');
                window.location.href = '../CoordenadorNovoAluno.html';
            </script>'";
        }
         
    }


    /*if(isset($_POST['btn_enviarRelatorio'])){
         $p = new Pessoa();
 
         $resultado = $p->AdicionarDOC($_FILES['relatorio'], 1, "talithaSouza", "relatorio");
 
         if($resultado){
             echo"<script>
                     alert('Curriculo adicionado com sucesso');
                     window.location.href = '../inicialAlunoDisciplina.php';
                 </script>";
         }
          var_dump($_FILES['relatorio']);
         echo "<br/>primeiro form<br/>";
     }
     else{
         require_once('../Classes/ClassPessoa.php');
         echo "btn relatorio vazio <br/>";
     }

    if(isset($_POST['btn_EnviarCurriculo'])){
        $p = new Pessoa();

       // var_dump($_FILES['curriculo']);

        $resultado = $p->AdicionarDOC($_FILES['curriculo'], 1, "talithaSouza", "curriculo");

        if($resultado){
            echo"<script>
                    alert('Curriculo adicionado com sucesso');
                    window.location.href = '../inicialAlunoDisciplina.php';
                </script>";
        }
       // echo "segundo form <br/>";
    }
    else{
        require_once('../Classes/ClassPessoa.php');
        echo "btn curriculo vazio <br/>";
    }*/
?>