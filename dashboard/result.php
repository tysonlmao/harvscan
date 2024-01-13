<?php
session_start();
if (!isset($_SESSION['cuid'])) {
    header('Location: ../login.php');
    exit();
}

if ($_SESSION['cuid_role'] === "default") {
    header('Location: ../forbidden.php');
    exit();
}


?>
<?php include("../templates/header.php"); ?>
<title>| harvscan</title>
</head>

<body>
</body>