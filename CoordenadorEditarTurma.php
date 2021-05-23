<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorCadNovaTurma/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Cadastrar Nova Turma</title>
</head>

<body>
    <?php
           session_start();
           $_SESSION['id'] = $_GET['id'];
    ?>
    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-8 offset-1 mt-2">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary" disabled>Turmas</button></a>

                    <a href=""><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href=""><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <button class="btn btn-outline-secondary" style="height: 50px; border-radius: 16px; "><i class="fas fa-users" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspTURMAS</i></button>
                            
                        </div>

                        <div class="col-4 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="" style="text-decoration: none; color:rgb(73, 72, 161); display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-plus-circle" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbspCadastrar nova<br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbspturma</a>            
                        </div>

                        <div class="col-1 mt-3 " style="height: 7vh;">

                            <div style="border: 1px solid black; height: 7vh; width: 2px"></div>
                                        
                        </div>

                        <div class="col-2 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-file-alt" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbsp&nbspRelatórios</a>            
                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                    
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="loginInicial.html"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div class="col-12 mt-2" style="border: 1px solid black; height: 70%; background-color: rgb(175, 175, 166);"> 

                <div class="row">  

                    <div class="col-12 mt-4 offset-sm-5">

                        <div class="row">

                            <div class="col-1 sm-2 mt-4" 
                            style="border: 1px solid black; 
                                   width: 40px; height: 40px; 
                                   border-radius: 50%;
                                   background-color: rgb(68, 139, 68);">
                               <p style="display: flex; align-items: center; justify-content: center; margin-top: 50%; color: white">1</p>
                            </div>

                            <div class="col-1" style="border: 1px solid black; width: 10%; height: 1%; margin-top: 46px;">

                            </div>
                            
                            <div class="col-1 sm-2 mt-4" 
                            style="border: 1px solid black; 
                                   width: 40px; height: 40px; 
                                   border-radius: 50%;">
                               <p style="display: flex; align-items: center; justify-content: center; margin-top: 50%"><strong>2</strong></p>
                            </div>

                        </div>  

                    </div>
        <form method="POST" action="php/crud_turma.php">
                         <?php
                            include_once("Classes/ClassTurma.php");
                            $e = Turma::RetornaTurma($_GET['id']);
                            $exibir = Turma::TraduzChavesTurmas($e);
                         ?>
                    <div class="col-12 mt-4">

                        <div class="row">
                            <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 20px">

                                <label for="nome"><strong>Semestre:&nbsp</strong></label>
                                <select name = "semestreSelecionado" class="form-select btn btn-secondary" id="validationDefault04" required>
                                    <option selected disabled value=""><?php echo $exibir->CD_Semestre;?></option>
                                    <?php
                                        include_once('Classes/ClassSemestre.php');

                                        $semestre = semestre::GerarSemestre();
                                        for($i = 0; $i < count($semestre); $i++){
                                            echo"<option type = 'submit' value='".$semestre[$i]."'>".$semestre[$i]."</option>";
                                        }
                                                    
                                    ?>
                                   
                                </select>    

                            </div>

                            <div class="col-4 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 20px">

                                <label for="nome"><strong>Professor Responsável:&nbsp</strong></label>
                                <select name = "professor" class="form-select btn btn-secondary" id="validationDefault04" required>
                                    <option selected disabled value=""><?php echo $exibir->CD_Professor;?></option>
                                    <?php
                                        include_once('Classes/ClassPessoa.php');
                                        $professor = new Pessoa();

                                        $exibir = $professor->RetornaTabelaPessoaInArray('P');
                                        for($i = 0; $i < count($exibir); $i++){
                                            echo"<option type = 'submit' value='".$exibir[$i]->CD_Pessoa."'>".$exibir[$i]->CH_Nome."</option>";
                                        }
                                                    
                                    ?>
                                   
                                </select>
                            </div>
                        </div>
                        <?php
                            include_once("Classes/ClassTurma.php");
                            $e = Turma::RetornaTurma($_GET['id']);
                            $exibir = Turma::TraduzChavesTurmas($e);
                         ?>
                        

                        <div class="col-6 offset-sm-1" style="margin-top: 10%; border: 1px solid black; height: 20vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                            <h5 style="margin-top: -40px;">Horário</h5>
        
                            <div class="row">

                                <div class="col-12 offset-sm-1">

                                    <div class="row">

                                        <label for="nome" style="width: 7%; height: 5%; margin-top: 80px;"><strong>Dia</strong></label>
                                        <div class="col-2" style="margin-top: 60px; ">
                                        
                                            <select name="dia" class="form-select" style="background-color: rgb(175, 175, 166);">
                                                <option selected disabled value=""><?php echo $exibir->CH_Horario;?></option>
                                                <option value="2">Seg</option>
                                                <option value="3" required>Ter</option>
                                                <option value="4" required>Qua</option>
                                                <option value="5" required>Qui</option>
                                                <option value="6" required>Sex</option>
                                            </select>
                                        </div>

                                        <div name="horaI" class="md-form mx-5 my-5 col-4 offset-sm-1 form-group" style="display: flex; align-items: center; justify-content: center; margin-top: 55px">
                                            <label for="inputMDEx1"><strong>Horário&nbsp</strong></label>
                                            <input required type="time" id="inputMDEx1" class="form-control" name="horaI">
                                        </div>
        
                                    </div>                                

                                </div>
                                
                            </div> 
        
                        </div>
                        
                        <div class="col-1 offset-sm-10">

                            <div class="row">

                                <button name="btn_EditarTurma" type="submit" class="btn btn-primary" style="margin-right: 10px; margin-bottom: 8px; margin-top: 50px;"><a style="text-decoration: none; color: white">Editar</a></button>

                            </div>

                        </div>
                    

                    </div>

        </form>         
                </div>                     

            </div>
        

            
            
            <div class="col-8" style="margin-top: 5%;">

                <p>Coordenador Sobrenome</p>

            </div>


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>