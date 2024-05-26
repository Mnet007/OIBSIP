<?php
session_start();
include('database/set_database.php');

// For User register 
if (isset($_POST["reg_btn"])) {
    $name = mysqli_real_escape_string($conn, $_POST["username"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST["confirmPassword"]);

    if ($password == $confirmPassword) {
        // Check if user account has already been registered
        $registeredAcct = "SELECT email FROM user WHERE email='$email'";
        $cregisteredAcct = mysqli_query($conn, $registeredAcct);

        if (mysqli_num_rows($cregisteredAcct) > 0) {
            // User email has already been used
            $_SESSION['message'] = "This Email has already been registered";
            header("location: register.php");
            exit();
        } else {
            // Hash the password before saving to the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $date = date("Y-m-d H:i:s");
            $reg_query = "INSERT INTO user (username, email, password, last_login) VALUES ('$name', '$email', '$hashedPassword', '$date')";
            $creg_query = mysqli_query($conn, $reg_query);

            // If the query runs successfully
            if ($creg_query) {
                $_SESSION['message'] = "Registered successfully, proceed to login";
                header("location: login.php");
                exit();
            } else {
                $_SESSION['message'] = "Something went wrong";
                header("location: register.php");
                exit();
            }
        }
    } else {
        $_SESSION['message'] = "PASSWORD NOT MATCHED: please check that you entered a correct password";
        header("location: register.php");
        exit();
    }
}
?>
