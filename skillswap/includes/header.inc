<?php
// Start a session to handle potential flash messages
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SkillSwap</title>
    
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Google Fonts: Libre Baskerville & Ysabeau SC -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Ysabeau+SC:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Google Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header>
        <?php include 'includes/nav.inc'; ?>
    </header>
    <main class="container my-5">