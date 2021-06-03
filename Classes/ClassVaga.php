<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Vaga
    {
        public function InserirNovaVaga($cargo, $cd_empresa, $vr_valor, $horas_semanais, $qtd, $decricao){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "INSERT INTO vaga (CH_Cargo, CD_Empresa, VR_Valor, CD_Horas_Semanais, CD_Qtd_Vaga, CH_Descricao, DT_Publicacao, VF_Ativo) 
            VALUES (:cargo,:cd_empresa,:vr_valor,:horasSemanais,:qtdVaga, :descricao,:data_publicacao, :vf_ativo)";

            try{
                $vf_ativo = 1;
                $temp = (array) new DateTime();
                $data = $temp['date'];

                $result = $conect->prepare($insert);
                $result->bindParam(':cargo', $cargo, PDO::PARAM_STR);
                $result->bindParam(':cd_empresa', $cd_empresa, PDO::PARAM_INT);
                $result->bindParam(':vr_valor', $vr_valor, PDO::PARAM_STR);
                $result->bindParam(':horasSemanais', $horas_semanais, PDO::PARAM_INT);
                $result->bindParam(':qtdVaga', $qtd, PDO::PARAM_INT);
                $result->bindParam(':descricao', $decricao, PDO::PARAM_STR);
                $result->bindParam(':data_publicacao', $data, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_INT);
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
                echo "<strong> ERRO DE PDO ADICIONAR VAGA <strong>".$e->getMessage();
            }
            
        }

        public function EditarVaga($id, $cargo, $cd_empresa, $vr_valor, $horas_semanais, $qtd, $decricao){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "UPDATE vaga SET CH_Cargo = :cargo, CD_Empresa = :cd_empresa, VR_Valor = :vr_valor, CD_Horas_Semanais = :horasSemanais, CD_Qtd_Vaga = :qtdVaga, CH_Descricao = :descricao, DT_Edicao = :data_edicao, VF_Ativo = :vf_ativo
                    WHERE CD_Vaga = :id";

            try{
                $vf_ativo = 1;
                $temp = (array) new DateTime();
                $data = $temp['date'];

                $result = $conect->prepare($insert);
                $result->bindParam(':cargo', $cargo, PDO::PARAM_STR);
                $result->bindParam(':cd_empresa', $cd_empresa, PDO::PARAM_INT);
                $result->bindParam(':vr_valor', $vr_valor, PDO::PARAM_STR);
                $result->bindParam(':horasSemanais', $horas_semanais, PDO::PARAM_INT);
                $result->bindParam(':qtdVaga', $qtd, PDO::PARAM_INT);
                $result->bindParam(':descricao', $decricao, PDO::PARAM_STR);
                $result->bindParam(':data_edicao', $data, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_STR);
                $result->bindParam(':id', $id, PDO::PARAM_INT);
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
                echo "<strong> ERRO DE PDO ADICIONAR VAGA <strong>".$e->getMessage();
            }
            
        }

        public function DeletarVaga($idVaga){
            $delete = "DELETE FROM vaga WHERE CD_Vaga = :idvaga";

            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($delete);
                $result->bindParam(':idvaga', $idVaga, PDO::PARAM_INT);
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
                return "Erro ao deletar, há alunos inscritos nessa vaga";
            }
        }

        public function RetornaTabelaDadosVagas(){
            $select = "SELECT vaga.CD_Vaga, vaga.CH_Cargo, E.CH_Fantasia as Empresa, vaga.DT_Publicacao, vaga.VF_Ativo
                        FROM vaga
                        JOIN empresa E ON E.CD_Empresa = vaga.CD_Empresa 
                        ORDER BY DT_Publicacao desc";
                
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
                echo "ERRO DE PDO Retorna Dados Tabela ". $e->getMessage()."<br>";
            }
        }

        public function RetornaVagaEspecifica($idVaga){
            $select = "SELECT * FROM vaga WHERE CD_VAGA = :id";
                
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            try{
                $result = $conect->prepare($select);
                $result->bindParam(':id', $idVaga, PDO::PARAM_INT);
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
                echo "ERRO DE PDO Retorna Vaga Especifica ". $e->getMessage()."<br>";
            }
        }

    }