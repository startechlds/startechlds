<?php
    include_once('C:/xampp/htdocs/projeto_final/startechlds/BD/conexao.php');
    class Vaga
    {
        public function InserirNovaVaga($cargo, $cd_empresa, $vr_valor, $horas_semanais, $qtd, $decricao){
            $conn = new ConexaoBD();
            $conect = $conn->ConDB();

            $insert = "INSERT INTO vaga (CH_Cargo, CD_Empresa, VR_Valor, CD_Horas_Semanais, CD_Qtd_Vaga, CH_Descricao, DT_Publicacao VF_Ativo) 
            VALUES (:cargo,:cd_empresa,:vr_valor,:horasSemanais,:qtdVaga, :descricao,:data_publicacao :vf_ativo)";

            try{
                $vf_ativo = 1;
                $data = new DateTime();
                $result = $conect->prepare($insert);
                $result->bindParam(':cargo', $cargo, PDO::PARAM_STR);
                $result->bindParam(':cd_empresa', $cd_empresa, PDO::PARAM_INT);
                $result->bindParam(':vr_valor', $vr_valor, PDO::PARAM_STR);
                $result->bindParam(':horasSemanais', $horas_semanais, PDO::PARAM_INT);
                $result->bindParam(':qtdVaga', $qtd, PDO::PARAM_INT);
                $result->bindParam(':descricao', $decricao, PDO::PARAM_STR);
                $result->bindParam(':data_publicacao', $data, PDO::PARAM_STR);
                $result->bindParam(':vf_ativo', $vf_ativo, PDO::PARAM_STR);
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

    }