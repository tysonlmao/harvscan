<?php
if (!isset($_POST['login-submit'])) :
    exit('File cannot be directly be accessed.');
endif;

require "./connection.inc.php";

// Define POST data variables
$identifier = $_POST['username'];
$password = $_POST['password'];

// Start validation
if (empty($identifier) || empty($password)) :
    header("Location: ../login.php?error=emptyFields");
else :
    // Validation passed, continue with authentication

    // Check if the input matches either email or username
    $sql = "SELECT id, email, password, username, user_join, role FROM users WHERE email = :identifier OR username = :identifier";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':identifier', $identifier, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) :
        if (password_verify($password, $user['password'])) :
            session_start();
            $_SESSION['cuid'] = $user['id'];
            $_SESSION['cuid_email'] = $user['email'];
            $_SESSION['cuid_username'] = $user['username'];
            $_SESSION['cuid_join_date'] = $user['user_join']; // Store the join date in the session
            $_SESSION['cuid_role'] = $user['role'];
            header("Location: ../dashboard/index.php");
            exit();
        else :
            header("Location: ../login.php?error=invalidPassword");
            exit();
        endif;
    else :
        header("Location: ../login.php?error=invalidPassword");
        exit();
    endif;
endif;
