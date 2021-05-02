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
                $select = "SELECT T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.CH_Situacao as Situacao
                FROM turma AS T, pessoa as P 
                WHERE CH_Disciplina = 'Gerenciamento de estagio' AND T.CD_Professor = P.CD_Pessoa ORDER BY semestre DESC";
            }
            else{
                $select = "SELECT T.CD_Semestre AS Semestre, P.CH_Nome AS Professor, T.CH_Situacao as Situacao 
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

    }

?>