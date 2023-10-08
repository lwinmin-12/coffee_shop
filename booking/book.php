<?php
session_start();

require_once dirname(__DIR__)."/template/header.php";

if(!isset($_SESSION['user_id'])){
    $_SESSION['status'] = [
        'message' => 'you need to login',
        'color' => 'danger'
    ];
        header("location:" .url("index.php"));
}

// global $conn;


if(isset($_POST['submit'])) {

    if(
        empty($_POST['first_name']) OR
        empty($_POST['last_name']) OR 
        empty($_POST['date']) OR 
        empty($_POST['time']) OR
        empty($_POST['phone']) OR
        empty($_POST['message']) 
    ){
        echo "<script> alert('You need fill inputs') </script>";
      
        
    }else{

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $message = $_POST['message'];
        $phone = $_POST['phone'];
        $user_id = $_SESSION["user_id"];

        if(strtotime($date) > strtotime(date("n/j/Y"))){
            $query = $conn -> prepare("INSERT INTO bookings (
                first_name ,last_name,date , time ,phone , message, user_id
                ) VALUES (
                :first_name, :last_name , :date ,  :time , :phone , :message , :user_id
            )");

            $query->execute ([
                ":first_name" =>$first_name,
                ":last_name" =>$last_name,
                ":date" =>$date,
                ":time" =>$time,
                ":phone" =>$phone,
                ":message" =>$message,
                ":user_id" =>$user_id,
            ]);
        
            echo "<script> alert('bookings succcssfull') </script>";

                header("location:" .url("index.php"));
            


        }else{
            $_SESSION['status'] = [
            'message' => 'You cannot choose a date in the past',
            'color' => 'danger'
        ];
            header("location:" .url("index.php"));
        }


    }
}else{
    $_SESSION['status'] = [
        'message' => 'You need to fill inputs'
    ];
        header("location:" .url("index.php"));
}