<?php
    include('../BD/conexao.php');
    class Pessoa 
    {
        protected $CD_Pessoa;
        protected $CH_Nome;
        protected $CH_CPF;
        protected $CH_Usuario;
        protected $CH_Senha;
        protected $VF_Tipo;
        protected $DOC_Curriculo;
        protected $DOC_Relatorio;


        public function __construct(){
            
        }
    
        
    
        public function preencherPessoa($CD_Pessoa, $CH_Nome, $CH_CPF, $CH_Usuario, $CH_Senha, $VF_Tipo, $DOC_Curriculo, $DOC_Relatorio)
        {
            $this->CD_Pessoa  = $CD_Pessoa;
            $this->CH_Nome    = $CH_Nome;
            $this->CH_CPF     = $CH_CPF;
            $this->CH_Usuario = $CH_Usuario;
            $this->CH_Senha   = $CH_Senha;
            $this->VF_Tipo    = $VF_Tipo;
            $this->DOC_Curriculo = $DOC_Curriculo;
            $this->DOC_Relatorio = $DOC_Relatorio;
        }
        
        public function InserirNovoAluno($nome, $cpf, $usuario, $senha, $tipo){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "INSERT INTO pessoa (CH_Nome, CH_CPF, CH_Usuario, CH_Senha, VF_Tipo) 
            VALUES (:nomeSobrenome,:cpf,:usuario,:senha,:tipo)";

            try{
                $result = $conect->prepare($insert);
                $result->bindParam(':nomeSobrenome', $nome, PDO::PARAM_STR);
                $result->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $result->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $result->execute();

                $verificarRetorno = $result->rowCount();

                if($verificarRetorno > 0){
                    return true;
                }
                else
                {
                    return false;
                }

            
            }
            catch(PDOException $e){
                echo "<strong> ERRO DE PDO = <strong>".$e->getMessage();
            }
            
        }
        public function Imprimir($nome, $cpf, $usuario, $senha, $tipo){
            echo($nome." ");
            echo($cpf." ");
            echo($usuario." ");
            echo($senha);
        }
        
    }
?>