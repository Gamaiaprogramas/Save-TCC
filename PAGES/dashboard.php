<?php
// Inicia a sessão
session_start();
require("../partials/headeralternative.php"); 
require("../ACTS/sec_dashboard.php");

// Conexão com o banco de dados
include("../ACTS/connect.php");

// Obter dados do usuário logado
$id_user = $_SESSION['Id_user'];

// Consultar dados do saldo, dívidas e gastos
$query_saldo = "SELECT saldo FROM informacao WHERE Id_User = '$id_user'";
$query_dividas = "SELECT Nomes_Dividas, Valores_Dividas, Juros_Dividas, Tempo_Dividas FROM informacao WHERE Id_User = '$id_user'";
$query_gastos = "SELECT Nomes_gastos, Valores_gastos FROM gastosfix WHERE Id_User = '$id_user'";


// Executar consultas
$result_saldo = mysqli_query($con, $query_saldo);
$result_dividas = mysqli_query($con, $query_dividas);
$result_gastos = mysqli_query($con, $query_gastos);

$query_reserva = "SELECT valor_reserva FROM informacao WHERE Id_User = '$id_user'";


$result_reserva = mysqli_query($con, $query_reserva);
$ValorResultado = mysqli_fetch_assoc($result_reserva);
$nivelBusca = mysqli_query($con, "SELECT nivel FROM `informacao` WHERE `Id_user` = '$id_user'");
$buscaResult = mysqli_fetch_assoc($nivelBusca);
$ValorRultadoReal = $ValorResultado['valor_reserva'];

$nivel2 = $buscaResult['nivel']; // Corrigir para acessar o valor da chave 'nivel'

if ($result_dividas) {
    $dividas = mysqli_fetch_assoc($result_dividas);
    $nomes_dividas = explode(",", $dividas['Nomes_Dividas']);
    $valores_dividas = explode(",", $dividas['Valores_Dividas']);
    $juros_dividas = explode(",", $dividas['Juros_Dividas']);
    $tempo_dividas = explode(",", $dividas['Tempo_Dividas']);

    // Somar apenas as dívidas ativas
    $total_dividas = 0;
    for ($i = 0; $i < count($nomes_dividas); $i++) {
        if (intval($tempo_dividas[$i]) > 0 || intval($tempo_dividas[$i]) == 9999) {
            $total_dividas += floatval($valores_dividas[$i]);
        }
    }
} else {
    $total_dividas = 0;
}

if ($result_gastos) {
    $gastos = mysqli_fetch_assoc($result_gastos);
    $nomes_gastos = explode(",", $gastos['Nomes_gastos']);
    $valores_gastos = explode(",", $gastos['Valores_gastos']);
    $total_gastos = array_sum(array_map('floatval', $valores_gastos));
} else {
    $total_gastos = 0;
}

// Verificar se as consultas retornaram resultados
if ($result_saldo) {
    $salario = mysqli_fetch_assoc($result_saldo)['saldo'];
    $saldo = $salario - $total_dividas - $total_gastos;
} else {
    $salario = 0;
}


$query_metas = "SELECT id, nome_meta, valor_meta FROM caixinha_sonhos WHERE user_id = '$id_user'";
$result_metas = mysqli_query($con, $query_metas);

$nomeMeta = [];
$valorMeta = [];
$idMeta = [];

while ($meta = mysqli_fetch_assoc($result_metas)) {
    $idMeta[] = $meta['id'];
    $nomeMeta[] = $meta['nome_meta'];
    $valorMeta[] = $meta['valor_meta'];
}



