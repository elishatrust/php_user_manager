<?php

session_start();

if(!isset($_SESSION['username']))
{
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="lib/bootstrap.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 card shadow p-4">
            <div class="welcome border-bottom pb-2">
                <h4 class="pb-2">Welcome,</h4>
                <a href="#" class="text-secondary text-uppercase h5"><?php echo $_SESSION['username']; ?>!</a>
                <a href="logout.php" class="btn btn-link text-danger float-right">Logout</a>
            </div>
        </div>
    </div>
</div>
</body>
</html>