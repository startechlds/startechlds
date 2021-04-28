<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
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

        private $caminhoCurriculo = "C:/xampp/htdocs/projeto_final/startechlds/docs/DOC_Curriculo/";
        private $caminhoRelatorio = "C:/xampp/htdocs/projeto_final/startechlds/docs/DOC_Relatorio/";


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
        
        public function InserirNovaPessoa($nome, $cpf, $usuario, $senha, $tipo, $situacao){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "INSERT INTO pessoa (CH_Nome, CH_CPF, CH_Usuario, CH_Senha, VF_Tipo, CH_Situacao) 
            VALUES (:nomeSobrenome,:cpf,:usuario,:senha,:tipo, :situacao)";

            try{
                $result = $conect->prepare($insert);
                $result->bindParam(':nomeSobrenome', $nome, PDO::PARAM_STR);
                $result->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
                $result->bindParam(':senha', $senha, PDO::PARAM_STR);
                $result->bindParam(':tipo', $tipo, PDO::PARAM_STR);
                $result->bindParam(':situacao', $situacao, PDO::PARAM_STR);
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

        public function RetornaPessoa($id){
            $select = "SELECT * FROM pessoa WHERE CD_Pessoa = :id";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    
                    $arr = $result->fetch(PDO::FETCH_OBJ);
                    return $arr;
                }
                else{
                    echo"não exixte";
                }
            }
            catch(PDOExpetion $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function EditarPessoa($id, $nome, $cpf, $usuario, $senha, $tipo){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $update = "UPDATE pessoa SET CH_Nome = :nome, CH_CPF = :cpf, CH_Usuario = :usuario, CH_Senha = :senha, VF_Tipo = :tipo 
            WHERE CD_Pessoa = :idpessoa";

            try{
                $result = $conect->prepare($update);
                $result->bindParam(':idpessoa', $id, PDO::PARAM_STR);
                $result->bindParam(':nome', $nome, PDO::PARAM_STR);
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
            catch(PDOExpetion $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function DeletarPessoa($idPessoa){
            $delete = "DELETE FROM pessoa WHERE CD_Pessoa = :idPessoa";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($delete);
                $result->bindParam(':idPessoa', $idPessoa, PDO::PARAM_INT);
                $result->execute();

                
            }
            catch(PDOExpetion $e){
                echo "ERRO DE PDO DELETE ". $e->getMessage();
            }
        }
        public function Imprimir($nome, $cpf, $usuario, $senha, $tipo){
            echo($nome." ");
            echo($cpf." ");
            echo($usuario." ");
            echo($senha);
        } 



        public function PrepraDiretorioDoc($tipo, $id){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            //$caminho = "";

            if($tipo == 'curriculo'){
                $coluna = "DOC_Curriculo";
                $caminho = $this->caminhoCurriculo;
                $updateDOC = "UPDATE pessoa SET DOC_Curriculo = :nulo WHERE CD_Pessoa = :idPessoa";
            }
            else if($tipo == 'relatorio'){
                $coluna = "DOC_Relatorio";
                $caminho = $this->caminhoRelatorio;
                $updateDOC = "UPDATE pessoa SET DOC_Relatorio = :nulo WHERE CD_Pessoa = :idPessoa";
            }
            else{
                echo "$tipo não existe";
                return;
            }

            $array = $this->RetornaPessoa($id);
          //  var_dump($array);
            if($array->$coluna != NULL){
              //  var_dump($array);
                $res = unlink($caminho.$array->$coluna."_$coluna.pdf");
                $nulo =  NULL;
                
              
                $result = $conect->prepare($updateDOC);
                $result->bindParam(':idPessoa', $id, PDO::PARAM_INT);
                $result->bindParam(':nulo',$nulo,PDO::PARAM_NULL);
                $result->execute();

                //echo"<br/>limpado e removido<br/>";

                return;
            }


        }

        public function AdicionarDOC($file, $id, $nomeAluno,$tipo){
            //tipo = relatorio, curriculo
            $formatP = array("pdf");

           
            $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);

          //  echo "$extensao";

            if(in_array($extensao,$formatP)){
             //   $caminho = "../docs/".$tipo."/";
                $temp = $file['tmp_name'];

                $this->PrepraDiretorioDoc($tipo, $id);

                if($tipo == "curriculo"){
                    $inserirDOC = "UPDATE pessoa set DOC_Curriculo = :nomeArquivo WHERE CD_Pessoa = :idAluno";
                    $caminho = $this->caminhoCurriculo;
                    $doc = "DOC_Curriculo";
                }
                if($tipo == "relatorio"){
                    $inserirDOC = "UPDATE pessoa set DOC_Relatorio = :nomeArquivo WHERE CD_Pessoa = :idAluno";
                    $caminho = $this->caminhoRelatorio;
                    $doc = "DOC_Relatorio";
                }

                if(move_uploaded_file($temp, $caminho.$nomeAluno."_$doc.pdf")){
                    

                    try{
                        $conn = new ConexaoBD();
                        $conect = $conn->ConDB();

                        $result = $conect->prepare($inserirDOC);
                        $result->bindParam(':nomeArquivo', $nomeAluno, PDO::PARAM_STR);
                        $result->bindParam(':idAluno', $id, PDO::PARAM_INT);
                        $result->execute();

                       

                        $funcionou = $result->rowCount();
                        
                        
                        if($funcionou > 0){
                            return true;
                        }
                        else{
                         //   echo"não retornou linha nenhuma";
                            return false;
                        }
                    }
                    catch(PDOExpetion $e){
                        echo "erro de PDO ".$e->getMessage();
                    }

                }
                else{
                    echo"erro ao mover para pasta<br/>";
                   // var_dump(move_uploaded_file($temp, $this->caminhoCurriculo.$nomeAluno.".pdf"));
                }

            }
            else{
                echo "Formato inválido";
            }

        }

        public function SituacaoRelatorio(){

        }
        
    }
?>