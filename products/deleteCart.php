<?php require_once "../template/header.php"; ?>
<?php

 $deleteAll = $conn->query("DELETE  FROM cart WHERE user_id='$_SESSION[user_id]'");
 $deleteAll->execute();

 header("location:".url('products/cart.php'));
