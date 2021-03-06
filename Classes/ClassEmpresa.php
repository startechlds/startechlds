<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Empresa{
        protected $CD_Empresa;
        protected $CH_Fantasia;
        protected $CH_CNPJ;
        protected $RuaEmpresa;
        protected $CH_BairroEmpresa;
        protected $CH_NumeroEmpresa;
        protected $CH_TelefoneEmpresa;
        protected $CH_WppEmpresa;
        protected $CH_NomeResponsavel;
        protected $CH_CargoDoResponsavel;
        protected $CH_TelefoneResponsavel;
        protected $DOC_Convenio;
        protected $DT_ExpiracaoConvenio;
        protected $VF_Ativo;

        public function __construct(){
        }
        

    //INICIO SETS

        public function setCD_Empresa($CD_Empresa)
        {
            $this->CD_Empresa = $CD_Empresa;

        }

        public function setCH_Fantasia($CH_Fantasia)
        {
            $this->CH_Fantasia = $CH_Fantasia;

        }

        public function setCH_CNPJ($CH_CNPJ)
        {
            $this->CH_CNPJ = $CH_CNPJ;

        }

        public function setRuaEmpresa($RuaEmpresa)
        {
            $this->RuaEmpresa = $RuaEmpresa;
        }

        public function setCH_BairroEmpresa($CH_BairroEmpresa)
        {
            $this->CH_BairroEmpresa = $CH_BairroEmpresa;

        }

        public function setCH_NumeroEmpresa($CH_NumeroEmpresa)
        {
            $this->CH_NumeroEmpresa = $CH_NumeroEmpresa;

        }

        public function setCH_TelefoneEmpresa($CH_TelefoneEmpresa)
        {
            $this->CH_TelefoneEmpresa = $CH_TelefoneEmpresa;

        }

        public function setCH_WppEmpresa($CH_WppEmpresa)
        {
            $this->CH_WppEmpresa = $CH_WppEmpresa;

        }

        public function setCH_NomeResponsavel($CH_NomeResponsavel)
        {
            $this->CH_NomeResponsavel = $CH_NomeResponsavel;

        }


        public function setCH_CargoDoResponsavel($CH_CargoDoResponsavel)
        {
            $this->CH_CargoDoResponsavel = $CH_CargoDoResponsavel;

        }

        public function setCH_TelefoneResponsavel($CH_TelefoneResponsavel)
        {
            $this->CH_TelefoneResponsavel = $CH_TelefoneResponsavel;

        }

        public function setDOC_Convenio($DOC_Convenio)
        {
            $this->DOC_Convenio = $DOC_Convenio;
        }

        public function setDT_ExpiracaoConvenio($DT_ExpiracaoConvenio)
        {
            $this->DT_ExpiracaoConvenio = $DT_ExpiracaoConvenio;

        }

        public function setVF_Ativo($VF_Ativo)
        {
            $this->VF_Ativo = $VF_Ativo;
        }
    //FIM DO SETS

    //INICIO DOS GETS
        public function getCD_Empresa()
        {
            return $this->CD_Empresa;
        }

        public function getCH_Fantasia()
        {
            return $this->CH_Fantasia;
        }

        public function getCH_CNPJ()
        {
            return $this->CH_CNPJ;
        }

        public function getRuaEmpresa()
        {
            return $this->RuaEmpresa;
        }

        public function getCH_BairroEmpresa()
        {
            return $this->CH_BairroEmpresa;
        }
 
        public function getCH_NumeroEmpresa()
        {
            return $this->CH_NumeroEmpresa;
        }

        public function getCH_TelefoneEmpresa()
        {
            return $this->CH_TelefoneEmpresa;
        }

        public function getCH_WppEmpresa()
        {
            return $this->CH_WppEmpresa;
        }
 
        public function getCH_NomeResponsavel()
        {
            return $this->CH_NomeResponsavel;
        }

        public function getCH_CargoDoResponsavel()
        {
            return $this->CH_CargoDoResponsavel;
        }

        public function getCH_TelefoneResponsavel()
        {
            return $this->CH_TelefoneResponsavel;
        }

        public function getDOC_Convenio()
        {
            return $this->DOC_Convenio;
        }

        public function getVF_Ativo()
        {
            return $this->VF_Ativo;
        }

        public function getDT_ExpiracaoConvenio()
        {
            return $this->DT_ExpiracaoConvenio;
        }
    //FIM DOS GETS

        public function CadastrarEmpresa($nome_fantasia, $cnpj, $rua_empresa, $bairro_empresa, $num_empresa, $telefone_empresa, $wpp_empresa, 
            $nome_responsavel, $cargo_responsavel, $telefone_responsavel, $doc_convenio, $dt_expiracao){
            
            $insert = "INSERT INTO empresa(CH_Fantasia , CH_CNPJ , CH_RuaEmpresa, CH_BairroEmpresa, CH_NumeroEmpresa, CH_TelefoneEmpresa, CH_WppEmpresa, CH_NomeResponsavel, CH_CargoDoResponsavel, CH_TelefoneResponsavel, DOC_Convenio, DT_ExpiracaoConvenio, VF_Ativo) 
            VALUES (:nomeFantasia, :cnpj, :ruaEmpresa, :bairroEmpresa,:numeroEmpresa,:telefoneEmpresa, :wppEmpresa,:nomeResposavel, :cargoResposavel, :telefoneResponsavel, :doc_Convenio, :dt_convenio, :vf_ativo)";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $vf_ativo = 1;
                $result = $conect->prepare($insert);
                $result->bindParam(':nomeFantasia', $nome_fantasia, PDO::PARAM_STR);
                $result->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
                $result->bindParam(':ruaEmpresa', $rua_empresa, PDO::PARAM_STR);
                $result->bindParam(':bairroEmpresa', $bairro_empresa, PDO::PARAM_STR);
                $result->bindParam(':numeroEmpresa', $num_empresa, PDO::PARAM_STR);
                $result->bindParam(':telefoneEmpresa', $telefone_empresa, PDO::PARAM_STR);
                $result->bindParam(':wppEmpresa', $wpp_empresa, PDO::PARAM_STR);
                $result->bindParam(':cargoResposavel', $cargo_responsavel, PDO::PARAM_STR);
                $result->bindParam(':nomeResposavel', $nome_responsavel, PDO::PARAM_STR);
                $result->bindParam(':telefoneResponsavel', $telefone_responsavel, PDO::PARAM_STR);
                $result->bindParam(':doc_Convenio', $doc_convenio, PDO::PARAM_STR);
                $result->bindParam(':dt_convenio', $dt_expiracao, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_INT);
                
                $result->execute();
                $verifica = $result->rowCount();
                if($verifica > 0){
                    return true;
                }
                else{
                    return false;
                }

            }
            catch(PDOException $e){
                return "ERRO DE PDO INSERT EMPRESA ". $e->getMessage();
            }

        }

        public function EditarEmpresa($id, $nome_fantasia, $cnpj, $rua_empresa, $bairro_empresa, $num_empresa, $telefone_empresa, $wpp_empresa, 
            $nome_responsavel, $cargo_responsavel, $telefone_responsavel, $doc_convenio, $dt_expiracao){
            
            $update = "UPDATE empresa SET CH_Fantasia = :nomeFantasia , CH_CNPJ = :cnpj, CH_RuaEmpresa = :ruaEmpresa, CH_BairroEmpresa = :bairroEmpresa, 
            CH_NumeroEmpresa = :numeroEmpresa, CH_TelefoneEmpresa = :telefoneEmpresa, CH_WppEmpresa = :wppEmpresa, CH_NomeResponsavel = :nomeResposavel, CH_CargoDoResponsavel = :cargoResposavel,
            CH_TelefoneResponsavel = :telefoneResponsavel, DOC_Convenio = :doc_Convenio, DT_ExpiracaoConvenio = :dt_convenio WHERE CD_Empresa = :id";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $vf_ativo = 1;
                $result = $conect->prepare($update);
                $result->bindParam(':nomeFantasia', $nome_fantasia, PDO::PARAM_STR);
                $result->bindParam(':cnpj', $cnpj, PDO::PARAM_STR);
                $result->bindParam(':ruaEmpresa', $rua_empresa, PDO::PARAM_STR);
                $result->bindParam(':bairroEmpresa', $bairro_empresa, PDO::PARAM_STR);
                $result->bindParam(':numeroEmpresa', $num_empresa, PDO::PARAM_STR);
                $result->bindParam(':telefoneEmpresa', $telefone_empresa, PDO::PARAM_STR);
                $result->bindParam(':wppEmpresa', $wpp_empresa, PDO::PARAM_STR);
                $result->bindParam(':cargoResposavel', $cargo_responsavel, PDO::PARAM_STR);
                $result->bindParam(':nomeResposavel', $nome_responsavel, PDO::PARAM_STR);
                $result->bindParam(':telefoneResponsavel', $telefone_responsavel, PDO::PARAM_STR);
                $result->bindParam(':doc_Convenio', $doc_convenio, PDO::PARAM_STR);
                $result->bindParam(':dt_convenio', $dt_expiracao, PDO::PARAM_STR);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                
                $result->execute();
                $verifica = $result->rowCount();
                if($verifica > 0){
                    return true;
                }
                else{
                    return false;
                }

            }
            catch(PDOException $e){
                return "ERRO DE PDO INSERT EMPRESA ". $e->getMessage();
            }

        }

        public function DeletarEmpresa($idEmpresa){
            $delete = "DELETE FROM empresa WHERE CD_Empresa = :idEmpresa";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($delete);
                $result->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);
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
                echo "ERRO DE PDO DELETE Empresa". $e->getMessage();
            }
        }

        public function RetornaEmpresa($id){
            $select = "SELECT * FROM empresa WHERE CD_Empresa = :id";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();    
                if($retorno > 0){
                    return $result->fetch(PDO::FETCH_OBJ);
                }
                else{
                    return false;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO Retorna Empresa ". $e->getMessage()."<br>";
            }
        }

        public function RetornaUltimaEmpresa(){
            $select = "SELECT * FROM empresa ORDER BY CD_Empresa desc";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->execute();

                $retorno = $result->rowCount();    
                if($retorno > 0){
                    return $result->fetch(PDO::FETCH_OBJ);
                }
                else{
                    return false;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO Retorna Ultima Empresa ". $e->getMessage()."<br>";
            }
        }


        public function RetornaTabelaEmpresaInArray(){
            $select = "SELECT * FROM empresa ORDER BY CH_Fantasia asc";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->execute();

                $retorno = $result->rowCount();    
                if($retorno > 0){
                    while($empresa = $result->fetch(PDO::FETCH_OBJ)){
                        $array[] = $empresa;
                    }
                    
                    return $array;
                }
                else{
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO Retorna Tabela ". $e->getMessage()."<br>";
            }
        }

        public function RetornaTabelaEmpresaAtivasInArray(){
            $select = "SELECT * FROM empresa WHERE VF_Ativo = 1 ORDER BY CH_Fantasia asc";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->execute();

                $retorno = $result->rowCount();    
                if($retorno > 0){
                    while($empresa = $result->fetch(PDO::FETCH_OBJ)){
                        $array[] = $empresa;
                    }
                    
                    return $array;
                }
                else{
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO Retorna Tabela ". $e->getMessage()."<br>";
            }
        }

        public function PrepraDiretorioDoc($id){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $caminho = "C:/xampp/htdocs/projeto_final/startechlds/docs/DOC_Convenio/";

            $updateDOC = "UPDATE empresa SET DOC_Convenio = :nulo WHERE CD_Empresa = :idEmpresa";
            

            $array = $this->RetornaEmpresa($id);
          //  var_dump($array);
            if($array->DOC_Convenio != NULL){
              //  var_dump($array);
                unlink("$caminho".$array->DOC_Convenio);
                $nulo =  NULL;
                
              
                $result = $conect->prepare($updateDOC);
                $result->bindParam(':idEmpresa', $id, PDO::PARAM_INT);
                $result->bindParam(':nulo',$nulo,PDO::PARAM_NULL);
                $result->execute();

                //echo"<br/>limpado e removido<br/>";

                return;
            }


        }


        public function AdicionarConvenio($file, $id, $nomeEmpresa,){
            //tipo = relatorio, curriculo
            $formatP = array("pdf");

           
            $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);

          //  echo "$extensao";

            if(in_array($extensao,$formatP)){
             //   $caminho = "../docs/".$tipo."/";
                $temp = $file['tmp_name'];

                $this->PrepraDiretorioDoc($id);

                $inserirDOC = "UPDATE empresa set DOC_Convenio = :nomeArquivo WHERE CD_Empresa = :idEmpresa";
                $caminho = "C:/xampp/htdocs/projeto_final/startechlds/docs/DOC_Convenio/";
                $doc = "DOC_Curriculo";

                $nomeArquivo = $nomeEmpresa."_Convenio";
                if(move_uploaded_file($temp, $caminho.$nomeArquivo.".pdf")){
                    try{
                        $conn = new ConexaoBD();
                        $conect = $conn->ConDB();

                        $result = $conect->prepare($inserirDOC);
                        $result->bindParam(':nomeArquivo', $nomeArquivo, PDO::PARAM_STR);
                        $result->bindParam(':idEmpresa', $id, PDO::PARAM_INT);
                        $result->execute();

                       

                        $funcionou = $result->rowCount();
                        
                        
                        if($funcionou > 0){
                            return true;
                        }
                        else{
                         //   echo"n??o retornou linha nenhuma";
                            return false;
                        }
                    }
                    catch(PDOException $e){
                        echo "erro de PDO ".$e->getMessage();
                    }

                }
                else{
                    echo"erro ao mover para pasta<br/>";
                   // var_dump(move_uploaded_file($temp, $this->caminhoCurriculo.$nomeAluno.".pdf"));
                }

            }
            else{
                echo "Formato inv??lido";
            }

        }

    }
?>