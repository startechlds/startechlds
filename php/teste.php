<?php
    
    session_start();
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassEstagio.php');

    $es = new Estagio();

    $res = $es->RetornaDadosEstagio(3, 6);
    $data =  date_create_from_format("Y-m-d", $res->DT_Inicio)->format("d/m/Y");
    //$d2 = (string) new DateTime();

    var_dump($data);

?>