<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmasSelect/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Editar - Empresa</title>
</head>

 

<body>

    <?php
        if(isset($_GET['acao'])){
            if($_GET['acao'] == "editar"){
                setcookie("acaoEmp", "editar");
                if(empty($_GET['id'])){
                    echo "
                    <script>
                        alert('Selecione uma empresa para poder editá-la');
                        window.location.href = 'CoordenadorEmpresas.php';
                    </script>";
                }
                else{
                    setcookie("idEmp", $_GET['id']);

                }
            }
                
        }
    ?>
    
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

                            <button class="btn btn-outline-secondary" style="height: 85%; border-radius: 16px; "><i class="far fa-handshake" 
                                style="font-size: 20px; color: rgb(34, 32, 32);">&nbspEMPRESAS</i></button>
                            
                        </div>

                        <div class="col-1 offset-sm-1 mt-3 " style="height: 7vh;">

                            <div style="border: 1px solid black; height: 5vh; width: 2px"></div>
                                        
                        </div>

                        <div class="col-2 mt-3 " style="height: 7vh; display: flex; align-items: center; justify-content: center;">

                            <a href="" style="text-decoration: none; color:black; display: flex; align-items: center; justify-content: center; font-weight: bold;">
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

            <div class="row">

                <h2 class="mt-4" style="display: flex; align-items: center; justify-content: center;">Editar Empresa</h2>
                <div class="col-10 offset-sm-1" style=" margin-top: 80px; border: 1px solid black; height: 60vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                    
                    <h5 style="margin-top: -40px;">Dados da Empresa</h5>

                    <div class="row">

                        <div class="col-10 offset-sm-1 mt-2">

                            <form class="form-row" method="POST" action="php/crud_empresa.php">
                                <?php
                                    include_once("Classes/ClassEmpresa.php");
                                    $emp = new Empresa();
                                    $exibir = $emp->RetornaEmpresa($_GET['id']);
                                    $nome = explode(' ',$exibir->CH_NomeResponsavel);
                                ?>

                                <div class="col-10 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                                    <label for="nome"><strong>Nome:&nbsp</strong></label>
                                    <input type="text" id="nome" name="nome_fantasia" placeholder="Nome" class="form-control formInicial" value="<?php echo $exibir->CH_Fantasia?>" required/>
                        
                                
                                    <label for="nome"><strong>&nbsp&nbsp&nbspCNPJ:&nbsp&nbsp</strong></label>
                                    <input type="text" id="nome" name="CNPJ" placeholder="Digite seu CNPJ" class="form-control formInicial" required value="<?php echo $exibir->CH_CNPJ?>"/>
                
                                </div>

                                <div class="col-10 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                    <label for="nome"><strong>Nome do sócio 1:</strong></label>
                                    <input style="width: 30%" type="text" id="usuario" name="usuario" placeholder="Nome do sócio 1" class="form-control formInicial" />
                        
                                
                                    <label for="nome"><strong>Nome do sócio 2:</strong></label>
                                    <input style="width: 30%" type="password" name="senha" placeholder="Nome do sócio 2" class="form-control formInicial"/>
             
                                </div>

                                <h5 style="margin-top: 50px">Endereço:</h5>

                                <div class="col-10 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 27px">

                                    <label for="nome"><strong>Rua:</strong></label>
                                    <input style="width: 65%" type="text" name="rua_empresa" placeholder="Nome da rua" class="form-control formInicial" value="<?php echo $exibir->CH_RuaEmpresa?>" required/>
                        
                                
                                    <label for="nome"><strong>Nº:</strong></label>
                                    <input style="width: 20%" type="text" name="num_empresa" class="form-control formInicial" value="<?php echo $exibir->CH_NumeroEmpresa?>" required/>
             
                                </div>

                                <div class="col-8 form-group" style="display: flex; align-items: center; margin-top: 40px">

                                    <label for="nome"><strong>&nbspBairro:&nbsp</strong></label>
                                    <input style="width: 70%" type="text" id="usuario" name="bairro_empresa" placeholder="Nome do bairro" class="form-control formInicial" value="<?php echo $exibir->CH_BairroEmpresa?>" required/>        
             
                                </div>
                                
                                <div class="col-10 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                    <label for="nome"><strong>Telefone para contato:</strong></label>
                                    <input style="width: 30%" type="text" id="usuario" name="telefone_empresa" placeholder="(00) 00000-0000" class="form-control formInicial" value="<?php echo $exibir->CH_TelefoneEmpresa?>" required/>
                        
                                
                                    <label for="nome"><strong>WhatsApp:</strong></label>
                                    <input style="width: 30%" type="text" id="senha" name="wpp_empresa" class="form-control formInicial" value="<?php echo $exibir->CH_WppEmpresa?>"/>
             
                                </div>

                                <div class="col-12" style="border-radius: 5px; padding: 10px;">            

                                    <div class="row">
   
                                       <div class="row">
   
                                           <div class="col-12">
   
                                               <div class="form-check col-3">
   
                                                   <input class="form-check-input" name="vf_convenio" type="checkbox" value="on" id="flexCheckDefault">
                                                   <label class="form-check-label" for="flexCheckDefault">
                                                       Possui convênio
                                                   </label>&nbsp
                                                   <i class="fas fa-upload"></i>
                                                           
                                               </div>
   
                                               <div class="form-group row col-10 mt-2">
                                                   <label for="example-datetime-local-input" class="col-3 col-form-label">Data de expiração</label>
                                                   <div class="col-4">
                                                       <input class="form-control" name = "dt_convenio" type="datetime-local" value="<?php echo $exibir->DT_ExpiracaoConvenio.'T23:59:59'?>" id="example-datetime-local-input">
                                                   </div>
                                               </div>
           
                                           </div>
   
                                               
                                       </div>
   
                                   </div>                               
   
                               </div>                                
                               
                               <div class="col-10 offset-sm-1" style=" margin-top: 80px; border: 1px solid black; height: 16vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                    
                                    <h5 style="margin-top: -40px;">Dados do responsável</h5>
                    
                                        <div class="row">
                    
                                            <div class="col-10 offset-sm-1 mt-2">
                    
                                               <div class="col-10 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">
                
                                                    <label for="nome"><strong>Nome:&nbsp</strong></label>
                                                    <input type="text" id="nome" name="nome_responsavel" placeholder="Nome" class="form-control formInicial" value="<?php echo $nome[0]?>" required/>
                                        
                                                
                                                    <label for="nome"><strong>&nbsp&nbsp&nbspSobrenome&nbsp&nbsp</strong></label>
                                                    <input type="text" id="nome" name="sbnome_responsavel" placeholder="Sobrenome" class="form-control formInicial" value="<?php echo $nome[1]?>" required/>
                                
                                                </div>
                
                                                <div class="col-10 form-group mt-4" style="display: flex; align-items: center;"">
                
                                                    <label for="nome"><strong>Cargo:&nbsp</strong></label>
                                                    <input type="text" id="nome" name="cargo" placeholder="Digite seu cargo" class="form-control formInicial" value="<?php echo $exibir->CH_CargoDoResponsavel?>" required/>
                                        
                                                
                                                    <label class="col-3" for="nome"><strong>&nbsp&nbsp&nbspTelefone p/ contato:</strong></label>
                                                    <input type="text" id="nome" name="telefone_responsavel" placeholder="(00) 00000-0000" class="form-control formInicial" value="<?php echo $exibir->CH_TelefoneResponsavel?>" required/>
                                                    
                                                </div>
                                                                                  
                                                    
                                            </div>
                    
                                        </div>                   
                    
                                    </div>
                    
                                </div>

                                <div class="col-1 offset-sm-9" style="margin-top:3%;">

                                    <button name="btn_editar" class="btn btn-primary">Editar</button>
                    
                                </div>
                
                                
                            </form>

                                
                        </div>

                    </div>

                </div>

            </div>

            
            <div class="col-2" style="margin-top: 20%;">

                <p>Coordenador Sobrenome</p>

            </div>


       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>