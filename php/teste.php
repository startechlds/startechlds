<?php
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassTurma.php');

                        $pessoa = new Pessoa();
                        $RES = $pessoa->RetornaUltimo();
                        print_r($RES);
                        //$semestre = semestre::AbrirSemestre("2023.1");

                        //print_r($exibir);
                     
                       ?>