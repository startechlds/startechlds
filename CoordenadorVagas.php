<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmasSelect/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Vagas</title>
</head>

 

<body>

    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-8 offset-1 mt-2">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary">Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary" disabled>Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <a href="CoordenadorEmpresas.html"><button class="btn btn-outline-secondary" style="height: 85%; border-radius: 16px; "><i class="far fa-handshake" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspEMPRESAS</i></button></a>
                            
                        </div>

                        <div class="col-1 offset-sm-1 mt-3 " style="height: 7vh;">

                            <div style="border: 1px solid black; height: 5vh; width: 2px"></div>
                                        
                        </div>

                        <div class="col-2 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="#" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-briefcase" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbspVagas</a>            
                        </div>

                        <div class="col-2 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-check-square" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbsp&nbspConvênios</a>            
                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="loginInicial.html"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div clas="row">

                <div class="col-12" style="margin-top: 70px; background-color: rgb(175, 175, 166); height: 70%">

                    <div class="row">

                        <div class="col-3 offset-sm-1">

                            <button
                                name="btn_AdcAluno"
                                class="btn btn-secondary btn-success col-7 mt-4">
                                <a href="CoordenadorVagaAdicionar.php" style="text-decoration: none; color: black"><strong style="color: white">Inserir nova vaga</strong></a>
                            </button>                  
            
                        </div>   

                    </div>      

                    <div class="row mt-4"> 

                        <div class="col-2 offset-sm-1">

                            <div class="col-12 form-group mt-4" >

                                <input style="border-radius: 30px;" required type="search" placeholder="Empresa" id="nome" name="nome" class="form-control formInicial" style="width: 15vw" />    

                            </div>

                        </div>

                        <div class="col-2">
                                    
                            <select class="form-select btn btn-secondary mt-4" id="validationDefault04" name="cbx_situacao">
                                <option selected disabled value="">Situação&nbsp</option>
                                <option value="0">Fechado</option>
                                <option value="1">Aberto</option>
                            </select>
                                   
                        </div>
                        
                        <div class="form-group row col-3 mt-4 offset-sm-1">
                            <label for="example-datetime-local-input" class="col-1 col-form-label">De:&nbsp</label>
                                <div class="col-8">
                                    <input class="form-control" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                        </div>

                        <div class="form-group row col-3 mt-4">
                            <label for="example-datetime-local-input" class="col-1 col-form-label">Até:</label>&nbsp
                                <div class="col-8">
                                    <input class="form-control" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-2 offset-sm-2" style="margin-top: 100px;">
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a title="" href="CoordenadorVagaEditar.php?acao=editar&id=<?php if(!empty($_GET['id'])) echo $_GET['id'];?>" style="text-decoration: none; color: black">Editar Vaga</a></button>&nbsp&nbsp&nbsp
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="php/crud_vaga.php?acao=apagar&id=<?php if(!empty($_GET['id'])) echo $_GET['id'];?> " onclick="return confirm('deseja remover essa vaga?')" style="text-decoration: none; color: black">Apagar</a></button>

                        </div>

                        <div class="col-6" style="margin-top: 70px;">
                            <table class="table table-hover">
                                    <thead class="bg-secondary" style="text-align: center;">
                                    <tr>
                                        <th scope="col">Cargo</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">Situação</th>
                                        <th scope="col">Data de publicação</th>
                                        <th scope="col">---</th>
                                    </tr>
                                    </thead>
                                    <tbody style="text-align: center;">
                                        <?php
                                            include_once('Classes/ClassVaga.php');
                                            $vaga = new Vaga();

                                            $exibir = $vaga->RetornaTabelaDadosVagas();
                                            for($i = 0; $i < count($exibir); $i++){
                                                echo"<tr>";
                                                    echo"<th scope='row'><a href='CoordenadorVagas.php?id=".$exibir[$i]->CD_Vaga."' style='text-decoration: none; color: rgb(29, 28, 28)'>".$exibir[$i]->CH_Cargo."</a></th>";
                                                    echo"<th>".$exibir[$i]->Empresa."</th>";
                                                    if($exibir[$i]->VF_Ativo == 1)
                                                        echo"<th>Aberta</th>";
                                                    else
                                                        echo"<th>Fechado</th>";
                                                    echo"<th>".$exibir[$i]->DT_Publicacao."</th>";
                                                    echo"<th><a href='Empresa_Convenio.php'>mais detalhes</a></th>";
                                                echo"</tr>";
                                            }
                                        ?>
                                    
                                    </tbody>
                                </table>
                        </div>

                    </div>

                    <div class="col-1 offset-sm-10">

                        <div class="row">

                            <button class="btn btn-secondary" 
                                    style="margin-right: 10px; margin-bottom: 8px; margin-top: 50px;">
                                    <a href="CoordenadorProfessor.html" style="text-decoration: none; color: black">Salvar</a></button>

                        </div>

                    </div>

                    
                </div>

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