<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
    include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');

    
    class Turma{

        protected $CD_Turma;
        protected $Horario; //Formato 2AD(dia,inicio, fim);
        protected $DT_Inicio;
        protected $DT_FIM;
        protected $FK_CD_Professor;


        public function InserirNovaTurma($cdsemestre, $dia, $Horario, $FK_CD_Professor){

            if(semestre::ValidaSemestre($cdsemestre,true) == "invalido")
                return "invalido";
            if(semestre::AbrirSemestre($cdsemestre, true) == "falha na inserção")
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


        public function EditarTurma($id, $cdsemestre, $dia, $Horario, $FK_CD_Professor){

            if(semestre::ValidaSemestre($cdsemestre, false) == "invalido")
                return "invalido";
            if(semestre::AbrirSemestre($cdsemestre, false) == "falha na inserção")
                return "false";

            $update = "UPDATE turma set CH_Disciplina = :disciplina, CD_Professor = :cd_professor, CD_Semestre = :cdsemestre, CH_Horario = :ch_horario 
                        WHERE CD_Turma = :id";

            $horario = $this->ConverteHorario($dia,$Horario);

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $ch_disciplina = "Gerenciamento de Estagio";
                $vf_ativo = 1;

                $result = $conect->prepare($update);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
                $result->bindParam(':disciplina', $ch_disciplina, PDO::PARAM_STR);
                $result->bindParam(':cd_professor', $FK_CD_Professor, PDO::PARAM_INT);
                $result->bindParam(':cdsemestre', $cdsemestre, PDO::PARAM_STR);
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
                echo "<strong> ERRO DE PDO EDITAR TURMA <strong>".$e->getMessage();
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
            $horaEmLetra = $dia.".".$horaL;

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
                    echo"TABELA VAZIA";
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

        public function RetornaDadosDoEstágio(){
            $select = "SELECT ES.*,  T.CD_Turma, T.CD_Semestre
                        FROM turma_aluno_estagio TAE
                        Join turma T on T.CD_Turma = TAE.CD_Turma
                        Join estagio ES on ES.CD_Estagio = TAE.COD_Estagio
                        Where T.CD_Turma = :idTurma and TAE.CD_Aluno = :idAluno";
        }

        public static function RetornaTurma($id){
            $select = "SELECT * FROM turma WHERE CD_Turma = :idTurma";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':idTurma', $id, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    $arr = $result->fetch(PDO::FETCH_OBJ);
                    return $arr;
                }
            }
            catch(PDOException $e){
                echo "ERRO  EM RETORNAR TURMA ". $e->getMessage(). "<br>";
            }                
        }

        public static function TraduzChavesTurmas($array){
            $p = new Pessoa();
            $prof = $p->RetornaPessoa($array->CD_Professor);
            $array->CD_Professor = $prof->CH_Nome;
            $diaDaSemana = explode(".",$array->CH_Horario);

            switch($diaDaSemana[0]){
                case 2:
                    $array->CH_Horario = "Seg";
                    break;
                case 3:
                    $array->CH_Horario = "Ter";
                    break;
                case 4:
                    $array->CH_Horario = "Quar";
                    break;
                case 5:
                    $array->CH_Horario = "Quin";
                    break;
                case 6:
                    $array->CH_Horario = "Sex";
                    break;
            }

            return $array;
        }

        public function FinalizarTurma($id){
            $update = "UPDATE turma SET VF_Ativo = 0 WHERE CD_TURMA = :idTurma";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($update);
                $result->bindParam(':idTurma', $id, PDO::PARAM_INT);
                $result->execute();

                $retorno = $result->rowCount();
                if($retorno > 0){
                    return true;
                }

                false;
            }
            catch(PDOException $e){
                echo "ERRO  EM RETORNAR TURMA ". $e->getMessage(). "<br>";
            }                
        }
        
        public static function VerificaSeATumaAberta($idTurma){
            $select = "SELECT * FROM turma WHERE CD_Turma = :id and VF_Ativo = 1";


            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':id', $idTurma, PDO::PARAM_INT);
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
                echo "ERRO DE PDO SELECT na função VerificaSeATumaAberta ". $e->getMessage()."<br/>";
            }
        }

        public function InserirAlunoNaTurma($idAluno, $idTurma){
            include_once('ClassPessoa.php');
            
            $p = new Pessoa();
            if(self::VerificaSeATumaAberta($idTurma)){
                if($p->VerificaSePessoaExiste($idAluno)){
                    $insert = "INSERT INTO turma_aluno_estagio(CD_Aluno, CD_Turma, CH_Situacao) 
                    VALUES (:idAluno, :idTurma, :chSituacao)";
                    
                    $conn = new ConexaoBD();
                    $conect = $conn->ConDB();
                    $situacao = "Em Andamento";

                    try{
                        $result = $conect->prepare($insert);
                        $result->bindParam(':idAluno', $idAluno, PDO::PARAM_INT);
                        $result->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
                        $result->bindParam(':chSituacao', $situacao, PDO::PARAM_STR);
                        $result->execute();

                        $retorno = $result->rowCount();
                        if($retorno > 0){
                            return "true";
                        }
                        else{
                            return "false";
                        }
                    }
                    catch(Exception $e){
                        echo "ERRO DE PDO SELECT na função InserirAlunoNaTurma ". $e->getMessage()."<br/>";

                    }
                }
                else{
                    return "!Existe";
                }
            }
            else{
                return "fechada";
            }
                
        }

        public static function UpdateEstagio($idTurma, $idAuno, $codEstagio){
            $update = "UPDATE turma_aluno_estagio SET COD_Estagio = :cod_Estagio WHERE CD_Turma = :idTurma AND CD_Aluno = :idAluno";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{

                $result = $conect->prepare($update);
                $result->bindParam(':cod_Estagio', $codEstagio, PDO::PARAM_INT);
                $result->bindParam(':idTurma', $idTurma, PDO::PARAM_INT);
                $result->bindParam(':idAluno', $idAuno, PDO::PARAM_STR);
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
                echo "<strong> ERRO DE PDO Função UpdateEstagio <strong> ".$e->getMessage();
            }
        }

    }

?>