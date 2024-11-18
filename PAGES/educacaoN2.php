<?php
 @session_start();
 if (isset($_SESSION['msg'])) {
  echo $_SESSION['msg'];
  unset($_SESSION['msg']);
}
?>
<link rel="stylesheet" href="../STYLE/educacao.css">
<style>
  header{
    height: 7vw !important;
    background-color: #10002b !important;
    position: relative !important;
  }
</style>
<?php

    include("../partials/header.php");
?>




<?php 

  include("../partials/footer.php");

?>