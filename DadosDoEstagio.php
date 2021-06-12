<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/DadosDoEstagio/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Dados do Estágio</title>
</head>

 

<body>

    <?php
        session_start();
        if(isset($_GET['acao'])){
            if($_GET['acao'] == "dEstagios"){
                setcookie("acaoA", "dEstagios");
                if(empty($_GET['idAluno'])){
                    echo "
                    <script>
                        alert('Selecione um aluno para poder ver os dados do estagio');
                        window.location.href = 'CoordenadorTurmasSelect.php?id=".$_GET['id']."'
                    </script>";
                }
                else{
                    include_once("Classes/ClassEstagio.php");

                    setcookie("idAluno", $_GET['idAluno']);
                    setcookie("idTurma", $_GET['id']);

                    $es = new Estagio();

                    $exibir = $es->RetornaDadosEstagio($_GET['id'], $_GET['idAluno']);
                    if($exibir != null){
                        setcookie("vf_concluido", $exibir->VF_Ativo);
                        setcookie("j_estagiou", $exibir->VF_JaEstagiou);
                    }
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

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                        
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
                        include_once("Classes/ClassEstagio.php");
                        $es = new Estagio();

                        $exibir = $es->RetornaDadosEstagio($_GET['id'], $_GET['idAluno']);


                   ?>
                    <div class="row mt-4"> 

                        <div class="col-2 offset-sm-1">
                                    
                           
                                           
                        </div>
                        
                        <div class="col-1 mt-4">
                                    
                            <div class="form-check">
                                <?php
                                    if($exibir != null){
                                        if($exibir->VF_Ativo == 0){
                                            echo "<input name='concluido' class='form-check-input' type='checkbox' value='0' checked id='flexCheckDefault'>";
                                          //  $_COOKIE['vf_concluido'] = 0;
                                        }
                                        else{
                                            echo "<input name='concluido' class='form-check-input' type='checkbox' value='0' id='flexCheckDefault'>";
                                           // $_COOKIE['vf_concluido'] = $exibir->VF_Ativo;
                                        }
                                    }
                                    else{
                                        echo "<input name='concluido' class='form-check-input' type='checkbox' value='0' id='flexCheckDefault'>";
                                       // $_COOKIE['vf_concluido'] = $exibir->VF_Ativo;
                                    }
                                   // $_POST['vf_concluido'] = 1;
                                ?>
                                
                                <label class="form-check-label" for="flexCheckDefault">
                                   <strong> Concluído </strong>
                                </label>
                            </div>
                                   
                        </div>     
                            
                        <div class="form-group row col-3 mt-3 offset-sm-1">
                            <label for="example-datetime-local-input" class="col-2 col-form-label" ><strong>Data Inicial:</strong>&nbsp&nbsp</label>
                                <div class="col-8 mt-2">
                                <input style="margin-left: 8px" class="form-control" name="dt_inicio" type="date" 
                                    <?php
                                                if($exibir != null){
                                                    $data = $exibir->DT_Inicio;
                                                    echo "value='$data'";
                                                }
                                                else
                                                    echo "value='2021-06-19T13:45:00'";
                                    ?>
                                    id="example-datetime-local-input">
                                </div>
                        </div>

                        <div class="form-group row col-3 mt-3">
                            <label for="example-datetime-local-input" class="col-2 col-form-label"><strong>Data Final:</strong></label>
                                <div class="col-8 mt-2">
                                    
                                <input style="margin-left: 8px" class="form-control" type="date"  name="dt_final"
                                    <?php
                                        if($exibir != null){
                                            $data = $exibir->DT_Final;
                                            echo "value='$data'";
                                        }
                                        else
                                            echo "value='2021-06-19T13:45:00'";
                            ?>
                                    id="example-datetime-local-input">
                                </div>
                        </div>                      

                    </div>

                    <div class="row mt-4"> 

                        <div class="col-3 offset-sm-2 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">
                            <?php
                               
                                include_once('Classes/ClassEmpresa.php');
                                $empresa = new Empresa(); 

                                
                            ?>
                            <label for="nome"><strong>Empresa:&nbsp</strong></label>
                             <select class='form-select btn btn-secondary' id='validationDefault04' name ='cbx_Empresa' require>
                                    <?php
                                        
                                        $emp = null;
                                        $dadosEmp = $empresa->RetornaTabelaEmpresaInArray();
                                        if($exibir != null){
                                            $emp = $empresa->RetornaEmpresa($exibir->CD_Empresa);
                                            echo"<option selected value='".$emp->CD_Empresa."' require>".$emp->CH_Fantasia."</option>";
                                            $_POST['cbx_Empresa'] = $emp->CD_Empresa;
                                        }
                                        else
                                            echo"<option selected disabled value='".null."'>Empresa</option>";
                                        for($i = 0; $i < count($dadosEmp); $i++){
                                            echo"<option type = 'submit' value='".$dadosEmp[$i]->CD_Empresa."' require>".$dadosEmp[$i]->CH_Fantasia."</option>";
                                        }
                                    ?>
                                </select>

                        </div>

                        <div class="col-1 mt-4">
                                    
                            <div class="form-check mt-2 offset-sm-1">
                                <?php
                                    if($emp != null){
                                        if($emp->DOC_Convenio != null)
                                            echo '<input class="form-check-input" type="checkbox" checked disabled value="" id="flexCheckDefault">';
                                        else
                                        echo '<input class="form-check-input" type="checkbox" disabled value="" id="flexCheckDefault">';
                                    }
                                ?>
                                <input class="form-check-input" type="checkbox"  disabled value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   <strong> Convênio </strong>
                                </label>
                            </div>
                                   
                        </div>     

                        <div class="form-group row col-4 mt-3 offset-sm-1">
                            <label name="dt_expira" for="example-datetime-local-input" class="col-3 col-form-label mt-1"><strong>Expira em:</strong></label>
                                <div class="col-5 mt-2">
                                    <input class="form-control col-6" type="text" disabled 
                                    value="<?php
                                                if($emp != null){
                                                    if($emp->DOC_Convenio != null)
                                                        echo date_create_from_format("Y-m-d", $emp->DT_ExpiracaoConvenio)->format("d/m/Y");
                                                    else
                                                    echo '';
                                                }
                                            ?>" 
                                id="example-datetime-local-input">
                                </div>
                        </div>                      

                    </div>

                    <div class="row mt-4"> 

                        <div class="form-check mt-2 offset-sm-1 mt-4">
                                <?php
                                     if($exibir != null){
                                        if($exibir->VF_JaEstagiou == 1){
                                            echo '<input class="form-check-input mt-4" name = "jEstagio" checked type="checkbox" value="1" id="flexCheckDefault">';
                                           
                                        }
                                        else{
                                            echo '<input class="form-check-input mt-4" name = "jEstagio" type="checkbox" value="1" id="flexCheckDefault">';
                                            
                                        }
                                     }
                                     else{
                                        echo '<input class="form-check-input mt-4"  name = "jEstagio" type="checkbox" value="1" id="flexCheckDefault">';
                                     }
                                ?>
                            
                            <label class="form-check-label mt-4" for="flexCheckDefault">
                                <strong> Aluno(a) já estagiou nessa empresa</strong>
                            </label>
                        </div>                    

                    </div>
                    
                    <div class="col-2 offset-sm-6" style="margin-top: 10%">

                        <button 
                            class="btn btn-primary" 
                            style="margin-bottom: 8px;"
                            name="btn_Cancelar">
                            <a style="text-decoration: none;" href="CoordenadorTurmasSelect.php?id=<?php echo $_GET['id'];?>" >Cancelar</a>
                        </button>   

                        <button 
                            class="btn btn-primary" 
                            style="margin-bottom: 8px;"
                            name="btn_salvarEstagio">
                            <a style="text-decoration: none;">Salvar</a>
                        </button>                               

                    </div>

                    <div class="col-3 offset-sm-10">

                                             

                    </div>
                    
                </div>
            </form>

                

            </div>

            
            <div class="col-8" style="margin-top: 2%;">

                <p>Coordenador Sobrenome</p>

            </div>


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>