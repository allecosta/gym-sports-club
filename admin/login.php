<?php

session_start();

include '../includes/connection.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="assets/css/login.css">
    <title>Admin Login</title>
</head>

<body>
    <!-- <h1>Login - Administrador</h1> -->

    <div>
        <form action="login.php" method="POST" autocomplete="off">
            <label>
                Email
                <input type="email" name="email">
            </label>
            <label>
                Senha
                <input type="password" name="pass">
            </label>

            <input type="submit" name="login" value="Entrar">
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['login'])) {
    // $adminLogin = $_POST['login'];
    $adminEmail = $_POST['email'];
    $adminPass = $_POST['pass'];
    $selectAdmin = "SELECT * FROM admin WHERE email='$adminEmail' AND pass='$adminPass'";
    $runAdmin = mysqli_query($conn, $selectAdmin);
    $rowCount = mysqli_num_rows($runAdmin);

    if ($rowCount == 1) {
        $_SESSION['email'] = $adminEmail;
        header('location: index.php');
    } else {
        echo "<script>alert('OPS! Email ou senha inválidos')</script>";
    }
}

?>