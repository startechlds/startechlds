<?php
    
    session_start();
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassEstagio.php');

    $p = new Pessoa();
    $cal = $p->CalculoMediaAluno(10,10,8,null);

    var_dump($cal);

?>