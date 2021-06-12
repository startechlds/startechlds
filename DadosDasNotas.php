<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/DadosDoEstagio/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Dados do Estágio - Final</title>
</head>

 

<body>
    <?php
        session_start();
        if(isset($_GET['acao'])){
            if($_GET['acao'] == "INotas"){
                setcookie("acaoA", "INotas");
                if(empty($_GET['idAluno'])){
                    echo "
                    <script>
                        alert('Selecione um aluno para poder editar as notas');
                        window.location.href = 'CoordenadorTurmasSelect.php?id=".$_GET['id']."'
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

                <div class="col-8 col-md-8 offset-1 mt-2 h-auto d-inline-block">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary">Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary" disabled>Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4 h-auto d-inline-block" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <button class="btn btn-outline-secondary h-auto d-inline-block" style="height: 50px; border-radius: 16px; "><i class="fas fa-user-graduate" 
                            style="font-size: 30px; color: rgb(34, 32, 32);"></i>&nbsp<strong>Alunos</strong></button>

                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="CoordenadorTurmasSelect.php?id=<?php echo $_GET['id'];?>"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>
            <h2 class="mt-4" style="display: flex; align-items: center; justify-content: center"> Dados Estágio </h2>
            <div clas="row">

                

                <div class="col-12 h-auto d-inline-block" style="margin-top: 50px; background-color: rgb(175, 175, 166); height: 70%">
                        <?php
                            include_once("Classes/ClassTurma.php");
                           include_once("Classes/ClassPessoa.php");
                            $t = new Turma();
                            $p = new Pessoa();

                            $dadosP = $p->RetornaPessoa($_GET['idAluno']);
                            $dadosT = $t->RetornaTurma($_GET['id']);
                        ?>

                     <div class="row mt-4">
                         
                        <div class="col-2 mt-4 offset-sm-2">
                                    
                            <i class="fas fa-user" style="font-size: 50px;"></i>&nbsp&nbsp&nbsp<?php echo $dadosP->CH_Nome;?>
                                           
                        </div>

                        <div class="col-2 offset-sm-1">

                            <div class="col-12 form-group mt-4" >
                            

                                <p style="border: 1px solid rgb(28,28,28); height: 4vh; padding: 5px; display: flex; align-items: center; justify-content: center; color: grey11"><strong>Semestre <?php echo $dadosT->CD_Semestre;?></strong></p>   

                            </div>

                        </div>

                        <div class="col-2 offset-sm-1">
                                   
                        </div>

                    </div>

                    <div>

                        <p style="border: 1px dashed black; width: 100%;" class="mt-4"></p>

                    </div>

                    <form method="POST" action="php/CRUD_Aluno.php">
                    <?php
                        $dadosN = $p->RetornaNotasAluno($_GET['idAluno']);

                      //  var_dump($dadosN);
                        $vf = $dadosN == null ? true: false;
                    ?>

                        <div class="row mt-4"> 

                            <div class="col-3 offset-sm-1">
                                        
                                <select class="form-select btn btn-secondary mt-4" id="validationDefault04" name="cbx_situacaoRelatorio">
                                  <?php 
                                    if(!$vf){
                                        switch ($dadosN->CH_SituacaoRelatorio){
                                            case "NP":
                                                echo "<option selected value='NP'>Relatório: Não Postado</option>";
                                                break;
                                            case "RA":
                                                echo "<option selected value='RA'>Relatório: Para revisão do aluno</option>";
                                                break;
                                            case "AP":
                                                echo "<option selected value='AP'>Relatório: Aprovado</option>";
                                                break;
                                        }
                                       
                                    }
                                    else{
                                       echo "<option selected disabled value=''>Situação do relatório </option>";
                                    }

                                    echo "<option value='NP'>Não Postado </option>";
                                    echo "<option value='RA'>Para Revisão do Aluno </option>";
                                    echo "<option value='AP'>Aprovado </option>";
                                  ?>
                                </select>
                                            
                            </div>

                            <div class="col-3 offset-sm-1">
                                <input type="text" class="btn btn-secondary mt-4" id="validationDefault04"
                                 value="<?php if(!$vf) echo "Situação: ". $dadosN->CH_SitucaoAluno;?>"
                                 name="situacaoAluno">     
                                            
                            </div>
                                
                        </div>

                            <div class="offset-sm-1 col-3" style="border: 1px solid black; margin-top: 60px; padding: 10px">     

                                <h4 class="offset-sm-1"> Notas </h4>

                                <div class="row mt-3">
                                    
                                    <div class="col-4 offset-sm-7 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                        <label for="nome"><strong>AP1:&nbsp</strong></label>
                                        <input type="text" id="nome" name="n1" class="form-control formInicial" value="<?php if(!$vf) echo $dadosN->N1;?>"/>

                                    </div>

                                </div>
                                <div class="row mt-1">
                                    
                                    <div class="col-4 offset-sm-7 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                        <label for="nome"><strong>AP2:&nbsp</strong></label>
                                        <input type="text" id="nome" name="n2" class="form-control formInicial" value="<?php if(!$vf) echo $dadosN->N2;?>"/>

                                    </div>

                                </div>
                                <div class="row mt-1">
                                    
                                    <div class="col-4 offset-sm-7 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                        <label for="nome"><strong>AP3:&nbsp</strong></label>
                                        <input type="text" id="nome" name="n3" class="form-control formInicial" value="<?php if(!$vf) echo $dadosN->N3;?>"/>

                                    </div>

                                </div>
                                <div class="row mt-1">
                                    
                                    <div class="col-4 offset-sm-7 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                        <label for="nome"><strong>NAF:&nbsp</strong></label>
                                        <?php
                                            if(!$vf){
                                                if($dadosN->CH_SitucaoAluno == "Avaliação Final")
                                                    echo"<input type='text' id='nome' name='naf' class='form-control formInicial' required/>";
                                                else
                                                    echo"<input type='text' id='nome' name='naf' disabled class='form-control formInicial' required value= '".$dadosN->NF."'/>";
                                            }
                                        ?>

                                    </div>

                                </div>

                                <div class="row mt-1">
                                    
                                    <div class="col-4 offset-sm-7 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                        <label for="nome"><strong>Media Final:&nbsp</strong></label>
                                        <input type="text" id="nome" name="media" disabled class="form-control formInicial" value="<?php if(!$vf) echo $dadosN->MEDIA;?>"/>

                                    </div>

                                </div>

                            </div>
                            
                            <div class="col-2 offset-sm-6" style="margin-top: 10%">

                                <button 
                                    class="btn btn-primary" 
                                    style="margin-bottom: 8px;"
                                    type = "submit"
                                    name="btn_salvarNotas">
                                    <a style="text-decoration: none;">Salvar Notas</a>
                                </button>                           

                            </div>
                            
                            </div>

                            

                        </div>
                    </form>
            
            <div class="col-8" style="margin-top: 2%;">

                <p>
                    <strong>
                        <?php
                            if(isset($_SESSION['Nome']))
                                echo $_SESSION['Nome'];
                            else
                                echo "Usuário não logado"
                        ?>
                    </strong>
                </p>

            </div>


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>