<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../STYLE/perfil.css">
    <title>Document</title>
</head>
<body>
    <div class ="main-Perfil">
  
        <?php
            @session_start();
            if(isset($_SESSION['logado']) && $_SESSION['logado'] == true){
                echo "<div class = 'divImg'>";
                echo "<img src='$_SESSION[foto]' class='miniaturaPerf'>";
                echo "<button>Alterar foto</button>";
                echo "</div>";
                echo "<div class = 'divInfo'>";
                echo "<li >Olá $_SESSION[nome]</li>";
                echo "<li>Email $_SESSION[email]</li>";
                echo "<li >Cpf: $_SESSION[cpf]</li>";
                echo "<li >Telefone: $_SESSION[telefone]</li>";
                echo "<li >Nascto: $_SESSION[nascto]</li>";        
                
                $id_user = $_SESSION['Id_user']; // Captura o ID do usuário da sessão

                $query = "SELECT * FROM informacao WHERE Id_User = ?";
                $stmt = $con->prepare($query);
                $stmt->bind_param("i", $id_user); // "i" indica que estamos passando um inteiro
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    // O usuário já possui um registro
                    echo "<button disabled>Fazer uma análise financeira (já cadastrado)</button>";
                } else {
                    // O usuário não possui um registro
                    echo "<button onclick=\"location.href='path/to/financial_analysis.php'\">Fazer uma análise financeira</button>";
                }

                $stmt->close(); // Fecha a declaração
            }
        ?>
    </div>
    </div>
    
</body>
</html>