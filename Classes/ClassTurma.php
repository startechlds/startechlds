<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
    class Turma{

        protected $CD_Turma;
        protected $Horario; //Formato 2AD(dia,inicio, fim);
        protected $DT_Inicio;
        protected $DT_FIM;
        protected $FK_CD_Professor;


        public function InserirNovaTurma($cdsemestre, $dia, $Horario, $FK_CD_Professor){

            if(semestre::ValidaSemestre($cdsemestre) == "invalido")
                return "invalido";
            if(semestre::AbrirSemestre($cdsemestre) == "falha na inserção")
                return "false";

            $insert = "INSERT INTO turma (CH_Disciplina, CD_Professor, CD_Semestre, VF_Ativo, CH_Horario) 
                        VALUES (:disciplina,:cd_professor,:cdsemestre, :vf_ativo,:ch_horario)";

            $horario = $this->ConverteHorario($dia,$Horario);

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $ch_disciplina = "Gerenciamento de Estagio";
                $vf_ativo = 1;

                $result = $conect->prepare($insert);
                $result->bindParam(':disciplina', $ch_disciplina, PDO::PARAM_STR);
                $result->bindParam(':cd_professor', $FK_CD_Professor, PDO::PARAM_INT);
                $result->bindParam(':cdsemestre', $cdsemestre, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_INT);
                $result->bindParam(':ch_horario', $horario, PDO::PARAM_STR);
                $result->execute();

                $verificarRetorno = $result->rowCount();

                if($verificarRetorno > 0){
                    return "true";
                }
                else
                {
                    return "false";
                }

            
            }
            catch(PDOException $e){
                echo "<strong> ERRO DE PDO INSERÇÃO DE TURMA <strong>".$e->getMessage();
            }
            
        }

        public function VerificaTurmaJaCriada($num_semestre){
            $select = "SELECT * FROM turma WHERE CD_Turma = :idTurma";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
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
                echo "ERRO ". $e->getMessage();
            }                

        }

        public function ConverteHorario($dia, $hora){
            $VetorLetras = array(8 =>  'A', 'B', 'C','D' ,'E', 'F', 'G', 'H','I', 'J', 'L', 'M', 'N', 'O', 
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Z');

            $H = explode(':', $hora);

            $horaL =  $VetorLetras[$H[0]];
            $horaEmLetra = $dia.$horaL;

            return $horaEmLetra;
        }


        public function DeletarTurma($idTurma){
            $delete = "DELETE FROM turma WHERE CD_Turma = :idTurma";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($delete);
                $result->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return "deletado com sucesso";
                }
                else{
                   return "Erro ao deletar";
                }
                
            }
            catch(PDOException $e){
                echo "ERRO DE DELETE ". $e->getMessage();
                return "Erro ao deletar, há alunos nessa turma";
            }
        }

        public function RetornaDadosTurmaProfessorSituacao($idProfessor){

            if($idProfessor == null){
                $select = "SELECT T.CD_Turma as Id, T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.VF_Ativo as Situacao
                FROM turma AS T, pessoa as P 
                WHERE CH_Disciplina = 'Gerenciamento de estagio' AND T.CD_Professor = P.CD_Pessoa ORDER BY semestre DESC";
            }
            else{
                $select = "SELECT T.CD_Turma as Id, T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.VF_Ativo as Situacao 
                FROM turma AS T, pessoa as P 
                WHERE CH_Disciplina = 'Gerenciamento de estagio' AND P.CD_Pessoa = :idProfessor AND CD_Professor = :idProfessor";
            }

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
    
                $result = $conect->prepare($select);
                if($idProfessor != null){
                    $result->bindParam(':idProfessor', $idProfessor, PDO::PARAM_INT);
                }
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    while($num_semestre = $result->fetch(PDO::FETCH_OBJ)){
                        if($num_semestre->Situacao == 1)
                            $num_semestre->Situacao = 'Em Andamento';
                        else
                            $num_semestre->Situacao = 'Finalizado';
                        $array[] = $num_semestre;
                    }
                    
                    return $array;
                }
                else{
                    echo"não exixte";
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public function RetornaTabelaAlunoEstagioEmpresa($idTurma){
            $select = "SELECT T.CD_Turma AS IDTurma, P.CD_Pessoa as IDAluno, P.CH_Nome AS Aluno, T.COD_Estagio AS Estagio, E.CH_Fantasia AS Empresa 
                FROM turma_aluno_estagio T 
                LEFT JOIN turma Tu on Tu.CD_Turma = :idTurma 
                LEFT JOIN pessoa p on p.CD_Pessoa = T.CD_Aluno 
                LEFT JOIN estagio ES on ES.CD_Estagio = T.COD_Estagio 
                LEFT JOIN empresa E on ES.CD_Empresa = E.CD_Empresa 
                WHERE T.CD_Turma = :idTurma";
            
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
    
                $result = $conect->prepare($select);
                
                $result->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    while($tabela = $result->fetch(PDO::FETCH_OBJ)){
                        if($tabela->Estagio == null){
                            $tabela->Estagio = "não";
                            $tabela->Empresa = "---";
                        }
                        else{
                            $tabela->Estagio = "sim";
                        }
                        $array[] = $tabela;
                    }
                    
                    return $array;
                }
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