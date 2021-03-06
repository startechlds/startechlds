<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmas/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Novo Aluno</title>
</head>

 

<body>
<?php
    session_start();
    if(isset($_GET['acao'])){
        if($_GET['acao'] == "editar"){
            setcookie("acaoA", "editar");
            if(empty($_GET['idAluno'])){
                echo "
                <script>
                    alert('Selecione um aluno para poder editá-lo');
                    window.location.href = 'CoordenadorTurmas.php'
                </script>";
            }
            else{
                setcookie("idAluno", $_GET['idAluno']);
                setcookie("idTurma", $_GET['id']);

            }
        }
            
    }
?>

    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-5 col-md-8 offset-1 mt-2 h-auto d-inline-block">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary" disabled>Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4 h-auto d-inline-block" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <button class="btn btn-outline-secondary h-auto d-inline-block" style="height: 50px; border-radius: 16px; "><i class="fas fa-users" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspTURMAS</i></button>    
                            
                        </div> 
                            
                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3 h-auto d-inline-block">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

           

            <div clas="row">

                <div class="col-12 h-auto d-inline-block" style="margin-top: 60px; background-color: rgb(175, 175, 166); height: 40%">

                    <div class="row">

                        <div class="col-2 offset-sm-1" style="margin-top: 70px;">

                            <img style="width: 7vw" src="https://image.flaticon.com/icons/png/512/43/43067.png" alt="...">

                        </div>

                        <div class="col-6" style="margin-top: 50px;">

                            <p class="bg bg-secondary" style="width: 20%; height: 13%; display: flex; align-items: center; justify-content: center;">Semestre 2021.1</p>

                            <div class="row">

                                <div class="col-12 mt-2">

                                    <form class="form-row" method="POST" action="php/CRUD_Aluno.php">
                                        <?php
                                            include_once("Classes/ClassPessoa.php");
                                            $p = new Pessoa();
                                            $exibir = $p->RetornaPessoa($_GET['idAluno']);
                                            $nome = explode(' ',$exibir->CH_Nome);
                                        ?>

                                        <div class="col-12 form-group" style="display: flex; align-items: center; justify-content: space-around;">

                                            <label for="nome"><strong>Nome&nbsp</strong></label>
                                            <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control formInicial" value="<?php echo $nome[0];?>"/>
                                
                                        
                                            <label for="nome"><strong>&nbsp&nbsp&nbspSobrenome&nbsp&nbsp</strong></label>
                                            <input type="text" id="nome" name="sobrenome" placeholder="Sobrenome" class="form-control formInicial" value="<?php echo $nome[1];?>"/>
                        
                                        </div>

                                        <div class="col-12 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                            <label for="nome"><strong>User&nbsp</strong></label>
                                            <input type="text" id="usuario" name="usuario" placeholder="Usuário" class="form-control formInicial" value="<?php echo $exibir->CH_Usuario;?>"/>
                                
                                        
                                            <label for="nome"><strong>&nbsp&nbsp&nbspSenha&nbsp</strong></label>
                                            <input type="password" id="senha" name="senha" placeholder="Senha" class="form-control formInicial"/>

                        
                                        </div>

                                        <div class="row">

                                            <div class="col-3 mt-4">
                                                
                                                <select class="form-select btn btn-secondary" id="validationDefault04" name="cbx_situacao">
                                                    <option selected disabled value="">Situação&nbsp</option>
                                                    <option>Cursando</option>
                                                </select>
                                                
                                            </div>
            
                                        </div>

                                        <div class="col-10 offset-sm-5" style="margin-top: 4%;">

                                            <button
                                                name="btn_Editar"
                                                class="btn btn-secondary btn-success" 
                                                style="margin-bottom: 8px;">
                                                <a 
                                                style="text-decoration: none; color: black"><strong style="color: white">Salvar</strong></a>
                                            </button>                           
                        
                                        </div>
                        
                        
                                    </form>

                                </div>

                            </div>

                           
                        </div>
                       
                    </div>
                    
                </div>

            </div>

            <div class="row">

                
              
            <div class="col-2" style="margin-top: 10%;">

                <label for="coordenador">
                    <strong>
                        <?php
                            if(isset($_SESSION['Nome']))
                                echo $_SESSION['Nome'];
                            else
                                echo "Usuário não logado"
                        ?>
                    </strong>
                </label>
    
            </div>

        </div>
            


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>