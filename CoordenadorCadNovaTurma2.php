<html lang="PT-BR">
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
                        
                    <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>
    
                </div>               

            </div>

            <div class="col-12 mt-2 h-auto d-inline-block" style="border: 1px solid black; height: 50%; background-color: rgb(175, 175, 166);"> 

                <div class="row">  

                    <div class="col-12 mt-4 offset-sm-5">

                        <div class="row">

                            <div class="col-1 sm-2 mt-4" 
                            style="border: 1px solid black; 
                                   width: 40px; 
                                   height: 40px; 
                                   border-radius: 50%;">
                               <p style="display: flex; align-items: center; justify-content: center; margin-top: 50%;"><strong>1</strong></p>
                            </div>

                            <div class="col-1" style="border: 1px solid black; width: 10%; height: 1%; margin-top: 46px;">

                            </div>
                            
                            <div class="col-1 sm-2 mt-4" 
                            style="border: 1px solid black; 
                                   width: 40px; 
                                   height: 40px; 
                                   border-radius: 50%;
                                   background-color: rgb(68, 139, 68);">
                               <p style="display: flex; align-items: center; justify-content: center; margin-top: 50%; color: white">2</p>
                            </div>

                        </div>  

                    </div>

                    <div class="col-12 mt-4">

                        <div class="row">

                            <form class="form-row">
                            <?php 
                                echo($_COOKIE['semestre']);
                            ?>

                                <div class="col-10 offset-sm-1 form-group" style="display: flex; align-items: center; justify-content: space-around;">

                                    <label for="nome"><strong>Nome&nbsp</strong></label>
                                    <input type="text" id="nome" name="nome" placeholder="Nome" class="form-control formInicial" required/>
                        
                                
                                    <label for="nome"><strong>&nbsp&nbsp&nbspSobrenome&nbsp&nbsp</strong></label>
                                    <input type="text" id="nome" name="nome" placeholder="Sobrenome" class="form-control formInicial"/>

                                    <div class="col-4 offset-sm-2" style="border: 1px solid black; height: 20vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                                        <h5 style="margin-top: -40px; display: flex; align-items: center; justify-content: center;">Alunos já cadastrados</h5>
                    
                                        <div class="row">
            
                                           <p style="display: flex; align-items: center; justify-content: center; margin-top: 25%">VAZIO</p>
                                            
                                        </div> 
                    
                                    </div>
                
                                </div>

                                <div class="col-5 offset-sm-1 form-group" style="display: flex; align-items: center; justify-content: space-around;">

                                    <label for="nome"><strong>User&nbsp</strong></label>
                                    <input type="text" id="usuario" name="usuario" placeholder="Usuário" class="form-control formInicial" required/>
                        
                                
                                    <label for="nome"><strong>&nbsp&nbsp&nbspSenha&nbsp</strong></label>
                                    <input type="password" id="senha" name="senha" placeholder="Senha" class="form-control formInicial"/>
                
                                </div>                               
                
                            </form>                            
                           
                        </div>

                        

                    </div>

                    <div class="col-1 offset-sm-10">

                        <div class="row">

                            <button class="btn btn-primary" style="margin-right: 10px; margin-bottom: 8px; margin-top: 50px;"><a href="#" style="text-decoration: none; color: white">Salvar</a></button>

                        </div>

                    </div>

                    
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