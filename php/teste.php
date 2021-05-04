<?php
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassTurma.php');

                        $pessoa = new Turma();

                        $exibir = $pessoa->RetornaTabelaAlunoEstagioEmpresa(1);

                        print_r($exibir);
                     
                       ?>