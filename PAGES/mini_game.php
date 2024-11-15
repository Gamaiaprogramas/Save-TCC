<?php
session_start();
require('../ACTS/connect.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['Id_user'])) {
    header('Location: login.php');
    exit();
}

// Obtém o nível do usuário e outras informações relevantes
$id_usuario = $_SESSION['Id_user'];
$query = "SELECT nivel FROM informacao WHERE Id_user = ?";
$stmt = $con->prepare($query);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
$user_info = $result->fetch_assoc();
$nivel = $user_info['nivel'];

// Carrega as missões e vídeos com base no nível
$query_missoes = "SELECT * FROM missoes WHERE nivel <= ?";
$stmt_missoes = $con->prepare($query_missoes);
$stmt_missoes->bind_param("i", $nivel);
$stmt_missoes->execute();
$result_missoes = $stmt_missoes->get_result();

// Carrega as recompensas desbloqueadas
$query_recompensas = "SELECT r.descricao AS recompensa, r.criterio, ru.data_desbloqueio 
                      FROM recompensas_usuarios ru 
                      JOIN recompensas r ON ru.id_recompensa = r.id_recompensa 
                      WHERE ru.id_usuario = ?";
$stmt_recompensas = $con->prepare($query_recompensas);
$stmt_recompensas->bind_param("i", $id_usuario);
$stmt_recompensas->execute();
$result_recompensas = $stmt_recompensas->get_result();

// Verifica se há mensagens de sucesso ou erro
$mensagem = isset($_GET['mensagem']) ? $_GET['mensagem'] : null;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Game Educativo</title>
    <link rel="stylesheet" href="style.css"> <!-- Seu arquivo de CSS -->
</head>
<body>
    <div class="container">
        <h1>Mini Game Educativo</h1>

        <!-- Exibição de mensagens -->
        <?php if ($mensagem): ?>
            <div class="mensagem">
                <p><?= htmlspecialchars($mensagem); ?></p>
            </div>
        <?php endif; ?>

        <!-- Seção de Vídeos Educativos -->
        <section class="videos">
            <h2>Vídeos Educativos</h2>
            <div class="video-list">
                <?php
                // Adicionando vídeos conforme o nível
                $query_videos = "SELECT * FROM videos WHERE nivel <= ?";
                $stmt_videos = $con->prepare($query_videos);
                $stmt_videos->bind_param("i", $nivel);
                $stmt_videos->execute();
                $result_videos = $stmt_videos->get_result();
                while ($video = $result_videos->fetch_assoc()): ?>
                    <div class="video-card">
                        <iframe src="<?= htmlspecialchars($video['url']); ?>" 
                                frameborder="0" allowfullscreen></iframe>
                        <h3><?= htmlspecialchars($video['titulo']); ?></h3>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>

        <!-- Seção de Missões -->
        <section class="missoes">
            <h2>Missões</h2>
            <ul>
                <?php while ($missao = $result_missoes->fetch_assoc()):
                    // Verifica se a missão já foi completada
                    $query_missao_completada = "SELECT progresso FROM missoes_usuarios WHERE id_missao = ? AND id_usuario = ?";
                    $stmt_missao_completada = $con->prepare($query_missao_completada);
                    $stmt_missao_completada->bind_param("ii", $missao['id_missao'], $id_usuario);
                    $stmt_missao_completada->execute();
                    $result_missao_completada = $stmt_missao_completada->get_result();
                    $missao_completada = $result_missao_completada->fetch_assoc();

                    // Verifica se a missão foi completada ou não
                    if ($missao_completada && isset($missao_completada['progresso'])):
                ?>
                    <li>
                        <strong><?= htmlspecialchars($missao['descricao']); ?></strong>:
                        <?php if ($missao_completada['progresso'] == 1): ?>
                            <span>Missão já completada!</span>
                        <?php else: ?>
                            <form action="../ACTS/processa_missao.php" method="POST">
                                <input type="hidden" name="missao_id" value="<?= $missao['id_missao']; ?>">
                                <button type="submit">Completar Missão</button>
                            </form>
                        <?php endif; ?>
                    </li>
                <?php else: ?>
                    <li><strong><?= htmlspecialchars($missao['descricao']); ?></strong>: Missão não encontrada ou não completada.</li>
                <?php endif; endwhile; ?>
            </ul>
        </section>

        <!-- Seção de Recompensas -->
        <section class="recompensas">
            <h2>Recompensas Desbloqueadas</h2>
            <div class="recompensa-list">
                <?php if ($result_recompensas->num_rows > 0): ?>
                    <?php while ($recompensa = $result_recompensas->fetch_assoc()): ?>
                        <div class="recompensa-card">
                            <h3><?= htmlspecialchars($recompensa['criterio']); ?></h3>
                            <p><?= htmlspecialchars($recompensa['recompensa']); ?></p>
                            <p><em>Desbloqueado em: <?= htmlspecialchars($recompensa['data_desbloqueio']); ?></em></p>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>Nenhuma recompensa desbloqueada ainda. Complete missões para desbloqueá-las!</p>
                <?php endif; ?>
            </div>
        </section>
    </div>
</body>
</html>
