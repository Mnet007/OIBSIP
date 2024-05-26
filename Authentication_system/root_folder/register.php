<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Authentication Page</title>
    <!-- Getting Popper and Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
</head>
<body>
    <div class="container" style="width: 25rem;">
        <?php include('msg.php'); ?>
        <form id="reg_form" action="reg_process.php" method="POST" autocomplete="off">
            <div class="mb-3">
                <label for="username" class="form-label">Full Name</label>
                <input required type="text" class="form-control" name="username" id="username" placeholder="Enter Username">
            </div>
            <div class="mb-3" autocomplete="off">
                <label for="email" class="form-label">Email address</label>
                <input required type="email" class="form-control" name="email" id="email" placeholder="Enter email">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input required type="password" class="form-control" name="password" id="password">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input required type="password" class="form-control" name="confirmPassword" id="confirmPassword">
            </div>
            <button type="submit" name="reg_btn" class="btn btn-primary">Register</button>&nbsp;
            <span><a href="login.php">Login</a></span>
        </form>
    </div>
</body>
</html>
