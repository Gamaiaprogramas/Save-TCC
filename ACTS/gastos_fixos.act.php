<?php
session_start();
require('../ACTS/connect.php');

if (isset($_SESSION['Id_user'], $_SESSION['Gastos'], $_SESSION['valoresGasto'])) {
    $user_id = $_SESSION['Id_user'];
    $novos_gastos = $_SESSION['Gastos'];
    $novos_valores = $_SESSION['valoresGasto'];

    // Busca os valores atuais de gastos e concatena com os novos
    $consulta = "SELECT `Nomes_gastos`, `Valores_gastos` FROM `gastosfix` WHERE `Id_User` = ?";
    if ($stmt = mysqli_prepare($con, $consulta)) {
        mysqli_stmt_bind_param($stmt, "i", $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $gastos_atuais, $valores_atuais);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        // Concatena os dados
        $gastos_finais = $gastos_atuais ? $gastos_atuais . ',' . implode(',', $novos_gastos) : implode(',', $novos_gastos);
        $valores_finais = $valores_atuais ? $valores_atuais . ',' . implode(',', $novos_valores) : implode(',', $novos_valores);
    } else {
        echo "Erro na consulta: " . mysqli_error($con);
        exit();
    }

    // Atualiza com os valores concatenados
    $query = "UPDATE `gastosfix` SET `Nomes_gastos` = ?, `Valores_gastos` = ? WHERE `Id_User` = ?";
    if ($stmt = mysqli_prepare($con, $query)) {
        mysqli_stmt_bind_param($stmt, "ssi", $gastos_finais, $valores_finais, $user_id);
        if (mysqli_stmt_execute($stmt)) {
            $_SESSION['msg'] = "<p class='alerta green'>Gastos fixos atualizados com sucesso.</p>";
        } else {
            $_SESSION['msg'] = "<p class='alerta red'>Erro ao atualizar os gastos fixos: " . mysqli_error($con) . "</p>";
        }
        mysqli_stmt_close($stmt);
    } else {
        $_SESSION['msg'] = "<p class='alerta red'>Erro ao preparar a atualização: " . mysqli_error($con) . "</p>";
    }
} else {
    $_SESSION['msg'] = "<p class='alerta red'>Dados insuficientes para salvar.</p>";
}
header("Location: ../PAGES/dashboard.php");
exit();
?>
