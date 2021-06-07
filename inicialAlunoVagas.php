<html lang="PT-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/InicialAlunoVagas/style.css">
    <link rel="stylesheet" href="node_modules/@fortawesome/fontawesome-free/css/all.min.css" >
    <title>Inicial Aluno - Vagas</title>
</head>

 

<body>

    
   <div class="container">
           
            <div class="row" style="height: 12vh; border-radius: 5px; border: 1px solid black; margin-top: 10px; box-shadow: 0px 4px 32px 22px rgba(197, 193, 193, 0.4)
            ">

                <div class="col-8 col-md-9 h-auto d-inline-block" style="display: flex; align-items: center; justify-content: center;">

                    <div class="row">

                        <div class="col-12 col-sm-12 col-md-12 mx-auto" style="padding-left: 150px; height: 12vh; width: 20vw; display: flex; align-items: flex-end; justify-content: space-around;">

                            <a href=""><button style="margin-bottom: 8px; width: 8vw" class="btn btn-primary" disabled>Vagas</button></a>

                            <a href="inicialAlunoDisciplina.php"><button style="margin-bottom: 8px; width: 8vw; margin-left: 40px;" class="btn btn-primary">Disciplina</button></a>

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
                
                <?php
                    include_once('Classes/ClassVaga.php');

                    $vaga = new Vaga();
                    $exibir = $vaga->RetornaTabelaDadosVagasAtivas();
                    $pos = 0;
                    $v = 1;
                   // $control = 0;

                    //print_r($exibir);

                    for($i = 0; $i < count($exibir); $i++){
                        if($i % 2 == 0){
                            echo "<div class='row mt-4'> ";
                          //  echo ($i % 2)."<br>";
                        }
                            echo "<div class='col-6 offset-sm-2 mt-4' style='background-color: #9FA5A4; padding-left: 40px; border: 1px solid rgb(235, 217, 217); height: 130px; width: 20vw; border-radius: 20px; box-shadow: 1px 1px 5px 5px #525050;'>";
                                echo"<div class='row mt-4'>";
                                    echo"<div class='d-flex col-10' style='display: flex; align-items: center; justify-content: space-between'>";
                                        echo"<strong>Vaga&nbsp".$v.":&nbsp".$exibir[$i]->CH_Cargo."</strong> <br >";
                                        echo"<a href='' style='color: black;'><i class='far fa-heart' style='font-size: 25px; fill: red;'></i> </a>";
                                    echo"</div>";
                                    echo"<div class='d-flex col-9' style='height: 23px'>";
                                        echo"<p>".$exibir[$i]->Empresa."</p>";
                                    echo"</div>";
                                    echo"<div class='d-flex col-10'>";
                                        echo"<p>Carga horária: ". $exibir[$i]->CD_Horas_Semanais." horas semanais</p>";
                                    echo"</div>";
                                echo"</div>";
                            echo"</div>";
                            $v++;
                           // $control++;
                       if($i== 1){
                            echo "</div> ";
                            $control = 0;
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