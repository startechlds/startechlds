<?php
    if(isset($_POST['btn_AdcAluno'])){
        include_once("../Classes/ClassPessoa.php");
        include_once("../Classes/ClassTurma.php");

        $nome = $_POST['nome']. ' '. $_POST['sobrenome'];
        $usuario =  $_POST['usuario'];
        $senha =  $_POST['senha'];
        $situacao =  $_POST['cbx_situacao'];

        $p = new Pessoa();
        if(Turma::VerificaSeATumaAberta($_COOKIE['idTurmaSelecionada'])){
            $verificaInsercao = $p->InserirNovaPessoa($nome, null, $usuario, $senha, 'A', $situacao);
            if($verificaInsercao){
                $pessoa = $p->RetornaUltimo();
                setcookie('alunoInserido', $pessoa->CD_Pessoa);
                echo "
                <script>
                    alert('ALUNO ADICIONADO COM SUCESSO');
                    window.location.href = 'crud_turma.php?novoAluno=verdade&finalizarTurma=falso';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO ADICIONAR NOVO ALUNO');
                    window.location.href = '../CoordenadorNovoAluno.html';
                </script>'";
            }
        }
        else{
            echo "
            <script>
                alert('Turma Selecionada Fechada, Impossivel adicionar aluno');
                window.location.href = '../CoordenadorNovoAluno.html';
            </script>'";
        }
         
    }

    if($_GET['acao'] == "abrirDoc"){
        if(!empty($_GET['nameDoc'])){
           /* $arquivo = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Convenio\\".$_GET['nameDoc'].".pdf";
            fgets(fopen($arquivo, "r"));
            print_r(fopen($arquivo, "r"));*/
            if($_GET['tipo'] == 'C')
                $file = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Curriculo\\".$_GET['nameDoc']."_DOC_Curriculo.pdf";
            else
                $file = "C:\\xampp\\htdocs\\projeto_final\\startechlds\\docs\\DOC_Relatorio\\".$_GET['nameDoc']."_DOC_Relatorio.pdf";

            $filename = "Custom file name for".$_GET['nameDoc']." .pdf"; /* Note: Always use .pdf at the end. */

            header('Content-type: application/pdf');
            header('Content-Disposition: inline; filename="' . $filename . '"');
            header('Content-Transfer-Encoding: binary');
            header('Content-Length: ' . filesize($file));
            header('Accept-Ranges: bytes');

            @readfile($file);
        }
    }

    if($_COOKIE['acaoA'] == "editar"){
        if(isset($_POST['btn_Editar'])){
            include_once("../Classes/ClassPessoa.php");

            $nome = $_POST['nome']. ' '. $_POST['sobrenome'];
            $usuario =  $_POST['usuario'];
            $id = $_COOKIE['idAluno'];
            $idTurma = $_COOKIE['idTurma'];

            $p = new Pessoa();
        
            $verificaUpdate = $p->EditarPessoa($id,$nome, null, $usuario,'A');

            if($verificaUpdate){
                echo "
                <script>
                    alert('ALUNO EDITADO COM SUCESSO');
                    window.location.href = '../CoordenadorTurmasSelect.php?id=$idTurma';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR ALUNO');
                
                </script>";
                echo $nome."<br>";
                echo $usuario."<br>";
            }

        }
    }

    if($_GET['acao'] == "apagar"){
        if(!empty($_GET['id'])){
            include_once("../Classes/ClassPessoa.php");
            $id = $_GET['id'];

            $p = new Pessoa();

            if($p->DeletarPessoa($id)){
                echo "
                <script>
                    alert('ALUNO DELETADO COM SUCESSO');
                    window.location.href = '../CoordenadorAlunos.php';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO DELETAR ALUNO');
                
                </script>";
            }
        }
        else{
            echo "
            <script>
                alert('Para Apagar um aluno é preciso selecioná-lo');
                window.location.href = '../CoordenadorAlunos.php';
            </script>";
        }
    }

    if($_COOKIE['acaoA'] == "INotas"){
        if(isset($_POST['btn_salvarNotas'])){
            include_once("../Classes/ClassPessoa.php");

            $situacao = $_POST['situacaoAluno'];
            $relatorio =  $_POST['cbx_situacaoRelatorio'];
            $n1 =  empty($_POST['n1']) ? null : $_POST['n1'];
            $n2 =  empty($_POST['n2']) ? null : $_POST['n1'];
            $n3 =  empty($_POST['n3']) ? null : $_POST['n3'];
            $naf = empty($_POST['naf']) ? null : $_POST['naf'];
            $idAluno = $_COOKIE['idAluno'];
            $idTurma = $_COOKIE['idTurma'];

            $p = new Pessoa();
           // echo "$relatorio";

           // $res = $p->CalculoMediaAluno($n1, $n2, $n3, $naf);
           // print_r($res);
        
           $verificaUpdate = $p->AtualizaNotaAlunos($idAluno, $n1, $n2, $n3, $naf, $relatorio);

            if($verificaUpdate){
                echo "
                <script>
                    alert('NOTAS EDITADAS COM SUCESSO');
                    window.location.href = '../DadosDasNotas.php?id=$idTurma&idAluno=$idAluno';
                </script>";
            }
            else{
                echo "
                <script>
                    alert('ERRO AO EDITAR ALUNO');
                    window.location.href = '../DadosDasNotas.php?id=$idTurma&idAluno=$idAluno';
                </script>";
            }

        }
    }

    if($_COOKIE['acaoA'] == "dEstagios"){
        include_once("../Classes/ClassTurma.php");

        if(Turma::VerificaSeATumaAberta($_COOKIE['idTurma'])){

            if(isset($_POST['btn_salvarEstagio'])){
                include_once("../Classes/ClassEstagio.php");
                
                $vf_ativo = isset($_POST['concluido']) ? $_POST['concluido'] : $_COOKIE['vf_concluido'];
                $ja_estagio = isset($_POST['jEstagio']) ? $_POST['jEstagio'] : $_COOKIE['j_estagiou'];
                $dt_inicio =  $_POST['dt_inicio'];
                $dt_final =  $_POST['dt_final'];
                $cd_empresa =  $_POST['cbx_Empresa'];
                $idAluno = $_COOKIE['idAluno'];
                $idTurma = $_COOKIE['idTurma'];

                $es = new Estagio();
            // echo "$relatorio";

            // $res = $p->CalculoMediaAluno($n1, $n2, $n3, $naf);
            // print_r($res);
            
            $resultado = $es->AtualizaDadosEstagio($idTurma, $idAluno, $cd_empresa, $dt_inicio, $dt_final, $ja_estagio, $vf_ativo);

                if($resultado){
                    echo "
                    <script>
                        alert('Dados do estágio EDITADAS COM SUCESSO');
                        window.location.href = '../DadosDoEstagio.php?id=$idTurma&idAluno=$idAluno';
                    </script>";
                }
                else{
                    echo "
                    <script>
                        alert('ERRO AO EDITAR Dados do estágio');
                        window.location.href = '../DadosDoEstagio.php?id=$idTurma&idAluno=$idAluno';
                    </script>";
                }

            }
        }
        else{
            echo "
            <script>
                alert('Turma Selecionada Fechada, Impossivel adicionar aluno');
                window.location.href = '../CoordenadorTurmas.php';
            </script>'";
        }
    }
    

?>