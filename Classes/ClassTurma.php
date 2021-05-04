<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Turma{

        protected $CD_Turma;
        protected $Horario; //Formato 2AD(dia,inicio, fim);
        protected $DT_Inicio;
        protected $DT_FIM;
        protected $FK_CD_Professor;

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