<?php
   session_start();
   $id_usu =(int) $_SESSION['id_usuario'] ;

   include_once('../BD/conexao.php');
   include('../Classes/ClassVaga.php');
  // $retorno = Vaga::verificar_clicado($_POST['vaga'], 1);

   if(isset($_POST['vaga'])){
        if(!Vaga::verificar_clicado($_POST['vaga'], $id_usu)){
            if(Vaga::Adicionar_Curtida($_POST['vaga'], $id_usu))
                echo "sucesso";
            else{
                var_dump(Vaga::Adicionar_Curtida($_POST['vaga'], $id_usu));
            }
        }
        else{
            if(Vaga::RemoverCurtida($_POST['vaga'], $id_usu))
                echo "removida";
            else{
                var_dump(Vaga::Adicionar_Curtida($_POST['vaga'], $id_usu));
            }
        }
   }
   else{
       print($_POST['vaga']);
       echo "erro";
   }
?>