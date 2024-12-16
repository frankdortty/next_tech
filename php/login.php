<?php
session_start();
include "db_connect.php";


if (isset($_POST['UserName']) && isset($_POST['Password'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }


    $UserName = validate($_POST['UserName']);
    $Password = validate($_POST['Password']);


    if (empty($UserName)) {
        header("Location: index.php?error= User Name cannot be empty");
        exit();
    } elseif (empty($Password)) {
        header("Location: index.php?error= Password cannot be empty");
        exit();
    }

    // Continue with your SQL query and authentication logic
    $sql = "SELECT * FROM users WHERE user_name='$UserName' AND password='$Password'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row['user_name'] === $UserName && $row['password'] === $Password) {
            echo "Logged In!";
            $_SESSION['user_name'] = $row['user_name'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
            header("Location: home.php");
            exit();
        } else {
            header("Location:index.php?error=UserName Or Password Does not exist");
            exit();
        }
    } else {
        header("Location: index.php");
        exit();
    }
} else {
    // Handle case where UserName or Password is not set
    header("Location: index.php?error= User Name or Password not set");
    exit();
}
?>
