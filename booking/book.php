<?php

require_once dirname(__DIR__)."/template/header.php";

if(!isset($_SESSION['user_id'])){
    echo "<script> alert('you need to login') </script>";
}

global $conn;
// print_r($_SESSION['user_id']);
var_dump($conn);

if(isset($_POST['submit'])) {

    if(
        empty($_POST['first_name']) OR
        empty($_POST['last_name']) OR 
        empty($_POST['date']) OR 
        empty($_POST['time']) OR
        empty($_POST['phone']) OR
        empty($_POST['message']) 
        // empty($_POST['user_id'])
    ){
        echo "<script> alert('You need fill firt inputs') </script>";
    }else{

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $message = $_POST['message'];
        $phone = $_POST['phone'];
        $user_id = $_SESSION["user_id"];

        if($date > date("n/j/Y")){
            $query = $conn -> prepare("INSERT INTO bookings (
                first_name ,last_name,date , time ,phone , message, user_id
                ) VALUES (
                :first_name, :last_name , :date ,  :time , :phone , :message , :user_id
            )");

            try {
                $query->execute ([
                    ":first_name" =>$first_name,
                    ":last_name" =>$last_name,
                    ":date" =>$date,
                    ":time" =>$time,
                    ":phone" =>$phone,
                    ":message" =>$message,
                    ":user_id" =>$user_id,
                ]);
            
                echo "<script>alert('successfully')</script>";
            } catch (PDOException $e) {
                echo "Error: " . $e->getMessage(); // Display the SQL error message
            }
            


        }else{
            echo "<script> alert('You can't choose a date in the past) </script>";
        }


    }
}else{
    echo "<script> alert('You need fill inputs') </script>";

}