<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/CoordenadorTurmasSelect/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Editar Vaga</title>
</head>

 

<body>

    <?php
        if(isset($_GET['acao'])){
            if($_GET['acao'] == "editar"){
                setcookie("acaoV", "editar");
                if(empty($_GET['id'])){
                    echo "
                    <script>
                        alert('Selecione uma vaga para poder editá-la');
                        window.location.href = 'CoordenadorVagas.php';
                    </script>";
                }
                else{
                    setcookie("idVaga", $_GET['id']);

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

                   <button title="Voltar tela anterior" class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="CoordenadorVagas.html"><i class="fas fa-times"></i></a></button>
                       
                   <button title="Sair" class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="loginInicial.html"><i class="fas fa-power-off"></i></a></button>

               </div>               

           </div>

           <div clas="row">

               <div class="col-12" style="margin-top: 60px; background-color: rgb(175, 175, 166); height: 70%">

                   <div class="row">

                       <h3 class="offset-sm-5 mt-4">Editar Vaga</h3>

                       <div class="col-6 offset-sm-3" style="margin-top: 50px;">

                           <div class="row">

                               <div class="col-12 mt-2">

                                   <form id="formEditar" class="form-row" method="POST" action="php/crud_vaga.php">

                                       <div class="col-12 form-group" style="display: flex; align-items: center; justify-content: space-around;">
                                            <?php
                                                include_once('Classes/ClassVaga.php');
                                                $v = new Vaga();
                                                $res = $v->RetornaVagaEspecifica($_GET['id']);
                                            ?>

                                           <label for="nome"><strong>Cargo:&nbsp</strong></label>
                                           <input type="text" id="nome" name="cargo" placeholder="Seu cargo" class="form-control formInicial"  value="<?php echo $res->CH_Cargo;?>"/>
                                           
                               
                                           <div class="col-5 offset-sm-1">
                                               <select class='form-select btn btn-secondary' id='validationDefault04' name ='cbx_Empresa' require>
                                                   <?php
                                                       include_once('Classes/ClassEmpresa.php');

                                                       $empresa = new Empresa();
                                                       $cd_e = $empresa->RetornaEmpresa($res->CD_Empresa);

                                                       $exibir = $empresa->RetornaTabelaEmpresaAtivasInArray();
                                                       echo"<option selected value='".$cd_e->CD_Empresa."'>".$cd_e->CH_Fantasia."</option>";
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
                                           <input type="number" id="usuario" name="valor_bolsa" class="form-control formInicial" placeholder="R$" value="<?php echo $res->VR_Valor;?>"/>

                                           </div>
                                           
                                           <div class="col-4 offset-sm-2" style="display: flex; align-items: center; justify-content: space-around">

                                               <label for="example-number-input" class="col-3 col-form-label"><strong>Quantidade:&nbsp&nbsp&nbsp</strong></label>
                                               <div class="col-4">
                                                   <input class="form-control" type="number" value="<?php echo $res->CD_Qtd_Vaga;?>" name ="qtd" id="example-number-input">
                                               </div>

                                           </div>
                                                                                                          
                                       </div>

                                       <div class="col-6 form-group" style="display: flex; align-items: center; justify-content: space-around; margin-top: 40px">

                                           <label for="nome"><strong>Horas Semanais&nbsp</strong></label>
                                           <input type="text" id="usuario" name="HSemanais" placeholder="X horas Semanais" class="form-control formInicial" value="<?php echo $res->CD_Horas_Semanais;?>"/>
                       
                                       </div>                       
                       
                                   

                               </div>

                                       <div class="row">

                                           <div class="col-10">

                                               <div class="form-group mt-4">
                                                   <label for="exampleTextarea" ><strong>Descrição da vaga:</strong></label>
                                                   <textarea style="margin-top: 3%" class="form-control" id="exampleTextarea" name = "descricao" rows="3" ><?php echo $res->CH_Descricao;?></textarea>
                                               </div>

                                           </div>    
                                               

                                           <div class="col-2" style="margin-top: 10%;">

                                               <div class="col-1 offset-sm-11" style="margin-top:3%;">
                   
                                                   <a ><button name="btn_EditarVaga" class="btn btn-primary">Salvar</button></a>
                                       
                                               </div>
               
                                           </div>
                                    </form>

                                    
                                        <div class="col-3 offset-sm-11">
                
                                            <a href="php/crud_vaga.php?acao=desativar&id=<?php if(!empty($_GET['id'])) echo $_GET['id'];?> " onclick="return confirm('deseja desativar essa vaga?')"><button class="btn btn-primary" name="btn_desativaVaga">Desativar vaga</button></a>
                                    
                                        </div>
                                
        
                                </div> 
                                
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