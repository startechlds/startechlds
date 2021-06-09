<?php
    
    session_start();
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassVaga.php');

    $p = new pessoa();

    $return =  $p->RetornaNotasAluno(2);
    print_r($return);

?>