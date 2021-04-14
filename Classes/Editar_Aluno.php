<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if(!isset($_GET['id'])){
            echo"Erro";
            exit;
        }
        else{
           // require_once("ClassPessoa.php");
            $id = $_GET['id'];

            $p = new Pessoa();

            $exibir = $p->RetornaPessoa($id);
            //var_dump($vet);
            $nome = explode(" ", $exibir->CH_Nome);

        }
    ?>
    <form method="POST" action="#">
        <table align="center">
            <tr>
                <td>Nome:</td>
                <td><input type="text" name="nome" value=<?php echo $nome[0];?> required></td>
            </tr>
            <tr>
                <td>Sobrenome:</td>
                <td><input type="text" name="sobrenome" value=<?php echo $nome[1];?> required></td>
            </tr>
            <tr>
                <td>CPF:</td>
                <td><input type="text" name="cpf" value=<?php echo $exibir->CH_CPF;?> required></td>
            </tr>
            <tr>
                <td>Tipo:</td>
                <td><input type="text" name="tipo" value=<?php echo $exibir->VF_Tipo;?> required></td>
            </tr>
            <tr>
                <td>Usuario</td>
                <td><input type="email" name="usuario" value=<?php echo $exibir->CH_Usuario;?> required placeholder="nome_sobrenome@uva"></td>
            </tr>
            <tr>
                <td>Senha:</td>
                <td><input type="password" name="senha" value=<?php echo $exibir->CH_Senha;?> required></td>
            </tr>
            <tr>
                <td><input type="submit" name="btn_Editar" value="Editar"></td>
            </tr>
        </table>
    </form>
    <?php
       // include_once('ClassPessoa.php');
        
        if(isset($_POST['btn_Editar'])){
            $nome = $_POST['nome'].' '. $_POST['sobrenome'];
            $cpf = $_POST['cpf'];
            $tipo = $_POST['tipo'];
            $usuario = $_POST['usuario'];
            $senha = $_POST['senha'];

            $p = new Pessoa();
            $resultado = $p->EditarPessoa($id, $nome,$cpf,$usuario,$senha,$tipo);

            if($resultado == true){
                header("location: Teste_CRUDAluno.php");
                sleep (3);
            }
            else{
                echo "Erro ao editar aluno";
            }
        }
        else{
            echo"vazio";
        }
    ?>
</body>
</html>