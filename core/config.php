<?php


const HOST = "localhost";

const DBNAME = "coffee_shop";

const USER = "lwinmin";

const PASS = "Asdffdsa-4580";

try{
    //db connection
   $conn = new PDO("mysql:host=" .HOST . ";dbname=" . DBNAME , USER ,PASS);

    //error handing
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOException $e){
 echo  $e->getMessage();
}
