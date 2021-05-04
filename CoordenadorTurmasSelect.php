<html lang="en">
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

    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-8 offset-1 mt-2">

                    <a href=""><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary" disabled>Turmas</button></a>

                    <a href=""><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.html"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href=""><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <button class="btn btn-outline-secondary" style="height: 50px; border-radius: 16px; "><i class="fas fa-users" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspTURMAS</i></button>
                            
                        </div>

                        <div class="col-4 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
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

                    <button class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="#"><i class="fas fa-times"></i></a></button>
                    
                    <button class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="loginInicial.html"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div class="col-12" style="border: 1px solid black; height: 13vh; background-color: rgb(175, 175, 166);"> 

                <div class="row">

                    <div class="col-3 offset-sm-1 mt-4" style="">

                        <p><strong>Professor:</strong> Nome do professor</p>
                        <p style="margin-top: -8px;"><strong>Seg:</strong> 18:30 às 21:00</p>
                    </div>   
                       
                    <div class="col-2 sm-2 mt-4">
                        <select class="form-select btn btn-secondary" id="validationDefault04" required >
                            <option selected disabled >Estágio?</option>
                            <option>Sim</option>
                            <option>Não</option> 
                        </select>
                    </div>
                    
                    <div class="col-2 offset-sm-4" style="margin-top: 45px">

                        <button 
                            class="btn btn-secondary" 
                            style="margin-bottom: 8px;">
                            <a href="CoordenadorEditarProfessor.html" 
                            style="text-decoration: none; color: black"><strong>Finalizar Turma</strong></a>
                        </button>                           
    
                    </div>

                </div>                     

            </div>

            <div clas="row">

                <div class="col-12" style="margin-top: 70px; background-color: rgb(175, 175, 166); height: 50%">

                    <div class="row">

                        <div class="col-2 offset-sm-1" style="margin-top: 100px;">

                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="CoordenadorNovoAluno.html" style="text-decoration: none; color: black">Novo Aluno</a></button>
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="#" style="text-decoration: none; color: black">Editar Turma</a></button>
                            <button class="btn btn-secondary" style="margin-bottom: 8px;"><a href="#" style="text-decoration: none; color: black">Apagar Turma</a></button>

                        </div>

                        <div class="col-8" style="margin-top: 70px;">

                            <table class="table table-hover">
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
                                                        echo "<th scope='row'>".$exibir[$i]->Aluno."</th>";
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