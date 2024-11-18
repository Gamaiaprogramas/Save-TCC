<?php
 @session_start();
 if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
<link rel="stylesheet" href="../STYLE/educacao.css">
<?php

    include("../partials/headeralternative.php");
?>

  <div class="container">
    <div class="video"></div>
    <div class="descricao"></div>
  </div>






<?php 

  include("../partials/footer.php");

?>