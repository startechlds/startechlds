<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmasSelect/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Coordenador - Turmas - Select</title>
</head>

 

<body>
    <?php
        setcookie('idTurmaSelecionada', $_GET['id']);
    ?>
    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-8 offset-1 mt-2 h-auto d-inline-block">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary" disabled>Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-2 h-auto d-inline-block" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <button class="btn btn-outline-secondary h-auto d-inline-block" style="height: 50px; border-radius: 16px; "><i class="fas fa-users" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspTURMAS</i></button>
                            
                        </div>

                        <div class="col-4 mt-2 h-auto d-inline-block" style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="CoordenadorCadNovaTurma.php" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-plus-circle" style="font-size: 30px; color: rgb(34, 32, 32);"></i>&nbspNova&nbspturma</a>            
                        </div>

                        <div class="col-1 mt-2 h-auto d-inline-block" style="height: 7vh;">

                            <div style="border: 1px solid black; height: 5vh; width: 2px"></div>
                                        
                        </div>

                        <div class="col-5 mt-2 h-auto d-inline-block" style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="CoordenadorVagasCurtidas.php" style="text-decoration: none; color:black; font-weight: bold;">
                                <i class="fas fa-thumbs-up" style="font-size: 20px; color: rgb(34, 32, 32);"></i>&nbsp&nbspVagas Interessadas</a>            
                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3 h-auto d-inline-block">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="CoordenadorTurmas.php"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div class="col-12 mt-4" style="border: 1px solid black; height: 13vh; background-color: rgb(175, 175, 166);"> 

                <div class="row">

                    <div class="col-3 offset-sm-1 mt-4">

                        <p><strong>Professor:</strong> Nome do professor</p>
                        <p style="margin-top: -8px;"><strong>Seg:</strong> 18:30 às 21:00</p>
                    </div>   
                       
                    <div class="col-2 sm-2 mt-4">
                        <select class="form-select btn btn-secondary" id="validationDefault04" required >
                            <option selected disabled >Estágio?</option>
                            <option>Sim</option>
                            <option>Não</option> 
                            <option>talvez</option>
                        </select>
                    </div>
                    
                    <div class="col-2 offset-sm-4 mt-4">

                        <button 
                            class="btn btn-secondary" 
                            style="margin-bottom: 8px;">
                            <a href="php/crud_turma.php?id=<?php echo $_GET['id']?>&finalizarTurma=verdade" onclick="return confirm('Deseja Finalizar Essa Turma')" 
                            style="text-decoration: none; color: black"><strong>Finalizar Turma</strong></a>
                        </button>                           
    
                    </div>

                </div>                     

            </div>

            <div clas="row">

                <div class="col-12 h-auto d-inline-block" style="margin-top: 70px; background-color: rgb(175, 175, 166); height: 50%">

                    <div class="row">

                    <div class="col-2 offset-sm-1 mt-4">
                        
                        <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="CoordenadorNovoAluno.html" style="text-decoration: none; color: black">Novo Aluno</a></button>                        

                        <form method = "GET">
                            <button name="btn_ApagarTurma" type="submit" class="btn btn-secondary" style="margin-bottom: 8px;"><a href="php/crud_turma.php?btn_ApagarTurma=<?php echo$_GET['id'];?>" onclick="return confirm('deseja remover essa turma')" style="text-decoration: none; color: black">Apagar Turma</a></button>
                            <button name="btn_EditarTurma" type="submit" class="btn btn-secondary" style="margin-bottom: 8px;"><a href="CoordenadorEditarTurma.php?id=<?php echo$_GET['id'];?>" style="text-decoration: none; color: black">Editar Turma</a></button>
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="DadosDoEstagio.php?acao=dEstagios&id=<?php echo $_GET['id']?>&idAluno=<?php if(!empty($_GET['idAluno'])) echo $_GET['idAluno'];?>" style="text-decoration: none; color: black">Inserir dados de Estágios</a></button>
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="DadosDasNotas.php?acao=INotas&id=<?php echo $_GET['id']?>&idAluno=<?php if(!empty($_GET['idAluno'])) echo $_GET['idAluno'];?>" style="text-decoration: none; color: black">Inserir notas</a></button>
                        </form>

                    </div>

                        <div class="col-8 h-auto d-inline-block mt-4">

                            <table class="table table-hover ">
                                <thead class="bg-secondary" style="text-align: center;">
                                  <tr>
                                    <th scope="col">Aluno</th>
                                    <th scope="col">Estágio?</th>
                                    <th scope="col">Empresa</th>
                                  </tr>
                                </thead>
                                <tbody style="text-align: center;">
                                    <?php
                                        include_once('Classes/ClassTurma.php');
                                        $t = new Turma();

                                        if(!isset($_GET['id'])){
                                            echo"Erro";
                                            exit;
                                        }
                                        else{
                                            $exibir = $t->RetornaTabelaAlunoEstagioEmpresa($_GET['id']);
                                            if($exibir != null){
                                                for($i = 0; $i < count($exibir); $i++){
                                                    echo "<tr>";
                                                        echo "<th scope='row'><a href='CoordenadorTurmasSelect.php?idAluno=".$exibir[$i]->IDAluno."&id=".$_GET['id']."' style='text-decoration: none; color: rgb(29, 28, 28)'>".$exibir[$i]->Aluno."</th>";
                                                        echo "<th scope='row'>".$exibir[$i]->Estagio."</th>";
                                                        echo "<th scope='row'>".$exibir[$i]->Empresa."</th>";
                                                    echo "</tr>";
                                                }
                                            }
                                            else{
                                                echo "<tr>";
                                                        echo "<th scope='row'>Não existe aluno nessa turma</th>";
                                                    echo "</tr>";
                                            }
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