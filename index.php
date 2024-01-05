<?php
session_start();
if (!isset($_SESSION['userId'])) :
    header("Location: login.php");
    die();
endif;
?>

<?php include("./templates/header.php"); ?>
<title>home</title>
</head>

<body>
    <p class="fs-2">harvscan</p>
</body>