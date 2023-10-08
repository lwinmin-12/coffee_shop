<?php require_once "../layouts/header.php"; ?>
<?php
if(!isset($_SESSION['admin_name'])){
    header("location:".url('admin-panel/index.php'));
  }
  
  if(isset($_GET['id'])){
    $id = $_GET['id'];

    //delete image
    $select = $conn->query("SELECT * FROM products WHERE id='$id'");

    $select->execute();

    $image =$select->fetch(PDO::FETCH_OBJ);

    unlink('../../images/'.$image->image."");



    $delete = $conn -> query("DELETE FROM products WHERE id='$id'");
    $delete->execute();

    header("location:".url('admin-panel/products-admins/show-products.php'));

    
}
