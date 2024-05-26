<?php
session_start();
include('database/set_database.php');

// For User login
if (isset($_POST["log_btn"])) {
    $email = mysqli_real_escape_string($conn, $_POST["log_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["log_password"]);
    $last_login = date("Y-m-d H:i:s");

    $log_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
    $clog_query = mysqli_query($conn, $log_query);

    // Check if the record exists in db
    if (mysqli_num_rows($clog_query) > 0) {
        $log = mysqli_fetch_assoc($clog_query);
        // Verify the hashed password
        if (password_verify($password, $log['password'])) {
            $userID = $log['id'];
            $user_name = $log['username'];
            $user_email = $log['email'];

            // Update last_login
            $last_login_query = "UPDATE user SET last_login='$last_login' WHERE id='$userID'";
            mysqli_query($conn, $last_login_query);

            $_SESSION['auth_user'] = [
                'user_id' => $userID,
                'user_name' => $user_name,
                'user_email' => $user_email,
            ];
            error_log("Redirecting to secured.html");
            header("location: secured.html");
            exit();
        } else {
            $_SESSION['message'] = "SOMETHING WENT WRONG: please check that you entered a valid email & password";
            header("location: login.php");
            exit();
        }
    } else {
        $_SESSION['message'] = "SOMETHING WENT WRONG: please check that you entered a valid email & password";
        header("location: login.php");
        exit();
    }
}
?>
