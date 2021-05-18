<?php
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassTurma.php');

                        $pessoa = new Turma();
                        $data = (array) new DateTime();
                        $RES = $pessoa->InserirNovaTurma("2021.2", 2, 18, 9);
                        print_r($RES);
                        //$semestre = semestre::AbrirSemestre("2023.1");

                        //print_r($exibir);
                     
                       ?>