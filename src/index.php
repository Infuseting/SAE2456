<?php
include 'config.php';
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>RAPIDC3 - Faster cooker</title>
    <link rel="stylesheet" href="/assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


</head>
<body>
<div class="min-h-full overflow-x-hidden overflow-hidden" >
    <?php include 'router.php' ?>
</div>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>
</body>
</html>