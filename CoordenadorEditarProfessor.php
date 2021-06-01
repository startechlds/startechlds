<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmas/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Editar Professor</title>
</head>

 

<body>
    <?php
        if(isset($_GET['acao'])){
            if($_GET['acao'] == "editar"){
                setcookie("acaoP", "editar");
                if(empty($_GET['id'])){
                    echo "
                    <script>
                        alert('Selecione um professor para poder editá-lo');
                        window.location.href = 'CoordenadorProfessor.php';
                    </script>";
                }
                else{
                    setcookie("idProf", $_GET['id']);

                }
            }
                
        }
    ?>

    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-5 col-md-8 offset-1 mt-2">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary">Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary" disabled>Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-6 mt-4" 
                            style="border-radius: 18px;
                                   height: 5vh; display: flex;
                                   align-items: center; 
                                   justify-content: space-around;
                                    ">

                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-plus-circle" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbspCadastrar/Editar<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspProfessor</a>
                                
                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-lock-open" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbsp Liberar permissões</a>    
                            
                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="loginInicial.html"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

           

            <div clas="row">

                <div class="col-12" style="margin-top: 60px; background-color: rgb(175, 175, 166); height: 40%">

                    <div class="row">

                        <div class="col-2 offset-sm-1" style="margin-top: 30px;">

                            <img style="width: 7vw" src="https://img.icons8.com/ios/452/teacher.png" alt="...">

                        </div>

                        <div class="col-6" style="margin-top: 80px;">

                            <form class="form-row" method="POST" action="php/crud_professor.php">
                                <?php
                                    include_once("Classes/ClassPessoa.php");
                                    $p = new Pessoa();
                                    $exibir = $p->RetornaPessoa($_GET['id']);
                                    $nome = explode(' ',$exibir->CH_Nome);
                                ?>

                                <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: center;">
                                    <label for="nome"><strong>Nome&nbsp</strong></label>
                                    <input type="text" id="nome" value="<?php echo $nome[0];?>" name="nome" placeholder="Professor" class="form-control formInicial" required/>                
                                </div> 

                                <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 20px">
                                    <label for="nome"><strong>Sobrenome&nbsp</strong></label>
                                    <input type="text" id="nome" name="sbnome" placeholder="Sobrenome" value="<?php echo $nome[1];?>" class="form-control formInicial"/>
                
                                </div>
                
                               <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 50px">
                                    <label for="usuario"><strong>User&nbsp</strong></label>
                                    <input type="text" id="usuario" name="usuario" placeholder="nome de usuário" value="<?php echo $exibir->CH_Usuario;;?>"class="form-control formInicial" required/>
                
                                </div>

                                <div class="row">

                                    <div class="col-8" style="margin-top: 10%;">

                                        <label for="coordenador"></label>
                        
                                    </div>

                                    <div class="col-2 offset-sm-2" style="margin-top: 4%;">

                                        <button 
                                            class="btn btn-secondary btn-lg" 
                                            style="margin-bottom: 8px;"
                                            name="btn_editar">
                                            <a 
                                            style="text-decoration: none; color: black">Editar</a>
                                        </button>                           

                                    </div>

                            </div>

                            </form>

                        </div>

                        <div class="col-1 offset-sm-1" style="margin-top: 70px;">

                            <button 
                                class="btn btn-secondary" 
                                style="margin-bottom: 8px;">
                                <a href="CoordenadorEditarProfessor.html" 
                                style="text-decoration: none; color: black">Apagar</a>
                            </button>                           

                        </div>

                    </div>
                   
                </div>

            </div>

            <div class="row">

                <div class="col-8" style="margin-top: 10%;">

                    <label for="coordenador">Coordenador Sobrenome</label>
    
                </div>

            </div>
            


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>