// Calcular o total em relação ao salário
$total = floatval($salario) + $total_dividas + $total_gastos;
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Save - Dashboard Financeira</title>
    <link rel="stylesheet" href="../STYLE/dashboard.css">
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="../JS/jquery-3.7.1.min.js"></script>
</head>
<body>
    <style>
        header{
            background-color: #e9ecef;
        }
    </style>
    <div class="dashboard-container">
        <div class="tituloDash">
            <h1>Bem vindo(a) a sua <a>Dashboard</a>!</h1>
        </div>
        <div class="infoGastos">
            <div class="esquerdaInfo">
                <div id="chartdiv"></div>
            </div>
            <div class="alterarGasto">
                <button id ="buton">Alterar ganho mensal <i class="fa-solid fa-pen"></i></button>
            </div>
            <div class="direitaInfo">
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/imgNotas.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto2">
                        <h1>Saldo</h1>
                    </div>
                    <div class="propGasto2">
                        <h1>R$<?php echo number_format($saldo, 2, ',', '.'); ?></h1>
                    </div>
                </div>
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/iconeGastofixo.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto2">
                        <h1>Gastos Fixos</h1>
                    </div>
                    <div class="propGasto2">
                        <h1>R$<?php echo number_format($total_gastos, 2, ',', '.'); ?></h1>
                    </div>
                </div>
                <div class="divGastos">
                    <div class="iconeGastos">
                        <img src="../PICS/imgsSelecao/iconeDespesa.svg" alt="Imagem Notas" class="produto">
                    </div>
                    <div class="nomeGasto2">
                        <h1>Dívidas</h1>
                    </div>
                    <div class="propGasto2">
                        <h1>R$<?php echo number_format($total_dividas, 2, ',', '.'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="tituloDividas">
            <h1>Dívidas <a>!</a></h1>
        </div>
        <div class="espacoBtnDividas">
            <div class="btnDividas">
                <a>Exibir Dívidas<a class="laranja">Pagas</a><i class="fa-solid fa-chevron-down"></i></a>
                <div class="subDividas">
                    <div class="espacoCimaDividas">
                        <a>Nome</a>
                        <a>Valor</a>
                        <a>Status</a>
                    </div>
                    <div class="espacoBaixoDividas">
                        <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                            <?php if (intval($tempo_dividas[$i]) == 0): ?>
                                <div class="linhaDivida">
                                    <div class="divnomeDivida">
                                    <p><strong><?php echo htmlspecialchars($nomes_dividas[$i]); ?></strong></p>
                                    </div>
                                    <div class="divValorDivida">
                                        <p><?php echo number_format(floatval($valores_dividas[$i]), 2, ',', '.'); ?></p>
                                    </div>
                                    <div class="divStatusDivida">
                                        <p>Paga</p>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="espacoDividas">
            <div class="espacoBtnEsquerda">
                <button class="btnEsquerda" onclick="direcao(1)"><i class="fa-solid fa-arrow-left fa-2xl"></i></button>
            </div>
            <div class="containerDividas">
                <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                    <?php if (intval($tempo_dividas[$i]) > 0 || intval($tempo_dividas[$i]) == 9999): ?>
                        <div class="cardDivida">
                            <div class="nomeDivida">
                                <p><strong><?php echo htmlspecialchars($nomes_dividas[$i]); ?></strong></p>
                            </div>
                                <div class="espacoDividasInfo">
                                    <div class="esquerdaDividasInfo">
                                        <div class="valorDivida">
                                            <p>Valor:</p>
                                        </div>
                                        <div class="valorParcela">
                                            <p>Valor Parcela:</p>
                                        </div>
                                        <div class="jurosDivida">
                                            <p>Juros:</p>
                                        </div>
                                        <div class="tempoDivida">
                                            <p>Tempo: </p>
                                        </div>
                                    </div>
                                    <div class="direitaDividasInfo">

                                    <div class="valorDivida2">
                                    <?php echo number_format(floatval($valores_dividas[$i]), 2, ',', '.'); ?>
                                        </div>
                                        <div class="valorParcela2">
                                            <p>500</p>
                                        </div>
                                        <div class="jurosDivida2">
                                        <?php echo htmlspecialchars($juros_dividas[$i]); ?>
                                        </div>
                                        <div class="tempoDivida2">
                                        <?php 
                                            if (intval($tempo_dividas[$i]) == 9999) {
                                                echo "Pagamento Único";
                                            } else {
                                                echo htmlspecialchars($tempo_dividas[$i]) . " meses";
                                            }
                                            ?>
                                        </div>
                                        
                                        
                                        
                                        
                                    </div>
                                    
                                
                                
                            </div>
                            <div class="espacoFormsDivida">
                                <form method="post" action="../ACTS/pagar_divida.php">
                                                <input type="hidden" name="debt_index" value="<?php echo $i; ?>">
                                                <input type="hidden" name="tempo_dividas" value="<?php echo intval($tempo_dividas[$i]); ?>">
                                                <div class="btnDivida">
                                                    <button class="botaoDivida" type="submit">Pagar Parcela</button>
                                                </div>
                                            </form>

                                <!-- Botão para excluir a dívida -->
                                <form method="post" action="../ACTS/excluir_divida.php" style="display: inline;">
                                    <input type="hidden" name="debt_index" value="<?php echo $i; ?>">
                                    <div class="btnExcluir">
                                        <button class="botaoExcluir" type="submit" onclick="return confirm('Tem certeza que deseja excluir esta dívida?');">
                                            Excluir Dívida <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            
                        </div>
                    <?php endif; ?>
                <?php endfor; ?>
            </div>
            <div class="espacoBtnDireita">
                <button class="btnDireita" onclick="direcao(2)"><i class="fa-solid fa-arrow-right fa-2xl"></i></button>
            </div>
        </div>
        <script>
            function direcao(e){
                var direcao = document.querySelector(".containerDividas");
                if(e == 1){
                    direcao.scrollLeft = direcao.scrollLeft - 1550;
                }else if (e == 2){
                    direcao.scrollLeft = direcao.scrollLeft + 1550;
                }
            }
        </script>
<script>
am5.ready(function() {

  // Criar o elemento root
  var root = am5.Root.new("chartdiv");

  // Definir temas
  root.setThemes([am5themes_Animated.new(root)]);

  // Criar gráfico de pizza
  var chart = root.container.children.push(
    am5percent.PieChart.new(root, {
      startAngle: 160, 
      endAngle: 380
    })
  );

  // Criar primeira série
  var series0 = chart.series.push(
    am5percent.PieSeries.new(root, {
      valueField: "value",        // Campo de valor
      categoryField: "category",  // Campo de categoria
      startAngle: 160,
      endAngle: 380,
      radius: am5.percent(70),   // Valor em percentual
      innerRadius: am5.percent(65)
    })
  );

  // Definir cor personalizada para cada segmento
  var colorSet = am5.ColorSet.new(root, {
    colors: [
      am5.color(0x10002b), // Cor para "Ganho Mensal" (vermelho)
      am5.color(0xFF6D00), // Cor para "Gastos Fixos" (verde)
      am5.color(0xadb5bd)  // Cor para "Dívidas" (azul)
    ]
  });

  // Aplica o color set à série 0
  series0.set("colors", colorSet);
  series0.ticks.template.set("forceHidden", true);
  series0.labels.template.set("forceHidden", true);

  // Criar segunda série (mesma configuração de cor)
  var series1 = chart.series.push(
    am5percent.PieSeries.new(root, {
      startAngle: 160,
      endAngle: 380,
      valueField: "value",
      innerRadius: am5.percent(80),
      categoryField: "category"
    })
  );

  // Aplica o color set à série 1 também
  series1.set("colors", colorSet);
  series1.ticks.template.set("forceHidden", true);
  series1.labels.template.set("forceHidden", true);

  // Adicionar label central (total)
  var label = chart.seriesContainer.children.push(
    am5.Label.new(root, {
      textAlign: "center",
      centerY: am5.p100,
      centerX: am5.p50,
      // Usar o valor do ganho mensal vindo do PHP
      text: "[fontSize:18px]Ganho mensal[/]:\n[bold fontSize:30px]" + "<?php echo number_format($salario, 2, ',', '.'); ?>" + "[/]"
    })
  );

  // Dados para o gráfico
  var data = [
    {
      category: "Ganho Mensal", // Categoria para o ganho mensal
      value: <?php echo $salario; ?>  // Valor do ganho mensal vindo do PHP
    },
    {
      category: "Gastos Fixos", // Categoria para os gastos fixos
      value: <?php echo $total_gastos; ?>  // Valor dos gastos fixos vindo do PHP
    },
    {
      category: "Dívidas", // Categoria para as dívidas
      value: <?php echo $total_dividas; ?>  // Valor das dívidas vindo do PHP
    }
  ];

  // Definir os dados no gráfico
  series0.data.setAll(data);
  series1.data.setAll(data);

}); // end am5.ready()
</script>
    






        <div class="espacoBtnDivida">
            <div><a href="../PAGES/adicionar_novo.php" class="btnAdicionarDivida">Adicionar Dívida <i class="fa-solid fa-circle-plus"></i></a></div>
            <button id="butonDivida">Alterar Dívida <i class="fa-solid fa-pen"></i></button>
        </div>

        <div class="tituloFixo">
            <h1>Gastos <a>Fixos</a>!</h1>
        </div>
        <div class="containerFixo">
    <?php for ($i = 0; $i < count($nomes_gastos); $i++): ?>
        <div class="cardFixo">
            <div class="nomeFixo">
                <p><strong><?php echo htmlspecialchars($nomes_gastos[$i]); ?></strong></p>
            </div>
            <div class="valorFixo">
                <p>Valor: R$ <?php echo number_format(floatval($valores_gastos[$i]), 2, ',', '.'); ?></p>
            </div>
            
            <!-- Formulário para excluir gasto fixo -->
            <form id="formExcluirGasto"  method="post" action="../ACTS/excluir_gasto.php" style="display: inline;">
                <input type="hidden" name="gasto_index" value="<?php echo $i; ?>">
                <div class="btnExcluir">
                    <button class="botaoExcluirGasto" type="button" onclick="ConfirmarExcluirGasto()">
                        Excluir Gasto <span><i class="fa-solid fa-trash"></i></span>
                    </button>
                    <div id="overlay2">
                        <div id="confirmacao2">
                            <div class="nomeConfirmacao2">
                                <p>Tem certeza que deseja excluir a dívida?</p>
                            </div>
                            <div class="espacoConfirmacao2">
                                <button class="button2" id="simBtn2" type="button"><span>SIM</span></button> <!-- Garantir que o tipo seja "button" -->
                                <button class="button2 cancel" id="naoBtn2" type="button"><span>NÃO</span></button> <!-- Garantir que o tipo seja "button" -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    <?php endfor; ?>
    <script>
        function ConfirmarExcluirGasto() {
        // Exibe o overlay
            document.getElementById('overlay2').style.display = 'block';
        }

        // Evento para o botão "NÃO" fechar o overlay sem enviar o formulário
        document.getElementById('naoBtn2').onclick = function() {
            document.getElementById('overlay2').style.display = 'none'; // Fecha o overlay
        }

        // Evento para o botão "SIM" enviar o formulário
        document.getElementById('simBtn2').onclick = function() {
            // Envia o formulário específico
            document.getElementById('formExcluirGasto').submit();
        }


    </script>
</div>
        <div class="espacoBtnFixo">
            <a href="../PAGES/adicionar_gastos_fixos.php" class="btnAdicionarFixo">Adicionar Gasto <i class="fa-solid fa-circle-plus"></i></a>
            <button id= "butonGasto">Alterar Gasto <i class="fa-solid fa-pen"></i></button>
        </div>

        <!-- Estilização da nova seção de dívidas pagas -->

                <?php 
                if($nivel2 == 2 || $nivel2 == 3){
                    echo "
                    <style>
                    
                    .planFinanceiro{
                    display : block;
                    }
                    .caixinhaSonhos{
                    display : block;
;
                }
                    </style>";
                }else{
                    echo "
                    <style>
                    
                    .planFinanceiro{
                    display : none;
                    }
                    .caixinhaSonhos{
                    display : none;
                }
                    </style>";
                }
                ?>
        <div class="planFinanceiro">
            <div class="tituloFinanceiro">
                <a>Reserva para o Futuro!</a>
            </div>
            <div class="textoFinanceiro">
                <a>Uma Reserva para o Futuro é um fundo financeiro criado para garantir segurança em longo prazo.</a>
                <a>Ela é formada por economias ou investimentos, visando cobrir necessidades futuras como</a>
                <a>aposentadoria, educação ou emergências. O objetivo é ter recursos disponíveis em momentos de</a>
                <a>imprevistos, proporcionando estabilidade e tranquilidade financeira.</a>            
            </div>
            <form action="../ACTS/reserva_emergencia.act.php" method="post">
                <label class="nomeReserva" for="reserva_input">Reserva Atual: <a> <?php  echo $ValorRultadoReal ?> </a></label>
                <input type="number" name="reserva_input">
                <button type="submit">Adicionar<i class="fa-solid fa-circle-plus"></i></button>
            </form>
        </div>

        <div class="caixinhaSonhos">
            <div class="tituloCaixinha">Caixinha Dos Sonhos!</div>
            <div class="criarMeta">
                <a>Criar Nova <span>Meta</span></a>
                <form action="../ACTS/caixinha_de_sonhos.act.php" method="post">
                    <label for="nome_meta">Nome da Meta:</label>
                    <input type="text" name="nome_meta" required>
                    
                    <label for="valor_meta">Valor da Meta:</label>
                    <input type="number" name="valor_meta" step="0.01" required>
                    
                    <button type="submit">Criar Meta <i class="fa-solid fa-circle-plus"></i></button>
                </form>
            </div>
            <div class="baixoCaixa">
                <div class="tituloMeta">Suas <span>Metas!</span></div>
                <div class="espacoMetas">
                    <?php
                        // Consulta as metas do usuário
                        $userId = $_SESSION['Id_user'];
                        $query = "SELECT * FROM caixinha_sonhos WHERE user_id = $userId";
                        $result = mysqli_query($con, $query);
                        $valorMeta = 'valor_meta';
                        $valorAtual = 'valor_atual';
                        $nomeMeta = 'nome_meta';
                        $_SESSION['id_da_meta'] = 0;

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $percentual = ($row['valor_atual'] / $row['valor_meta']) * 100;
                                $metaId = $row['id'];
                                $_SESSION['id_da_meta'] = $metaId;
                                ?>
                                <div class='meta'>
                                    <p class="nomeMeta"><strong><?php echo $row['nome_meta']; ?></strong></p>
                                    
                                    <!-- Formulário para depósito -->
                                    <?php if ($row['valor_atual'] < $row['valor_meta']) { ?>
                                        <form class="formDepositar" action="../ACTS/caixinha_deposito.php" method="post">
                                            <input type="hidden" name="meta_id"  value="<?php echo $metaId; ?>">
                                            <input type="text" id="valor_deposito" name="valor_deposito" placeholder="R$999,99" step="0.01" required>
                                            <input type="submit" value="Guardar">
                                        </form>
                                    <?php } else { ?>
                                        <p class="meta-concluida">Meta concluída! 🎉</p>
                                    <?php } ?>

                                    <p class="nomeProgresso">Progresso: <?php echo "{$row['valor_atual']} / {$row['valor_meta']}"; ?></p>
                                    
                                    <!-- Barra de progresso -->
                                    <div class="progress-container">
                                        <div class="progress-bar" id="progressBar-<?php echo $metaId; ?>" style="width: <?php echo $percentual; ?>%;"></div>
                                    </div>
                                    <div class="espacoBtnMeta">
                                        <button><span>Alterar Meta</span></button>
                                         <button type="button" onclick="confirmarEnvio()">Excluir Meta</button>
                                    </div>
                                </div>
                                <?php
                            }
                        } else {
                            echo "<p>Você ainda não criou metas.</p>";
                        }
                    ?>
                </div>
            </div>
            
            <div id="overlay">
                <div id="confirmacao">
                    <div class="nomeConfirmacao">
                        <p>Tem certeza que deseja excluir a divida </strong></p>
                    </div>
                    <div class="espacoConfirmacao">
                        <button class="button" id="simBtn"><span><a href="../ACTS/excluirMeta.php">SIM</a></span></button>
                        <button class="button cancel" id="naoBtn">NÃO</button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            function confirmarEnvio() {
                document.getElementById('overlay').style.display = 'block';
            }
            document.getElementById('naoBtn').onclick = function() {
                document.getElementById('overlay').style.display = 'none'; // Fecha o overlay
            }

            


            document.getElementById('valor_deposito').addEventListener('input', function (e) {
                let value = e.target.value.replace(/\D/g, ''); // Remove tudo que não é dígito

                // Limita a um máximo de 15 dígitos (sem contar vírgulas e pontos)
                if (value.length > 15) value = value.slice(0, 15);

                // Formata o número com R$: insere a vírgula e depois os pontos para separar os milhares
                e.target.value = 'R$ ' + new Intl.NumberFormat('pt-BR', {
                    minimumFractionDigits: 2,
                    maximumFractionDigits: 2
                }).format(value / 100);
            });

            
        </script>
