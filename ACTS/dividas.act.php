<?php
session_start();
require('../ACTS/connect.php');

$msg = "";
$destino = "location:../PAGES/confirmacaoInf.php";

// Verifica se as informações necessárias estão na sessão
if (isset($_SESSION['dividas'], $_SESSION['valores'], $_SESSION['juros'], $_SESSION['tempo'], $_SESSION['saldo'], $_SESSION['Id_user'],$_SESSION['nivelDivida'])) {
    
    // Extrai os dados das sessões
    $dividas = $_SESSION['dividas'];
    $valores = $_SESSION['valores'];
    $juros = $_SESSION['juros'];
    $tempos = $_SESSION['tempo'];
    $saldo = $_SESSION['saldo'];
    $user_id = $_SESSION['Id_user'];  // ID do usuário logado
    $nivelDivida = $_SESSION['nivelDivida'];
    // Concatena os dados das dívidas, valores, juros e tempos em strings separadas por vírgulas
    $dividasStr = implode(',', $dividas);
    $valoresStr = implode(',', $valores);
    $jurosStr = implode(',', $juros);
    $temposStr = implode(',', $tempos);

    // Cria a consulta SQL para inserir no banco de dados
    $query = "INSERT INTO `informacao` (`saldo`,`Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) 
              VALUES ('$saldo','$dividasStr', '$valoresStr', '$temposStr', '$jurosStr', '$user_id', $nivelDivida)";

    // Executa a consulta
    if (mysqli_query($con, $query)) {
        $msg = "Informações salvas com sucesso.";
    } else {
        $msg = "Erro ao salvar informações: " . mysqli_error($con);
    }

    // Redireciona para a próxima página com a mensagem
    $_SESSION['msg'] = $msg;
    header($destino);
    exit();
} else {
    // Caso as informações da sessão não estejam completas
    $msg = "Dados insuficientes para salvar.";
    $_SESSION['msg'] = $msg;
    header($destino);
    exit();
}
?>
