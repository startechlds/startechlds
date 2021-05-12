<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Turma{

        protected $CD_Turma;
        protected $Horario; //Formato 2AD(dia,inicio, fim);
        protected $DT_Inicio;
        protected $DT_FIM;
        protected $FK_CD_Professor;

        public function ConverteHorario($dia, $hora){
            $VetorLetras = array(8 =>  'A', 'B', 'C','D' ,'E', 'F', 'G', 'H','I', 'J', 'L', 'M', 'N', 'O', 
            'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'X', 'Z');

            $H = explode(':', $hora);

            $horaL =  $VetorLetras[$H[0]];
            $horaEmLetra = $dia.$horaL;

            return $horaEmLetra;
        }

        public function InserirNovaTurma($dia, $Horario, $DT_Inicio, $FK_CD_Professor){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "INSERT INTO turma(CH_Disciplina, CD_Professor, CD_Semestre, VF_Ativo, CH_Horario, CH_Situacao) 
                        VALUES (:disciplina,:cd_professor,:cdSemestre, :vf_ativo,:ch_horario, :ch_situacao)";

            $horario = $this->ConverteHorario();

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


        public function DeletarTurma($idTurma){
            $delete = "DELETE FROM turma WHERE CD_Turma = :idTurma";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($delete);
                $result->bindParam(':idTurma', $idPessoa, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return "deletado com sucesso";
                }
                else{
                   return "Erro ao deletar, há alunos nessa turma";
                }
                
            }
            catch(PDOExpetion $e){
                echo "ERRO DE DELETE ". $e->getMessage();
            }
        }

        public function RetornaDadosTurmaProfessorSituacao($idProfessor){

            if($idProfessor == null){
                $select = "SELECT T.CD_Turma as Id, T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.CH_Situacao as Situacao
                FROM turma AS T, pessoa as P 
                WHERE CH_Disciplina = 'Gerenciamento de estagio' AND T.CD_Professor = P.CD_Pessoa ORDER BY semestre DESC";
            }
            else{
                $select = "SELECT T.CD_Turma as Id, T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.CH_Situacao as Situacao 
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
                        $array[] = $num_semestre;
                    }
                    
                    return $array;
                }
                else{
                    echo"não exixte";
                }
            }
            catch(PDOExpetion $e){
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
            catch(PDOExpetion $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

    }

?>