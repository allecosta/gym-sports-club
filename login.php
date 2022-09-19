<?php

session_start();

include 'includes/connection.php';
include 'functions/functions.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="main_wrapper">
            <header>
                <div class="header_wapper">
                    <img src="assets/images/logo.png" width="1000px" alt="">
                </div>
                <nav>
                    <div id="navbar">
                        <ul id="menu">
                            <li><a href="index.php">Início</a></li>
                            <li><a href="signup.php">Inscreva-se</a></li>
                            <li><a href="index.php">Contate-Nos</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <section>
                <div class="content_wrapper">
                    <div id="left_sidebar">
                        <div id="sidebar_title">Dias</div>
                        <ul id="days">
                            <?php

                            getDays();

                            ?>
                        </ul>

                        <div id="sidebar_title">Exercícios</div>
                        <ul id="days">
                            <?php

                            getExercise();

                            ?>
                        </ul>
                    </div>
                    <div id="right_content">
                        <div id="headline">
                            <div id="headline_content">
                                <h1 style="color: #FFFF00; text-align: center;">
                                    <center>NO pain No gain</center>
                                </h1>
                            </div>
                        </div>
                        <div id="products_box" style="background-image: url(assets/images/bg1.jpg);">
                            <div id="frm">
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
                        </div>
                    </div>
                </div>
            </section>

            <footer>
                <div class="footer">
                    <h5>
                        &copy; 2022 Developed By <a href="http://allecosta.github.io/webpage/">Alexandre Costa</a>
                    </h5>
                </div>
            </footer>
        </div>
    </main>

</body>

</html>

<?php

if (isset($_POST['login'])) {
    $userEmail = $_POST['email'];
    $userPass = $_POST['pass'];

    $selectUser = "SELECT * FROM users WHERE email='$userEmail' AND pass='$userPass'";
    $runUser = mysqli_query($conn, $selectUser);
    $rowCount = mysqli_num_rows($runUser);

    if ($rowCount == 1) {
        $_SESSION['email'] = $userEmail;
        header('location: index.php');
    } else {
        echo "<script>alert('OPS! Email ou senha inválido')</script>";
    }
}

?>