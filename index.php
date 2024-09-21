<?php

session_start();
include_once "conn/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        session_start();
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    } else 
    {    
        $error = "Invalid username or password.";
    }

    $conn->close();
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 card shadow p-4">
            <h2 class="text-center border-bottom pb-2">Login</h2>
            <form method="post" action="">
                <?php if(isset($error)) {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error;?>
                    </div>
                <?php }?>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
                <a href="register.php" class="btn btn-link float-right">Register</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>