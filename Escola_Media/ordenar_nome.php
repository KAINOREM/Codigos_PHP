<?php 

                function bubbleSortMultidimensional($array, $campo, $direcao = 'asc') {
                    $n = count($array);
                    
                    for ($i = 0; $i < $n - 1; $i++) {
                        $trocou = false;
                        
                        for ($j = 0; $j < $n - $i - 1; $j++) {
                            $valor1 = $array[$j][$campo];
                            $valor2 = $array[$j + 1][$campo];
                            
                            // Verifica se deve trocar
                            $deveTrocar = ($direcao === 'asc') ? 
                                        ($valor1 > $valor2) : 
                                        ($valor1 < $valor2);
                            
                            if ($deveTrocar) {
                                // Troca os elementos
                                $temp = $array[$j];
                                $array[$j] = $array[$j + 1];
                                $array[$j + 1] = $temp;
                                $trocou = true;
                            }
                        }
                        
                        // Se não houve trocas, o array já está ordenado
                        if (!$trocou) {
                            break;
                        }
                    }
                    
                    return $array;
                }

                // Exemplo de uso com os dados do banco:
                function obterDadosOrdenados($conexao, $campoOrdenacao = 'Nome', $direcao = 'asc') {
                    $sql = "SELECT * FROM `escola`.`aluno`";
                    $resultado = $conexao->query($sql);
                    
                    $dados = [];
                    while ($linha = $resultado->fetch_assoc()) {
                        $dados[] = $linha;
                    }
                    
                    // Aplica o Bubble Sort
                    return bubbleSortMultidimensional($dados, $campoOrdenacao, $direcao);
                }


                $hostname = "127.0.0.1";
                $user = "root";
                $password = "";
                $database = "escola";
                
                $conexao = new mysqli($hostname,$user,$password,$database);

                $sql="SELECT * FROM `escola`.`aluno`;";

                $resultado = $conexao->query($sql);

                $alunosOrdenados = obterDadosOrdenados($conexao, 'Nome', 'asc');

                foreach($alunosOrdenados as $row){
                    echo "<span class='rotulo'>Aluno:</span> " . $row['Nome']; 
                    echo "<br><span class='rotulo'>Primeira Nota:</span>" . $row['Nota_1'];
                    echo "<br><span class='rotulo'>Segunda Nota:</span> " . $row['Nota_2'];
                    echo "<br><span class='rotulo'>Terceira Nota:</span> " . $row['Nota_3'];
                    echo "<br><span class='rotulo'>Quarta Nota:</span> " . $row['Nota_4'];
                    echo "<br><span class='rotulo'>Media:</span> " . $row['Media'];
                    echo "<br><span class='rotulo'>Situação:</span> " . $row['Status'];
                    echo "<br><span class='rotulo'>Matéria:</span> " . $row['Materia'];
                    echo "<br><span class='rotulo'>Professor:</span> " . $row['Professor'];
                    echo "<br><br>";
                }
                $conexao -> close();
            ?>