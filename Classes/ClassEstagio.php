<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassTurma.php');

    class Estagio
    {


        public function AtualizaDadosEstagio($idTurma, $CD_Aluno, $CD_Empresa, $DT_Inicio, $DT_Final, $VF_JaEstagiou, $VF_Ativo){

            $retorno = $this->RetornaDadosEstagio($idTurma, $CD_Aluno);
            if($retorno == null){
                $result = $this->InserirEstagio($CD_Aluno, $CD_Empresa, $DT_Inicio, $DT_Final, $VF_JaEstagiou);

               if($result){
                   $cod_Estagio = $this->RetornaUltimaLinha();
                   if(Turma::UpdateEstagio($idTurma, $CD_Aluno, $cod_Estagio)){
                       return true;
                   }
                   else{
                       return false;
                   }
               }
            }
            else{
                $CD_Estagio = $retorno->CD_Estagio;
                $result = $this->AtualizaEstagio($CD_Estagio, $CD_Aluno, $CD_Empresa, $DT_Inicio, $DT_Final, $VF_JaEstagiou, $VF_Ativo);

                return $result;
            }

        }

        public function VerificaEstagioExistente($idAluno, $idEmpresa){
            //verifica se existe e se a data final é maior que a data atual
            $select = "SELECT * FROM estagio WHERE CD_Aluno = idAluno AND CD_Empresa = :idEmpresa AND DT_Final <= :dt_final";

            
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $temp = (array) new DateTime();
                $dataFinal = $temp['date'];

                $result = $conect->prepare($select);
                $result->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                $result->bindParam(':idEmpresa', $idEmpresa, PDO::PARAM_INT);
                $result->bindParam(':dt_final', $dataFinal, PDO::PARAM_STR);
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
                echo "<strong> ERRO DE PDO Função VerificaEstagioExistente <strong>".$e->getMessage();
            }
        }

        public function InserirEstagio($CD_Aluno, $CD_Empresa, $DT_Inicio, $DT_Final, $VF_JaEstagiou){
            $insert = "INSERT INTO estagio (CD_Aluno, CD_Empresa, DT_Inicio, DT_Final, VF_JaEstagiou, VF_Ativo) 
                        VALUES (:cd_aluno, :cd_empresa,:dt_inicio, :dt_final,:vf_estagiou, :vf_ativo)";

            
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $vf_ativo = 1;

                $result = $conect->prepare($insert);
                $result->bindParam(':cd_aluno', $CD_Aluno, PDO::PARAM_INT);
                $result->bindParam(':cd_empresa', $CD_Empresa, PDO::PARAM_INT);
                $result->bindParam(':dt_inicio', $DT_Inicio, PDO::PARAM_STR);
                $result->bindParam(':dt_final', $DT_Final, PDO::PARAM_STR);
                $result->bindParam(':vf_estagiou', $VF_JaEstagiou, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            catch(PDOException $e){
                echo "<strong> ERRO DE PDO Função InserirEstagio <strong> ".$e->getMessage();
            }
        }

        public function AtualizaEstagio($CD_Estagio,$CD_Aluno, $CD_Empresa, $DT_Inicio, $DT_Final, $VF_JaEstagiou, $VF_Ativo){
            $update = "UPDATE estagio SET CD_Aluno = :idAluno, CD_Empresa = :cd_empresa,
             DT_Inicio = :dt_inicio , DT_Final = :dt_final, VF_JaEstagiou = :vf_estagiou, VF_Ativo = :vf_ativo WHERE CD_Estagio = :cod_estagio ";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{

                $result = $conect->prepare($update);
                $result->bindParam(':idAluno', $CD_Aluno, PDO::PARAM_INT);
                $result->bindParam(':cd_empresa', $CD_Empresa, PDO::PARAM_INT);
                $result->bindParam(':dt_inicio', $DT_Inicio, PDO::PARAM_STR);
                $result->bindParam(':dt_final', $DT_Final, PDO::PARAM_STR);
                $result->bindParam(':vf_estagiou', $VF_JaEstagiou, PDO::PARAM_STR);
                $result->bindParam(':cod_estagio', $CD_Estagio, PDO::PARAM_INT);
                $result->bindParam(':vf_ativo', $VF_Ativo, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return true;
                }
                else{
                    return false;
                }
            }
            catch(PDOException $e){
                echo "<strong> ERRO DE PDO Função AtualizaEstagio <strong> ".$e->getMessage();
            }
        }

        public static function RetornaUltimaLinha(){
            $select = "SELECT * FROM estagio ORDER BY CD_Estagio desc";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    $arr = $result->fetch(PDO::FETCH_OBJ);
                   return $arr->CD_Estagio;
                }
                else{
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function RetornaDadosEstagio($cdTurma, $cdAluno){
        
            $select = "SELECT ES.*,  T.CD_Turma, T.CD_Semestre
            FROM turma_aluno_estagio TAE
            Join turma T on T.CD_Turma = TAE.CD_Turma
            Join estagio ES on ES.CD_Estagio = TAE.COD_Estagio
            Where T.CD_Turma = :cd_turma and TAE.CD_Aluno = :id_aluno";
    
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();
    
            try{
                $result = $conect->prepare($select);
                $result->bindParam(':cd_turma', $cdTurma, PDO::PARAM_INT);
                $result->bindParam(':id_aluno', $cdAluno, PDO::PARAM_INT);

                $result->execute();
    
                $retorno = $result->rowCount();
                if($retorno > 0)
                    return $result->fetch(PDO::FETCH_OBJ);
                else{
                    return null;
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
            
        }
    }
    
?>