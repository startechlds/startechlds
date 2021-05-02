<?php
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassTurma.php');

                        $pessoa = new Turma();

                        $exibir = $pessoa->RetornaDadosTurmaProfessorSituacao();

                        print_r($exibir);
                     
                       ?>