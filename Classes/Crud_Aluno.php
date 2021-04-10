<?php
    //include('../BD/conexao.php');
    include('ClassPessoa.php');
    
  //  echo "aluno";

    if(isset($_POST['btn_cadastrar'])){
        $nome = $_POST['nome'].' '. $_POST['sobrenome'];
        $cpf = $_POST['cpf'];
        $tipo = $_POST['tipo'];
        $usuario = $_POST['usuario'];
        $senha = $_POST['senha'];

       // echo ($nome);
       // $p = new Pessoa();
        //$p->Imprimir($nome,$cpf,$usuario,$senha,$tipo);
        
    //********ISSO FAZ PARTE DA CLASSE ALUNO***************
        $p = new Pessoa();
        $resultado = $p->InserirNovoAluno($nome,$cpf,$usuario,$senha,$tipo);

        if($resultado == true){
            echo "Aluno inserido com sucesso";
        }
        else{
            echo "Erro ao inserir aluno";
        }

        /*$insert = "INSERT INTO pessoa (CH_Nome, CH_CPF, CH_Usuario, CH_Senha, VF_Tipo) VALUES (:nomeSobrenome,:cpf,:usuario,:senha,:tipo)";

            try{
                $result = $conect->prepare($insert);
                $result->bindParam(':nomeSobrenome', $nome, PDO::PARAM_STR);
                $result->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $result->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $result->execute();

            
            }
            catch(PDOException $e){
                echo "<strong> ERRO DE PDO = <strong>".$e->getMessage();
            }*/
            
    }
?>
