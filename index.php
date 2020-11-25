<?php
session_start();

// require 'database.php';
if (isset($_SESSION['user_id'])) {
    // $records = $conn->prepare('SELECT id, email, password FROM users WHERE id= :id');
    // $records->bindParam(':id', $_SESSION['user_id']);
    // $records->execute();
    // $results = $records->fetch(PDO::FETCH_ASSOC);

    // $user = null;
    // if (count($results) > 0) {
    $username = $_SESSION['user_name'];
    // }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <meta charset="UTF-8"> -->
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
    <!-- <title>Welcome to your app</title> -->
    <?php include 'header.php'; ?>
</head>

<body>
    <?php
    // require 'partials/header.php' 
    ?>

    <?php if (!empty($username)) : ?>
        <div class="container">
            <div class="col align-self-center">
                <p></p>
                <h2 class="titulo col-lg-6 offset-md-3 p-0">
                    <strong>BIENVENIDX</strong><br />
                    <strong><?= $username  ?></strong>
                </h2>
                <!-- <p></p> -->
                <!-- <br>Welcome . -->
                <!-- <br>You're successfully logged -->
                <!-- <a href="logout.php">Logout</a> -->
                <a href="logout.php" class="btn btn-danger boton align-self-center col-lg-2 offset-md-5" role="button">Logout</a>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="col align-self-center">
                <p></p>
                <h2 class="titulo col-lg-6 offset-md-3 p-0">
                    <strong>REGÍSTRESE</strong><br />
                </h2>
                <a href="form.php" class="btn btn-danger boton align-self-center col-lg-2 offset-md-5" role="button">Registrar</a>

            <?php endif; ?>
            <?php include 'scripts.php'; ?>
            </div>
        </div>
</body>

</html>