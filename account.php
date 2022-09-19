<?php

session_start();

if ($_SESSION['email'] == true) {
} else {
    header('location: login.php');
}

include 'includes/connection.php';
include 'functions/functions.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css" media="all">
    <title>Minha Conta</title>
</head>

<body>
    <main>
        <div class="main_wrapper">
            <header>
                <div class="header_wrapper">
                    <img src="assets/images/logo.png" width="1000px" alt="">
                </div>
                <nav>
                    <div id="navbar">
                        <ul id="menu">
                            <li><a href="index.php">Início</a></li>
                            <li><a href="account.php">Minha Conta</a></li>
                            <li><a href="index.php">Contate-Nos</a></li>
                        </ul>

                        <div id="login-btn-signup">
                            <li><a href="logout.php">Sair</a></li>
                        </div>
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
                        <div id="sidebar_title">Exercicios</div>
                        <ul id="days">
                            <?php

                            getExercise();

                            ?>
                        </ul>
                    </div>
                    <div id="right_content">
                        <div id="headline">
                            <div id="headline_content">
                                <h1 style="color: yellow; text-align: center;">
                                    <center>No pain No gain</center>
                                </h1>
                            </div>
                        </div>

                        <div id="products_box" style="background-image: url(assets/images/bg3.jpg);">
                            <?php

                            $email = $_SESSION['email'];
                            $selectUser = "SELECT * FROM users WHERE email='$email'";
                            $runUser = mysqli_query($conn, $selectUser);
                            $count = mysqli_num_rows($runUser);

                            while ($rowUser = mysqli_fetch_array($runUser)) {
                                $userID = $rowUser['id'];
                                $userName = $rowUser['name'];
                                $userEmail = $rowUser['email'];
                                $userWeight = $rowUser['weight'];
                                $userAge = $rowUser['age'];
                                $userContact = $rowUser['contact'];

                                echo "
                                    <div id='single_product'>
                                        <table align='center'>
                                            <tr>
                                                <th>Nome: </th>
                                                <td>$userName</td>
                                            </tr>
                                            <tr>
                                                <th>Email: </th>
                                                <td>$userEmail</td>
                                            </tr>
                                            <tr>
                                                <th>Peso: </th>
                                                <td>$userWeight KG</td>
                                            </tr>
                                            <tr>
                                                <th>Contato: </th>
                                                <td>$userContact</td>
                                            </tr>
                                        </table>
                                    </div>
                                ";
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <h5>
                    &copy; 2022 Developed By <a href="http://allecosta.github.io/webpage/">Alexandre Costa</a>
                </h5>
            </footer>
        </div>
    </main>

</body>

</html>