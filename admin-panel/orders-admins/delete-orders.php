<?php require_once "../layouts/header.php"; ?>

<?php 


if(!isset($_SESSION['admin_name'])){
    header('location:'.url('admin-panel/admins/login-admins.php'));
  }

    if(isset($_GET['id'])){
        try{
            $id = $_GET['id'];

        

            $delete = $conn -> query("DELETE FROM orders WHERE id='$id'");
            $delete->execute();
    
            header("location:".url('admin-panel/orders-admins/show-orders.php'));
    
        }catch(PDOException $e){
            print_r($e);
        }
        
    }

?>


