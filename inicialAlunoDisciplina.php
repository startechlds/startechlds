<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/InicialAlunoVagas/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Inicial Aluno - Disciplina</title>
</head>

 

<body>

    
    <div class="container">
           
            <div class="row" style="height: 12vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-9" style="display: flex; align-items: center; justify-content: center;">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12 mx-auto" style="padding-left: 150px; height: 12vh; width: 20vw; display: flex; align-items: flex-end; justify-content: space-around;">

                            <a href="inicialAlunoVagas.html"><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary">Vagas</button></a>

                            <a href="inicialAlunoDisciplina.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary" disabled>Disciplina</button></a>

                        </div>

                    </div>                    
    
                </div>

                <div class="col-4 col-md-3"> 

                    <div class="row">

                        <div class="col-12" style="display: flex; align-items: flex-end; justify-content: flex-end; height: 12vh;">

                            <p style="margin-right: 30px;"><strong>Nome Sobrenome</strong></p>

                            <button class="btn btn-outline-dark" style="margin-right: 10px; margin-bottom: 8px;"><a href="inicialAlunoVagas.html"><i class="fas fa-home"></i></a></button>
                    
                            <button class="btn btn-outline-dark" style="margin-bottom: 8px;"><a href="index.php"><i class="fas fa-power-off"></i></a></button>

                        </div>

                    </div>
                    
                </div>                   

            </div>

            <div class="row">

                
                <div class="col-10 offset-sm-1" style=" margin-top: 80px; border: 1px solid black; height: 20vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                    <h5 style="margin-top: -40px;">Relatório de estágio</h5>

                    <form id = "form1" method="POST" action="" enctype="multipart/form-data"  runat="server">
                        <div class="row">

                            <div class="col-4 offset-sm-8">
                                    
                                <div class="form-group">
                                    <input style="margin-top: 20px" type="file" id="fileR" name="relatorio" class="form-group-file">
                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-4 offset-sm-3" style="margin-top: 30px;">
                                    
                                    <div class="alert alert-danger">
                                        <strong style="color: rgb(112, 99, 99)">Situação: &nbsp</strong>
                                    </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-4 offset-sm-10" style="margin-top: -50px;">
                                    
                                <button class="btn btn-outline-secondary" type="submit" name="btn_enviarRelatorio"><strong style="color: rgb(24, 23, 23)">Enviar</strong></button>

                            </div>

                        </div> 
                    </form>

                </div>

            </div>

            <br />

            <div class="row">

                
                <div class="col-10 offset-sm-1" style=" margin-top: 80px; border: 1px solid black; height: 20vh; border: 1px solid rgb(235, 217, 217); box-shadow: 1px 1px 15px 5px #968c8c;">
                    <h5 style="margin-top: -40px;">Currículo</h5>

                    <form id="form2" method="POST" action="" enctype="multipart/form-data"  runat="server" visible="false">

                        <div class="row">

                            <div class="col-4 offset-sm-4" style="margin-top: 60px;">
                                    
                                <div class="form-group">
                                    <input style="margin-top: 20px" type="file" id="fileC" name="curriculo" class="form-group-file" value="adicionar">
                                </div>

                            </div>

                        </div>
                        
                        <div class="row">

                            <div class="col-4 offset-sm-10" style="margin-top: -50px;">
                                    
                                <button class="btn btn-outline-secondary" type="submit" name="btn_EnviarCurriculo"><strong style="color: rgb(24, 23, 23)">Enviar</strong></button>

                            </div>

                        </div> 
                    </form>

                    <?php

                        //enviar relatorio
                        if(isset($_POST['btn_enviarRelatorio'])){
                                                    
                            if(isset($_FILES['relatorio'])){
                                include_once('Classes/ClassPessoa.php');
                                

                                // var_dump($_FILES['curriculo']);
                                // echo"<br/><br/>";

                                $p = new Pessoa();

                                //   $p->AdicionarDOC($_FILES['curriculo'], 1, "talithaSouza", "curriculo");


                                $resultado = $p->AdicionarDOC($_FILES['relatorio'], 1, "talithaSouza", "relatorio");

                                if($resultado){
                                    echo"<div class='container'>
                                            <div class='alert alert-success alert-dismissible'> 
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                <h5><i class='icon fas fa-check'></i> OK!</h5> 
                                                Relatorio Adicionado com sucesso. 
                                            </div>
                                        </div>";
                                    //  header("Refresh: 3, http://localhost/projeto_final/startechlds/inicialAlunoDisciplina.php");
                                }
                                else{
                                    echo"<div class='container'>
                                            <div class='alert alert-danger alert-dismissible'> 
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                <h5><i class='icon fas fa-check'></i> ERRO!</h5> 
                                                Falha ao adicionar Relatorio. 
                                            </div>
                                        </div>";
                                }
                            }
                        }
                     
                        //ADICIONAR CURRICULO
                        if(isset($_POST['btn_EnviarCurriculo'])){
                            
                            if(isset($_FILES['curriculo'])){
                                include_once('Classes/ClassPessoa.php');
                                
                        
                                // var_dump($_FILES['curriculo']);
                                // echo"<br/><br/>";
                        
                                $p = new Pessoa();
                        
                                 //   $p->AdicionarDOC($_FILES['curriculo'], 1, "talithaSouza", "curriculo");
                        

                                $resultado = $p->AdicionarDOC($_FILES['curriculo'], 1, "talithaSouza", "curriculo");

                                if($resultado){
                                    echo"<div class='container'>
                                            <div class='alert alert-success alert-dismissible'> 
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                <h5><i class='icon fas fa-check'></i> OK!</h5> 
                                                Curriculo Adicionado com sucesso. 
                                            </div>
                                        </div>";
                                    //  header("Refresh: 3, http://localhost/projeto_final/startechlds/inicialAlunoDisciplina.php");
                                }
                                else{
                                    echo"<div class='container'>
                                            <div class='alert alert-danger alert-dismissible'> 
                                                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                                <h5><i class='icon fas fa-check'></i> ERRO!</h5> 
                                                Falha ao adicionar curriculo. 
                                            </div>
                                         </div>";
                                }
                            }
                        }
                    ?>

                </div>

            </div>

            
       
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
</body>
</html>