<?php
// Langkah 1: Dapatkan URL Saat Ini
$current_page = basename($_SERVER['REQUEST_URI'], ".php");
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> <?= $data['judul'] ?> - App Invoice Sales</title>
    
    <link href="https://superapp.lpp.co.id/template/be/assets/img/apple-touch-icon.png" rel="icon">
    <link href="https://superapp.lpp.co.id/template/be/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  
    <link href="<?= BASEURL ?>/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/quill/quill.snow.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= BASEURL ?>/assets/vendor/simple-datatables/style.css" rel="stylesheet">
  
    <link href="<?= BASEURL ?>/assets/css/style.css" rel="stylesheet">
  </head>
  