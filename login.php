<?php
session_start();
if (isset($_SESSION['cuid'])) :
    header("Location: ../dashboard/index.php");
    exit();
endif;
?>

<?php include("./templates/header.php"); ?>
<title>login | harvscan</title>
</head>

<body>
    <div class="d-flex align-items-center justify-content-center h-100">
        <div class="login-form animate__animated animate__fadeIn">
            <form action="./inc/login.inc.php" class="login-form" method="POST">
                <h3 class="inline-form-title">login to harvscan</h3>
                <label for="username">Username</label><br>
                <input type="text" id="username" name="username" placeholder="Enter username"><br>
                <label for="password">Password</label><br>
                <input type="password" id="password" name="password" placeholder="Enter password"><br>
                <input type="submit" name="login-submit" class="b-button" value="Login">
            </form>
        </div>
    </div>
</body>