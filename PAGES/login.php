<body>
        <?php
    @session_start();
    if (isset($_SESSION['msg'])) {
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }
    ?>
<div class="containerForm">
 
        <div class="log">
        <form action="../ACTS/login.act.php" method="post" enctype="multipart/form-data" id="formAddCliente" onsubmit="return verificaForm()">
        <h1>login</h1>
        <label><p>Email:</p><input type="text" name="email"></label>
        <label><p>Senha:</p><input type="passworld" name="senha1" onkeyup="verificaSenha(senha1.value,senha2.value)" require></label>
        <label><input type="submit" value="Logar" id = "lug"></label>
        </form>
         </div>

</div>

</body>



<?php include('../partials/footer.php'); ?>