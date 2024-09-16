<?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Save</title>
    </head>
    <body>
        <div>
            <h1>Entre para SAVE!</h1>
            <fieldset>
                <form action="../ACTS/cadastro.act.php" method="post"enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()">
            
                <label><p>Nome:</p></label>
                <label><p>Email:</p></label>
                
            </form>
            </fieldset>
        </div>

    </body>
    </html>