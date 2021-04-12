<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Aluno</title>
</head>
<body>
    <form method="POST" action="#">
        <table align="left">
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" required></td>
            </tr>
            <tr>
                <td>Sobrenome:</td>
                <td><input type="text" name="sobrenome" required></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" required></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><input type="text" name="tipo" required></td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td><input type="email" name="usuario" required placeholder="nome_sobrenome@uva"></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_cadastrar" value="Cadastrar"></td>
            </tr>
        </table>
    <!--fim da table do form-->
    </form>

    <?php
        include('ClassPessoa.php');
        
        if(isset($_POST['btn_cadastrar'])){
            $nome = $_POST['nome'].' '. $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $tipo = $_POST['tipo'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $p = new Pessoa();
            $resultado = $p->InserirNovoAluno($nome,$cpf,$usuario,$senha,$tipo);

            if($resultado == true){
                echo "Aluno inserido com sucesso";
            }
            else{
                echo "Erro ao inserir aluno";
            }
        }
    ?>
    <table border="0.5" align="center">
        <tr>
            <th >ID.</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>CPF</th>
            <th>TIPO</th>
            <th>Usuário</th>
        </tr>
    <?php
        //include_once('../BD/conexao.php');
        
        $conn = new ConexaoBD();
        $conect = $conn->ConDB();

        $select = "SELECT * FROM pessoa";

         try{
             $result = $conect->prepare($select);
             $result->execute();

             $cont = 1;
             $contar = $result->rowCount();
             if($contar > 0){
                 while($exibir = $result->FETCH(PDO::FETCH_OBJ)){
                     $nome_sob = explode(" ", $exibir->CH_Nome);
            //Continua abaixo da tabela  
    ?>
        <tr>
            <td align="center"><?php echo $cont++;?></td>
            <td align="center"><?php echo $nome_sob[0];?></td>
            <td align="center"><?php echo $nome_sob[1];?></td>
            <td align="center"><?php echo $exibir->CH_CPF;?></td>
            <td align="center"><?php echo $exibir->VF_Tipo;?></td>
            <td align="center"><?php echo $exibir->CH_Usuario;?></td>
            <td><a href="Teste_CRUDAluno.php?acao=editar&id=<?php $exibir->CD_Pessoa;?>" class="btn-sucess" name="btn_editar" title="Editar Contato">EDITAR </a></td>
            <td> <a href="#" class="btn-sucess" title="Remover">APAGAR </a></td
        </tr>
        <?php
              }
            }
            else{
                echo "nenhum dado inserido ainda";
            }
        }
        catch(PDOExption $e){
            echo "ERRO de PDO". $e->getMessage();
        }
        ?>
    </table>
    
</body>
</html>