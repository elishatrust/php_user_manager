<?php

include_once "conn/db.php";

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $first_name = trim($_POST['first_name']);
    $last_name = trim($_POST['last_name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $username = trim($_POST['username']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);

    $error = "";

    // if (empty($first_name) || empty($last_name) || empty($email) || empty($phone) || empty($username) || empty($password)){
    //     $error = "All fields are required.";
    // }

    // if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //     $error = "Invalid email format";
    // }

    // if (strlen($phone) != 10) {
    //     $error = "Invalid phone number format";
    // }

    // if (!preg_match("/^[a-zA-Z ]*$/", $first_name) ||!preg_match("/^[a-zA-Z ]*$/", $last_name)) {
    //     $error = "Only letters and white space allowed in first name and last name";
    // }

    // $stmt = $conn->prepare("SELECT * FROM users WHERE username LIKE '%'.$username.'%' AND email LIKE '%'.$email.'%' ");
    // $stmt->execute();
    // $result = $stmt->get_result();

    // if ($result->num_rows > 0) {
    //     $error = "Username or email already exists";
    // }
    // $stmt->close();

    $sql = "INSERT INTO users (first_name, last_name, email, phone, username, password) VALUES ('$first_name', '$last_name', '$email', '$phone', '$username', '$password')";

    if ($conn->query($sql) === TRUE) 
    {
        $success = "User created successfully";
    } else 
    {
        $error = "Error: ". $sql. "<br>". $conn->error;
    }

    $conn->close();
}
?>








<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>
<body>
<div class="container py-5">
    <div class="row">
        <div class="col-md-6 offset-md-3 card shadow p-4">
            <h2 class="text-center border-bottom">Register</h2>
            <form method="post" action="">
                <?php if(isset($success)) {?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $success;?> , <a href="index.php">Login Now</a>
                    </div>
                <?php } elseif(isset($error)) {?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error;?>
                    </div>
                <?php }?>
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" class="form-control" name="first_name" required>
                </div>
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" class="form-control" name="last_name" required>
                </div>
                <div class="form-group">
                    <label>Username:</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password:</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="form-group">
                    <label>Phone:</label>
                    <input type="text" class="form-control" name="phone" required>
                </div>
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" class="form-control" name="address" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="index.php" class="btn btn-link float-right">Login</a>
            </form>
        </div>
    </div>
    </div>
</div>
</body>
</html>