<!-- Popup -->
<div id="popup" style="display: none;">
    <div class="popup-content">
        <p>Parabéns! Você atingiu sua meta!</p>
        <button onclick="closePopup()">Fechar</button>
    </div>
</div>

<script>
    function showPopup() {
    document.getElementById('popup').style.display = 'flex';
}

function closePopup() {
    document.getElementById('popup').style.display = 'none';
}


</script>





    </div>
   
</body>
<script src="../JS/alterarDadosJs.js"></script>
<div class="alterarDados2" id="idDivMae">
    <!-- Alterar Dívida -->
    <!-- Formulário para atualizar dívida -->
    <div class="tituloAtualizarDivida" id= "idDivida1">
        <h2>Atualizar <a>Dívida</a></h2>
    </div>
<div class="formAtualizarDivida" id= "idDivida2">
    <form method="post" action="../ACTS/update_divida.php">
        <label for="index_divida">Escolha a dívida:</label>
        <select name="index_divida" id="index_divida" onchange="preencherCamposDivida()">
            <?php for ($i = 0; $i < count($nomes_dividas); $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo htmlspecialchars($nomes_dividas[$i]); ?></option>
            <?php endfor; ?>
        </select>

        <label for="novo_nome_divida">Nome Atual:</label>
        <input type="text" name="novo_nome_divida" id="novo_nome_divida" required>

        <label for="novo_valor_divida">Valor Atual:</label>
        <input type="text" name="novo_valor_divida" id="novo_valor_divida" required>

        <label for="novo_juros_divida">juros Atual:</label>
        <input type="text" name="novo_juros_divida" id="novo_juros_divida" required>

        <label for="novo_tempo_divida">Tempo Atual:</label>
        <input type="text" name="novo_tempo_divida" id="novo_tempo_divida" required>

        <button type="submit" class="btnAtualizar">Atualizar Dívida</button>
    </form>
</div>

<script>
    const nomesDividas = <?php echo json_encode($nomes_dividas); ?>;
    const valoresDividas = <?php echo json_encode($valores_dividas); ?>;
    const jurosDividas = <?php echo json_encode($juros_dividas); ?>;
    const tempoDividas = <?php echo json_encode($tempo_dividas); ?>;

    function preencherCamposDivida() {
        const index = document.getElementById("index_divida").value;
        document.getElementById("novo_nome_divida").value = nomesDividas[index];
        document.getElementById("novo_valor_divida").value = valoresDividas[index];
        document.getElementById("novo_juros_divida").value = jurosDividas[index];
        document.getElementById("novo_tempo_divida").value = tempoDividas[index];
    }

   
</script>


<!-- Formulário para atualizar gasto fixo -->
    <div class="tituloAtualizarGasto"  id= "idGasto1" >
        <h2>Atualizar <a>Gasto Fixo</a></h2>
    </div>
    <div class="formAtualizarGasto" id= "idGasto2">
        <form method="post" action="../ACTS/update_gasto.php">
            <label for="index_gasto">Escolha o gasto fixo:</label>
            <select name="index_gasto" id="index_gasto" onchange="preencherCamposGasto()">
                <?php for ($i = 0; $i < count($nomes_gastos); $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo htmlspecialchars($nomes_gastos[$i]); ?></option>
                <?php endfor; ?>
            </select>

            <label for="novo_nome_gasto">Nome Atual:</label>
            <input type="text" name="novo_nome_gasto" id="novo_nome_gasto" required>

            <label for="novo_valor_gasto">Valor Atual:</label>
            <input type="number" name="novo_valor_gasto" id="novo_valor_gasto" required>

            <button type="submit" class="btnAtualizar">Atualizar Gasto</button>
        </form>
    </div>
<script>
    const nomesGastos = <?php echo json_encode($nomes_gastos); ?>;
    const valoresGastos = <?php echo json_encode($valores_gastos); ?>;

    function preencherCamposGasto() {
        const index = document.getElementById("index_gasto").value;
        document.getElementById("novo_nome_gasto").value = nomesGastos[index];
        document.getElementById("novo_valor_gasto").value = valoresGastos[index];
    }


</script>


<!-- Formulário para atualizar saldo -->
<div class="formAtualizarSaldo" id= "idSaldo">

    <form method="post" action="../ACTS/update_saldo.php">
        <label for="novo_saldo">Novo Saldo:</label>
        <input type="number" name="novo_saldo" id="novo_saldo" step="0.01" required>

        <button type="submit" class="btnAtualizar">Atualizar Saldo</button>
    </form>
</div>

  
    </div>
    <button id="voltar" class="voltar"><i class="fa-solid fa-x"></i></button>
</html>





<div class="formAtualizarMeta" id= "idMeta">
<form method="post" action="../ACTS/update_meta.php">
    <label for="index_meta">Escolha a meta:</label>
    <select name="index_meta" id="index_meta" onchange="preencherCamposMeta()">
        <?php for ($i = 0; $i < count($nomeMeta); $i++): ?>
            <option value="<?php echo $idMeta[$i]; ?>">
                <?php echo htmlspecialchars($nomeMeta[$i]); ?>
            </option>
        <?php endfor; ?>
    </select>

    <label for="novo_nome_meta">Nome Atual:</label>
    <input type="text" name="novo_nome_meta" id="novo_nome_meta" required>

    <label for="novo_valor_meta">Valor Atual:</label>
    <input type="number" name="novo_valor_meta" id="novo_valor_meta" required>

    <button type="submit" class="btnAtualizar">Atualizar Meta!</button>
</form>

</div>
<script>
  const nomesMeta = <?php echo json_encode($nomeMeta); ?>;
const valorMeta = <?php echo json_encode($valorMeta); ?>;

function preencherCamposMeta() {
    const index = document.getElementById("index_meta").selectedIndex;
    document.getElementById("novo_nome_meta").value = nomesMeta[index];
    document.getElementById("novo_valor_meta").value = valorMeta[index];
}


</script>