<?php require_once "../template/header.php"; ?>

<?php 


    if(!isset($_SESSION['user_id'])){
        $_SESSION['status'] = [
            'message' => 'you need to login',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
    }

    if(isset($_GET['id'])){
        try{
            $id = $_GET['id'];

        

            $delete = $conn -> query("DELETE FROM cart WHERE id='$id'");
            $delete->execute();
    
            header("location:".url( "products/cart.php"));
    
        }catch(PDOException $e){
            print_r($e);
        }
        
    }

?>


