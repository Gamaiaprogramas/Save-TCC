<?php
session_start();
require('../ACTS/connect.php'); // Certifique-se de que esta linha conecta corretamente ao banco
extract($_POST);
$msg = "";

$destino = "location:../ACTS/gastos.act.php";

$busca = mysqli_query($con,"SELECT `Nomes_Dividas` FROM `informacao` WHERE `Id_User` = '$_SESSION[Id_user]'");


if ($busca->num_rows == 0) {
// Substitui o valor do tempo por 9999 caso a dívida seja ilimitada
$tempos = $_POST['tempo'];
foreach ($_POST['tempo_ilimitada'] as $key => $ilimitada) {
    if ($ilimitada === '9999') {
        $tempos[$key] = 9999; // Substitui o valor do tempo
    }
}
$_SESSION['tempo'] = $tempos;



// Verifica se as informações necessárias estão na sessão
if (isset( $_SESSION['tempo'], $_SESSION['saldo'], $_SESSION['Id_user'], $_SESSION['nivelDivida'])) {

    // Extrai os dados das sessões
    $tempos = $_SESSION['tempo'];
    $saldo = floatval($_SESSION['saldo']);
    $user_id = $_SESSION['Id_user'];  // ID do usuário logado
    $nivelDivida = $_SESSION['nivelDivida'];

    // Validação simples para evitar inserção de valores vazios
    if (empty($dividas) || empty($valores) || empty($juros) || empty($tempos) || empty($saldo) || empty($user_id)) {
        $msg = "<p class=\"alerta red\">Preencha todos os campos!</p>";
        $_SESSION['msg'] = $msg;
        $destino = "location:../PAGES/adicaoDivida.php";
        
         header($destino);
        exit();
    }

    // Concatena os dados das dívidas, valores, juros e tempos em strings separadas por vírgulas
    $dividasStr = implode(',', $dividas);
    $valoresStr = implode(',', $valores);
    $jurosStr = implode(',', $juros);
    $temposStr = implode(',', $tempos);

    // Preparação da query para prevenir SQL Injection
    $query = "INSERT INTO `informacao` (`saldo`, `Nomes_Dividas`, `Valores_Dividas`, `Tempo_Dividas`, `Juros_Dividas`, `Id_User`, `nivel`) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    
    // Prepara a query
    if ($stmt = mysqli_prepare($con, $query)) {
        // Bind de parâmetros
        mysqli_stmt_bind_param($stmt, "sssssis", $saldo, $dividasStr, $valoresStr, $temposStr, $jurosStr, $user_id, $nivelDivida);

        // Executa a query
        if (mysqli_stmt_execute($stmt)) {

            $msg = "<p class=\"alerta green\">Informações salvas com sucesso</p>";
            $_SESSION['divida'] = 1;

        } else {
            $msg = "<p class=\"alerta red\">Erro ao salvar informações:"+  mysqli_error($con) + "</p>";
            $destino = "location:../PAGES/adicaoDivida.php";
        }

        // Fecha a statement
        mysqli_stmt_close($stmt);
    } else {

        $msg = "<p class=\"alerta red\">Erro ao preparar a query: "+  mysqli_error($con) + "</p>";
        $destino = "location:../PAGES/adicaoDivida.php";

    }

    // Redireciona para a próxima página com a mensagem
     header($destino);
    $_SESSION['msg'] = $msg;

    exit();
} else {
    // Caso as informações da sessão não estejam completas
    $msg = "<p class=\"alerta red\">Dados insuficientes para salvar </p>" ;
    
    $destino = "location:../PAGES/adicaoDivida.php";
    $_SESSION['msg'] = $msg;

     header($destino);
    exit();
}

}else{
    $msg = "<p class=\"alerta red\">Dividas já cadastradas, altere ou delete!</p>" ;
    
    $destino = "location:../PAGES/adicaoDivida.php";
    $_SESSION['msg'] = $msg;

     header($destino);
}
header($destino);


?>
