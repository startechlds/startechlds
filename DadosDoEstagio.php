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

                     <div class="row mt-4">
                         
                        <div class="col-2 mt-4 offset-sm-2">
                                    
                            <i class="fas fa-user" style="font-size: 50px;"></i>&nbsp&nbsp&nbspAluno Fulano
                                           
                        </div>

                        <div class="col-2 offset-sm-1">

                            <div class="col-12 form-group mt-4" >

                                <p style="border: 1px solid rgb(28,28,28); height: 4vh; padding: 5px; display: flex; align-items: center; justify-content: center; color: grey11"><strong>Semestre 2021.1</strong></p>   

                            </div>

                        </div>

                        <div class="col-2 offset-sm-1">
                                    
                            <select class="form-select btn btn-secondary mt-4" id="validationDefault04" name="cbx_situacao">
                                <option selected disabled value="">Situação&nbsp</option>
                                <option value="0">Fechado</option>
                                <option value="1">Aberto</option>
                            </select>
                                   
                        </div>

                    </div>

                    <div>

                        <p style="border: 1px dashed black; width: 100%;" class="mt-4"></p>

                    </div>

                    <div class="row mt-4"> 

                        <div class="col-2 offset-sm-1">
                                    
                            <select class="form-select btn btn-secondary mt-4" id="validationDefault04" name="cbx_situacao">
                                <option selected disabled value="">Estágio?</option>
                                <option value="0">Sim</option>
                                <option value="1">Não</option>
                            </select>
                                           
                        </div>

                        <div class="col-1 mt-4">
                                    
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   <strong> Concluído </strong>
                                </label>
                            </div>
                                   
                        </div>     
                            
                        <div class="form-group row col-3 mt-3 offset-sm-1">
                            <label for="example-datetime-local-input" class="col-2 col-form-label"><strong>Data Inicial:</strong>&nbsp&nbsp</label>
                                <div class="col-8 mt-2">
                                    <input style="margin-left: 8px" class="form-control" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                        </div>

                        <div class="form-group row col-3 mt-3">
                            <label for="example-datetime-local-input" class="col-2 col-form-label"><strong>Data Final:</strong></label>
                                <div class="col-8 mt-2">
                                    <input class="form-control" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                        </div>                      

                    </div>

                    <div class="row mt-4"> 

                        <div class="col-3 offset-sm-2 form-group mt-4" style="display: flex; align-items: center; justify-content: space-around;">

                            <label for="nome"><strong>Empresa:&nbsp</strong></label>
                            <input type="text" id="nome" name="nome_fantasia" placeholder="Nome" class="form-control formInicial" required/>

                        </div>

                        <div class="col-1 mt-4">
                                    
                            <div class="form-check mt-2 offset-sm-1">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                   <strong> Convênio </strong>
                                </label>
                            </div>
                                   
                        </div>     

                        <div class="form-group row col-4 mt-3 offset-sm-1">
                            <label for="example-datetime-local-input" class="col-3 col-form-label mt-1"><strong>Expira em:</strong></label>
                                <div class="col-5 mt-2">
                                    <input class="form-control col-6" type="date" value="2011-08-19T13:45:00" id="example-datetime-local-input">
                                </div>
                        </div>                      

                    </div>

                    <div class="row mt-4"> 

                        <div class="form-check mt-2 offset-sm-1 mt-4">
                            <input class="form-check-input mt-4" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label mt-4" for="flexCheckDefault">
                                <strong> Aluno(a) já estagiou nessa empresa</strong>
                            </label>
                        </div>                    

                    </div>
                    
                    <div class="col-2 offset-sm-6" style="margin-top: 10%">

                        <button 
                            class="btn btn-primary" 
                            style="margin-bottom: 8px;"
                            name="btn_editar">
                            <a style="text-decoration: none;">Salvar</a>
                        </button>                           

                    </div>

                    <div class="col-3 offset-sm-10">

                        <button 
                            class="btn btn-primary" 
                            style="margin-bottom: 8px;"
                            name="btn_editar">
                            <a href="DadosDoEstagioParte02.php" style="text-decoration: none;">Próximo</a>
                        </button>                           

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