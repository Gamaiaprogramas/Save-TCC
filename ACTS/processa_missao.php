<?php
session_start();
require('../ACTS/connect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $missao_id = $_POST['missao_id'];
    $id_usuario = $_SESSION['Id_user'];

    // Verifica se a missão já foi completada
    $query_verifica_missao = "SELECT completada FROM missoes_usuarios WHERE id_missao = ? AND id_usuario = ?";
    $stmt_verifica_missao = $con->prepare($query_verifica_missao);
    $stmt_verifica_missao->bind_param("ii", $missao_id, $id_usuario);
    $stmt_verifica_missao->execute();
    $result_verifica_missao = $stmt_verifica_missao->get_result();

    if ($result_verifica_missao->num_rows > 0) {
        $missao = $result_verifica_missao->fetch_assoc();

        // Se a missão já foi completada, não faz nada
        if ($missao['completada'] == 1) {
            echo "Você já completou esta missão!";
        } else {
            // Marca a missão como completada
            $query = "UPDATE missoes_usuarios SET completada = 1 WHERE id_missao = ? AND id_usuario = ?";
            $stmt = $con->prepare($query);
            $stmt->bind_param("ii", $missao_id, $id_usuario);
            $stmt->execute();

            // Verifica se a missão foi completada e desbloqueia a recompensa
            $query_recompensa = "SELECT id_recompensa FROM missoes WHERE id_missao = ?";
            $stmt_recompensa = $con->prepare($query_recompensa);
            $stmt_recompensa->bind_param("i", $missao_id);
            $stmt_recompensa->execute();
            $result_recompensa = $stmt_recompensa->get_result();

            if ($result_recompensa->num_rows > 0) {
                $recompensa = $result_recompensa->fetch_assoc();
                $recompensa_id = $recompensa['id_recompensa'];

                // Adiciona a recompensa ao usuário
                $query_add_recompensa = "INSERT INTO recompensas_usuarios (id_usuario, id_recompensa, data_desbloqueio) VALUES (?, ?, NOW())";
                $stmt_add_recompensa = $con->prepare($query_add_recompensa);
                $stmt_add_recompensa->bind_param("ii", $id_usuario, $recompensa_id);
                $stmt_add_recompensa->execute();

                echo "Missão completada com sucesso! Recompensa desbloqueada.";
            } else {
                echo "Nenhuma recompensa associada a esta missão.";
            }
        }
    } else {
        echo "Missão não encontrada.";
    }

    // Redireciona após processar
    header('Location: mini_game.php');
    exit();
}
?>
