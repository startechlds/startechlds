<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmasSelect/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Adicionar Vaga</title>
</head>

 

<body>

    
    <div class="container">
           
            <div class="row" style="height: 15vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-8 offset-1 mt-2 h-auto d-inline-block">

                    <a href="CoordenadorTurmas.php"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary">Turmas</button></a>

                    <a href="CoordenadorProfessor.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Professor</button></a>

                    <a href="CoordenadorAlunos.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Alunos</button></a>

                    <a href="CoordenadorEmpresas.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary" disabled>Empresas</button></a>
        
                    <div class="row">

                        <div class="col-2 mt-4 h-auto d-inline-block" style="border-radius: 18px; height: 5vh; display: flex; align-items: center; justify-content: center;">

                            <a href="CoordenadorEmpresas.html"><button class="btn btn-outline-secondary" style="height: 85%; border-radius: 16px; "><i class="far fa-handshake" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspEMPRESAS</i></button></a>
                            
                        </div>

                        <div class="col-1 offset-sm-1 mt-3 h-auto d-inline-block" style="height: 7vh;">

                            <div style="border: 1px solid black; height: 5vh; width: 2px"></div>
                                        
                        </div>

                        <div class="col-2 mt-4 h-auto d-inline-block" style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="#" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-briefcase" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbspVagas</a>            
                        </div>

                        <div class="col-2 mt-4 h-auto d-inline-block" style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="CoordenadorEmpresasConvenio.php" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                                <i class="fas fa-check-square" style="font-size: 40px; color: rgb(34, 32, 32);"></i>&nbsp&nbspConv??nios</a>            
                        </div>

                    </div>
    
                </div>

                <div class="col-4 col-md-2 offset-sm-1 mt-3 h-auto d-inline-block">

                    <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="CoordenadorVagas.html"><i class="fas fa-times"></i></a></button>
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>

                </div>               

            </div>

            <div clas="row">

                <div class="col-12" style="margin-top: 60px; background-color: rgb(175, 175, 166); height: 70%">

                    <div class="row">

                        <h3 class="offset-sm-5 mt-4">Adicionar Vaga</h3>

                        <div class="col-6 offset-sm-3" style="margin-top: 50px;">

                            <div class="row">

                                <div class="col-12 mt-2">

                                    <form class="form-row" method="POST" action="php/crud_vaga.php" >

                                        <div class="col-12 form-group" style="display: flex; align-items: center; justify-content: space-around;">

                                            <label for="nome"><strong>Cargo:&nbsp</strong></label>
                                            <input type="text" id="nome" name="cargo" placeholder="Seu cargo" class="form-control formInicial"  require/>
                                            
                                
                                            <div class="col-5 offset-sm-1">
                                                <select class='form-select btn btn-secondary' id='validationDefault04' name ='cbx_Empresa' require>
                                                    <?php
                                                        include_once('Classes/ClassEmpresa.php');
                                                        $empresa = new Empresa();

                                                        $exibir = $empresa->RetornaTabelaEmpresaInArray();
                                                        echo"<option selected disabled value='".null."'>Empresa</option>";
                                                        for($i = 0; $i < count($exibir); $i++){
                                                            echo"<option type = 'submit' value='".$exibir[$i]->CD_Empresa."'>".$exibir[$i]->CH_Fantasia."</option>";
                                                        }
                                                    ?>
                                                </select>
                                                
                                            </div>
                                            
                        
                                        </div>

                                        <div class="col-12 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                            <div class="col-6" style="display: flex; align-items: center; justify-content: center">

                                                <label for="nome"><strong>Valor da Bolsa:&nbsp</strong></label>
                                            <input type="number" id="usuario" name="valor_bolsa" class="form-control formInicial" placeholder="R$"/>

                                            </div>
                                            
                                            <div class="col-4 offset-sm-2" style="display: flex; align-items: center; justify-content: space-around">

                                                <label for="example-number-input" class="col-3 col-form-label"><strong>Quantidade:&nbsp&nbsp&nbsp</strong></label>
                                                <div class="col-4">
                                                    <input class="form-control" type="number" value="1" name ="qtd" id="example-number-input">
                                                </div>

                                            </div>
                                                                                                           
                                        </div>

                                        <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                            <label for="nome"><strong>Horas Semanais&nbsp</strong></label>
                                            <input type="text" id="usuario" name="HSemanais" placeholder="X horas Semanais" class="form-control formInicial" />
                        
                                        </div>                       
                        
                                    

                                </div>

                                        <div class="row">

                                            <div class="col-10">

                                                <div class="form-group mt-4">
                                                    <label for="exampleTextarea" ><strong>Descri????o da vaga:</strong></label>
                                                    <textarea style="margin-top: 3%" class="form-control" id="exampleTextarea" name = "descricao" rows="3"></textarea>
                                                </div>

                                            </div>    
                                                

                                            <div class="col-2" style="margin-top: 10%;">

                                                <div class="col-1 offset-sm-11" style="margin-top:3%;">
                    
                                                    <a ><button name="btn_novaVaga" class="btn btn-primary">Salvar</button></a>
                                        
                                                </div>
                
                                            </div>

                                        </div> 
                                    </form>                               

                            </div>
                         
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