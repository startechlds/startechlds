<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/loginInicial/style.css">
    <title>Login</title>
</head>

 

<body>

    <div class="container">

        <div class="row">

            <div class="col-6 col-sm-12" style="display: flex; justify-content: center; margin-top: 190px;">

                <h2>Sistema de Gerência de Estágios (UVA)</h2>

            </div>

        </div>

        <form class="form-row" method="POST" action="">

            <div class="col-4 offset-sm-4 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 10px">

                <input type="email" id="usuario" name="usuario" placeholder="Usuário" class="form-control formInicial"/>

            </div>
        
            <div class="col-4 mt-1 offset-sm-4 form-group" style="display: flex; align-items: center; justify-content: center;">

                <input type="password" id="senha" name="senha" placeholder="Senha" required class="form-control formInicial"/>

            </div>

            <div class="row">

                <div class="col mt-4" style="display: flex; align-items: center; justify-content: center;">

                    <button class="btn btn-primary" name="btn_login" type="submit" >Entrar</button>

                </div>

            </div>
        </form>

        <?php
            include_once('BD/conexao.php');

            if(isset($_POST['btn_login'])){
                $usuario = filter_input(INPUT_POST,'usuario', FILTER_DEFAULT);
                $senha = filter_input(INPUT_POST,'senha', FILTER_DEFAULT);
                $conn = new ConexaoBD();
                $conect = $conn->ConDB();

                $select = "SELECT * FROM pessoa WHERE CH_Usuario=:usuarioLogin AND CH_Senha=:senhaLogin";


                try{
                    $resultLogin = $conect->prepare($select);
                    $resultLogin->bindParam(':usuarioLogin',$usuario, PDO::PARAM_STR);
                    $resultLogin->bindParam(':senhaLogin',$senha, PDO::PARAM_STR);
                    $resultLogin->execute();

                    $verificarRetorno = $resultLogin->rowCount();

                    if($verificarRetorno > 0){
                        $arr = $resultLogin->fetch(PDO::FETCH_ASSOC);
                        $tipoUsuario = $arr['VF_Tipo'];

                        session_start();
                        $_SESSION['Nome'] = $arr['CH_Nome'];
                        $_SESSION['loginSenha'] = $senha;
                        $_SESSION['tipoUsuario'] = $tipoUsuario;
                        $_SESSION['id_usuario'] = $arr['CD_Pessoa'];
                        if($tipoUsuario == 'A'){
                            header("Location: inicialAlunoVagas.php");
                        }
                        else if ($tipoUsuario == 'C' or $tipoUsuario == 'P'){
                            header("Location: BemVindoCoordenador.php");
                        }
                        
                    }
                    else{
                        echo '<div class="alert alingn alert-danger"><button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Erro!</strong> usuário ou senha incorretos, digite outro login ou contate o professor responsável pela disciplina de estágio :(</div>';
                    }
                    
                    
                }
                catch(PDOException $e){
                    echo('<br><br>');
                    echo("ERRRO<br>");
                    echo($e->getMessage());
                    //echo("<br>".$email." ".$senha);
                }

            }
        ?>
        
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>