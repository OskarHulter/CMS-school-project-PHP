<?php ob_start(); ?>
<?php include "../includes/db.php" ?>
<?php include "functions.php" ?>
<?php session_start(); ?>
<?php if(!isset($_SESSION['username'])) {
    header("Location: ../index.php");
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sista uppgiften i Webbutveckling 2.">
    <meta name="author" content="Oskar Hulter">

    <title>Oskhul-5 Admin Section</title>

    <link href="css/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cutive|Raleway" rel="stylesheet">
</head>

<body>