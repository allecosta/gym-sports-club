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
    <title>My Hero Academia</title>
    <link rel="stylesheet" href="assets/css/style.css" media="all">
</head>

<body>
    <main>
        <div class="main_wrapper">
            <header>
                <div class="header_wrapper">
                    <a href="index.php"><img src="assets/images/logo.png" width="1000px" alt=""></a>
                </div>
                <nav>
                    <div id="navbar">
                        <ul id="menu">
                            <li><a href="index.php">Início</a></li>
                            <li><a href="account.php">Minha conta</a></li>
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
                                <h1 style="color: yellow; text-align: center;">
                                    <center>No pain NO gain</center>
                                </h1>
                            </div>
                        </div>
                        <div id="products_box" style="background-image: url(assets/images/bg2.jpg);">
                            <?php

                            getAllExercises();
                            getDayExercises();
                            getExerExercises();

                            ?>
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