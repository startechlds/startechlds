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
        protected $Media;
        protected $Situacao;

        private $caminhoCurriculo = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Curriculo\\";
        private $caminhoRelatorio = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Relatorio\\";


        public function __construct(){
            
        }
    
        public function getId(){
            return $this->CD_Pessoa;
        }

        public function setMedia($Media)
        {
                $this->Media = $Media;
        }

        public function getMedia()
        {
            return $this->Media;
        }

        public function setSituacap($Situacao)
        {
                $this->Situacao = $Situacao;
        }

        public function getSituacao()
        {
            return $this->Situacao;
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
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function RetornaUltimo(){
            $select = "SELECT * FROM pessoa ORDER BY CD_Pessoa desc";

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
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function VerificaSePessoaExiste($id){
            $select = "SELECT * FROM pessoa WHERE CD_Pessoa = :id";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return true;
                }
                else{
                    echo false;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT VerificaSeAlunoExiste". $e->getMessage()."<br/>";
            }
        }

        public function RetornaTabelaPessoaInArray($tipo){
            if($tipo == 'A')
                $select = "SELECT * FROM pessoa WHERE VF_TIPO = 'A' ORDER BY CH_Nome asc";
            if($tipo == 'P')
                $select = "SELECT * FROM pessoa WHERE VF_TIPO = 'P' ORDER BY CH_Nome asc";
            if($tipo == 'C')
                $select = "SELECT * FROM pessoa WHERE VF_TIPO = 'C' ORDER BY CH_Nome asc";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
              //  $result->bindParam(':tipo', $tipo = 'A', PDO::PARAM_STR);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    
                    if($retorno > 0){
                        while($pessoa = $result->fetch(PDO::FETCH_OBJ)){
                            $array[] = $pessoa;
                        }
                        
                        return $array;
                    }
                }
                else{
                    echo"TABELA VAZIA";
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function EditarPessoa($id, $nome, $cpf, $usuario, $tipo){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $update = "UPDATE pessoa SET CH_Nome = :nome, CH_CPF = :cpf, CH_Usuario = :usuario, VF_Tipo = :tipo 
            WHERE CD_Pessoa = :idpessoa";

            try{
                $result = $conect->prepare($update);
                $result->bindParam(':idpessoa', $id, PDO::PARAM_INT);
                $result->bindParam(':nome', $nome, PDO::PARAM_STR);
                $result->bindParam(':cpf', $cpf, PDO::PARAM_STR);
                $result->bindParam(':usuario', $usuario, PDO::PARAM_STR);
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
                echo "ERRO DE PDO UPDATE PROFESSOR  ". $e->getMessage();
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
                echo "Formato inválido";
            }

        }

        public function CalculoMediaAluno($n1, $n2, $n3, $nf){            
            if($n1 == null && $n2 == null && $n3 == null){
                //$array = array("Media" => 0.0, "Situacao" => "Cursando");
                $this->Media = 0.0;
                $this->Situacao = "Cursando";
            }
            else{
                if($n1 != null && $n2 == null && $n3 == null){
                    $media =  0.0;
                    $situacao = "Cursando";
                }
                else if($n1 != null && $n2 != null && $n3 == null){
                    $media = number_format(($n1 + $n2) / 3, 1);
                    $situacao = "Cursando";
                }
                else{ 
                    $media = ($n1 + $n2 + $n3) / 3;
                    //$this->Media = number_format($media, 1);
                    //echo "$n1 $n2 $n3";

                    if($media >= 7)
                        //$array = array("Media" =>  number_format($media, 2), "Situacao" => "Aprovado", , "naf" => false);
                        $situacao = "Aprovado";
                    else if($media < 4)
                        //$array = array("Media" =>  number_format($media, 2), "Situacao" => "Reprovado", , "naf" => false);
                        $situacao = "Reprovado";
                    else{
                        if($nf == null)
                            $situacao = "Avaliação Final";
                        else{
                            $media += $nf;
                            $media = $media/2;

                            if($media >= 5){
                                $situacao = "Aprovado";
                            }
                            else{
                                $situacao = "Reprovado";
                            }
                        }
                    }
                }

            }

            return $array = array("media" => round($media,1), "situacao" => $situacao);
        }

        public function VerificaTabelaDeNotas($idAluno){
            $select = "SELECT * FROM notas_aluno WHERE CD_Aluno = :idAluno";
            
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
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
                echo "ERRO DE PDO VerificaTabelaDeNota ". $e->getMessage();
            }

        }

        public function AtualizaNotas($idAluno, $n1, $n2, $n3, $nf, $relatorio, $media, $situacao){
            $update = "UPDATE notas_aluno SET N1=:n1, N2=:n2, N3=:n3, NF=:nf, MEDIA=:media, CH_SitucaoAluno=:situacaoAluno, 
                CH_SituacaoRelatorio=:relatorio WHERE CD_Aluno = :cdAluno";
                try{
                    $conn = new ConexaoBD();
                    $conect = $conn->ConDB();

                    $result = $conect->prepare($update);
                    $result->bindParam(':n1', $n1, PDO::PARAM_STR);
                    $result->bindParam(':n2', $n2, PDO::PARAM_STR);
                    $result->bindParam(':n3', $n3, PDO::PARAM_STR);
                    $result->bindParam(':nf', $nf, PDO::PARAM_STR);
                    $result->bindParam(':media', $media, PDO::PARAM_STR);
                    $result->bindParam(':situacaoAluno', $situacao, PDO::PARAM_STR);
                    $result->bindParam(':relatorio', $relatorio, PDO::PARAM_STR);
                    $result->bindParam(':cdAluno', $idAluno, PDO::PARAM_INT);
                    
                    $result->execute();

                   

                    $result = $result->rowCount();
                    
                    
                    if($result > 0){
                        return true;
                    }
                    else{
                     //   echo"não retornou linha nenhuma";
                        return false;
                    }
                }
                catch(PDOException $e){
                    echo "erro de PDO AtualizaNotas ".$e->getMessage();
                }

        }

        public function InsereNota($idAluno, $n1, $n2, $n3, $nf, $relatorio, $media, $situacao){
            $insert = "INSERT INTO notas_aluno(CD_Aluno, N1, N2, N3, NF, MEDIA, CH_SitucaoAluno, CH_SituacaoRelatorio) 
                           VALUES (:cdAluno, :n1, :n2, :n3, :nf,:media,:situacaoAluno,:relatorio)";

            try{
                $conn = new ConexaoBD();
                $conect = $conn->ConDB();

                $result = $conect->prepare($insert);
                $result->bindParam(':cdAluno', $idAluno, PDO::PARAM_INT);
                $result->bindParam(':n1', $n1, PDO::PARAM_STR);
                $result->bindParam(':n2', $n2, PDO::PARAM_STR);
                $result->bindParam(':n3', $n3, PDO::PARAM_STR);
                $result->bindParam(':nf', $nf, PDO::PARAM_STR);
                $result->bindParam(':media', $media, PDO::PARAM_STR);
                $result->bindParam(':situacaoAluno', $situacao, PDO::PARAM_STR);
                $result->bindParam(':relatorio', $relatorio, PDO::PARAM_STR);
                
                $result->execute();

            

                $result = $result->rowCount();
                
                
                if($result > 0){
                    return true;
                }
                else{
                //   echo"não retornou linha nenhuma";
                    return false;
                }
            }
            catch(PDOException $e){
                echo "erro de PDO <strong> InsereNota </strong> ".$e->getMessage();
            }

        }

        public function AtualizaNotaAlunos($idAluno, $n1, $n2, $n3, $nf, $relatorio){

            $notas = $this->CalculoMediaAluno($n1, $n2, $n3, $nf);
            /* == null ? -1 : $n1;
            $n2 == null ? -1 : $n2;
            $n3 == null ? -1 : $n3;*/

            try{
                if($this->VerificaTabelaDeNotas($idAluno)){
                    $result = $this->AtualizaNotas($idAluno, $n1, $n2, $n3, $nf, $relatorio, $notas['media'], $notas['situacao']);

                    return $result;
                }
                else{
                    $result = $this->InsereNota($idAluno, $n1, $n2, $n3, $nf, $relatorio, $notas['media'], $notas['situacao']);

                    return $result;
                }
            }
            catch(PDOException $e){
                echo "erro de PDO AtualizaNotaAlunos ".$e->getMessage();
            }



        }

        public function RetornaNotasAluno($idAluno){
            $select = "SELECT * FROM notas_aluno WHERE CD_Aluno = :cd_aluno";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':cd_aluno', $idAluno, PDO::PARAM_INT);
                $result->execute();

                $verificarRetorno = $result->rowCount();

                if($verificarRetorno > 0){
                    return $result->fetch(PDO::FETCH_OBJ);
                }
                else
                {
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO RetornaNotasAluno ". $e->getMessage();
            }
        }
        

        
    }
?>