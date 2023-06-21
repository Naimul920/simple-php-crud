<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="assets/css/bootstrap.css"/>
    <link rel="stylesheet" href="assets/css/all.css"/>
</head>
<body>
<?php if (isset($_SESSION['id'])) { ?>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow">
    <div class="container">
        <a href="action.php?page=dashboard" class="navbar-brand">LOGO</a>
        <ul class="navbar-nav">
            <li><a href="action.php?page=dashboard" class="nav-link">Add Massage</a></li>
            <li><a href="action.php?status=manage" class="nav-link">Manage Massage</a></li>
            <li><a href="action.php?page=add" class="nav-link">Add Product</a></li>
            <li><a href="action.php?page=manage" class="nav-link">Manage Product</a></li>
            <li class="dropdown">
                <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" >
                    <?php echo $_SESSION['name']; ?>
                </a>
                <ul class="dropdown-menu">
                    <a href="" class="dropdown-item">My Profile</a>
                    <a href="action.php?page=logout" class="dropdown-item">My Logout</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>