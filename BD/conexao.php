<?php
class ConexaoBD{
 
    public function ConDB(){

        try{
          //  DEFINE('HOST','localhost');
            //DEFINE('BD','gerenciamento_estagio');
           // DEFINE('USER','root');
            //DEFINE('SENHA','');
            
           // $conect = new PDO('mysql:host='.HOST.';dbname='.BD,USER,SENHA);
            $conect = new PDO("mysql:host=localhost;dbname=gerenciamento_estagio",'root','');
            $conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          //  echo("CONECTADO COM SUCESSO");
            
            return $conect;
        }
        catch(PDOException $e){
            echo("ERRO<br>");
            echo($e->getMessage());
        }
    } 
}
?>