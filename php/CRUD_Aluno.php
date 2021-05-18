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

?>