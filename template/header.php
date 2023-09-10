<?php

  session_start();

require_once dirname(__DIR__)."/core/connection.php";
require_once dirname(__DIR__). "/core/config.php";



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Coffee - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?= url('css/open-iconic-bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/animate.css') ?>">

    <link rel="stylesheet" href="<?= url('css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= url('css/magnific-popup.css') ?>">

    <link rel="stylesheet" href="<?= url('css/aos.css') ?>">

    <link rel="stylesheet" href="<?= url('css/ionicons.min.css') ?>">

    <link rel="stylesheet" href="<?= url('css/bootstrap-datepicker.css') ?>">
    <link rel="stylesheet" href="<?= url('css/jquery.timepicker.css') ?>">


    <link rel="stylesheet" href="<?= url('css/flaticon.css') ?>">
    <link rel="stylesheet" href="<?= url('css/icomoon.css') ?>">
    <link rel="stylesheet" href="<?= url('css/style.css') ?>">
  </head>
  <body>


<?php require_once "navbar.php"; ?>