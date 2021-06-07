<?php
    
    session_start();
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassVaga.php');

    $nome = str_replace(' ', '_', $_SESSION['Nome']);
    echo$nome;

?>