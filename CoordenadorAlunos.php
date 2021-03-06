<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmas/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Alunos</title>
</head>

 

<body>

    
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

                <div class="col-4 col-md-2 offset-sm-1 mt-3 h-auto d-inline-block">

                    <button class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                    
                    <button class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="#"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div class="col-12" style="border: 1px solid black; height: 10vh; background-color: rgb(175, 175, 166);"> 

                <div class="col-6 offset-sm-3 mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                    <form action="" class="form-inline my-2 lg-0" >
                        <input type="search"  class="form-control" placeholder="Nome do aluno"  style="width: 18vw; background-color: rgb(194, 194, 181);">
                    </form>
                    
                    <?php
                        include_once('Classes/ClassSemestre.php');

                        $semestre = new Semestre();
                        $exibir = $semestre->TabelaSemestreINArray();
                    
                       
                        echo"<div class='col-2'>
                                <select class='form-select btn btn-secondary' id='validationDefault04' required>
                                    <option selected disabled value=''>Semestre&nbsp&nbsp</option>";
                        for($i = 0; $i < count($exibir); $i++){
                            echo"<option value='".$exibir[$i]->NUM_Semestre."'>".$exibir[$i]->NUM_Semestre."</option>";
                        }
                        echo"   </select>
                            </div>";
                    ?>

                    <div class="col-2">
                        <select class="form-select btn btn-secondary" id="validationDefault04" required>
                            <option selected disabled value="">Situa????o</option>
                            <option>Aprovado</option>
                            <option>Reprovado</option>
                            <option>Teste</option>
                        </select>
                    </div>
                    
                </div>          

            </div>

            <div clas="row">

                <div class="col-12 h-auto d-inline-block" style="margin-top: 70px; background-color: rgb(175, 175, 166); height: 50%">

                    <div class="row">

                        <div class="col-1 offset-sm-1" style="margin-top: 100px;">

                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="CoordenadorEditarProfessor.html" style="text-decoration: none; color: black">Editar/Inserir nota</a></button>
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="php/CRUD_Aluno.php?acao=apagar&id=<?php if(!empty($_GET['id'])) echo $_GET['id'];?> " onclick="return confirm('deseja remover esse Aluno?')"" style="text-decoration: none; color: black">Apagar</a></button>

                        </div>

                        <div class="col-8 offset-sm-1 h-auto" style="margin-top: 50px;">

                            <table class="table table-hover">
                                <thead class="bg-secondary" style="text-align: center;">
                                  <tr>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Semestre</th>
                                    <th scope="col">Situa????o</th>
                                  </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                  
                                    <?php
                                        include_once('Classes/ClassPessoa.php');
                                        $p = new Pessoa();

                                        $exibir = $p->RetornaTabelaTodosAluno();
                                        for($i = 0; $i < count($exibir); $i++){
                                            echo"<tr>";
                                            echo"<th scope='row'><a href='CoordenadorAlunos.php?acao=editar&id=".$exibir[$i]->CD_Pessoa."' style='text-decoration: none; color: rgb(29, 28, 28)'>".$exibir[$i]->CH_Nome."</a></th>";
                                           // echo"<th scope='row'>".$exibir[$i]->CH_Nome."</th>";
                                            echo"<td>".$exibir[$i]->CD_Semestre."</td>";
                                            echo"<td>".$exibir[$i]->CH_Situacao."</td>";
                                            echo"</tr>";
                                        }
                                    ?>
                                   
                                </tbody>
                              </table>

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