<?php
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassSemestre.php');
                        include_once('C:/xampp/htdocs/projeto_final/startechlds/Classes/ClassPessoa.php');

                        $pessoa = new Pessoa();

                        $exibir = $pessoa->RetornaTabelaPessoaInArray();

                        print_r($exibir);
                     
                       ?>