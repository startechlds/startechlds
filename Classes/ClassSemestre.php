<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Semestre{
        protected $NUM_Semestre;
        protected $Horario; //Formato 2AD(dia,inicio, fim);
        protected $DT_Inicio;
        protected $DT_FIM;
        protected $FK_CD_Professor;

        public function TabelaSemestreINArray(){
            $select = "SELECT * FROM semestre order by NUM_Semestre desc";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
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
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

        public static function ValidaSemestre($num_semestre){
            $temp = explode('.',$num_semestre);
            
            if($temp[1] == 1){
                $semestreAnt = ($temp[0] - 1).".2";
            }
            else{
                $semestreAnt = $temp[0].".1";
            }

            $select = "SELECT * FROM semestre WHERE NUM_Semestre = :anterior AND VF_Ativo = :vf";
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $vf = 0;
                $result = $conect->prepare($select);
                $result->bindParam(':anterior', $semestreAnt, PDO::PARAM_STR);
                $result->bindParam(':vf', $vf, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){                 
                    return "valido";
                }
                else{
                    return "falso";
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT A tah ". $e->getMessage();
            }
        }

        public static function GerarSemestre(){
            $temp = (array) new DateTime();
            $data = $temp = explode('-',$temp['date']);
            $ano = $temp[0] - 1;
            $semestre = array();

            for($i = 0; $i < 6; $i++){   
                if($i % 2 == 0)
                    $ponto = 1;
                else if($i % 2 == 1)
                    $ponto = 2;
                
                $semestre[] = $ano.".$ponto";
                if($ponto == 2)
                    $ano++;
            }
            return $semestre;
        }

        public static function AbrirSemestre($num_semestre){
            $select = "SELECT * FROM semestre WHERE NUM_Semestre = :semestre AND VF_Ativo = 1";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':semestre', $num_semestre, PDO::PARAM_STR);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){                 
                    return ;
                }
                else{
                    $insert = "INSERT INTO semestre(NUM_Semestre, DT_Inicio, DT_Final, VF_Ativo) 
                    VALUES (:semestre,:dataI,:dataF,:vf_ativo)";

                    $temp = (array) new DateTime();
                    $dataI = $temp['date'];
                    $dataF = null;
                    $vf_Ativo = 1;

                    $result = $conect->prepare($insert);
                    $result->bindParam(':semestre', $num_semestre, PDO::PARAM_STR);
                    $result->bindParam(':dataI', $dataI, PDO::PARAM_STR);
                    $result->bindParam(':dataF', $dataF, PDO::PARAM_STR);
                    $result->bindParam(':vf_ativo', $vf_Ativo, PDO::PARAM_INT);
                    $result->execute();

                    $retorno = $result->rowCount();
                    if($retorno > 0)            
                         return;
                    else
                        return "falha na inserção";
                    
                    
                }
            }
            catch(PDOException $e){
                echo "ERRO DE PDO SELECT ". $e->getMessage();
            }
        }

    } 
    
?>