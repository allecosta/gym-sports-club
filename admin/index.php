<?php

session_start();

if ($_SESSION['email'] == true) {
} else {
    header('location: login.php');
}

include '../includes/connection.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css" media="all">
    <title>Home - Administrador</title>
</head>

<body>
    <main>
        <div class="wrapper">
            <header>
                <div class="header">
                    <a href="index.php"><img src="assets/images/header.png" alt=""></a>
                </div>
            </header>

            <section>
                <div class="content_wrapper">
                    <div class="right" style="background-image: url(assets/images/right.jpg)">
                        <a href="index.php?view_users">Usuários</a>
                        <a href="index.php?view_trainers">Trainers</a>
                        <a href="index.php?add_trainers">Adicionar Trainers</a>
                        <a href="index.php?view_exercises">Exercícios</a>
                        <a href="index.php?add_exercises">Adicionar Exercícios</a>
                        <a href="logout.php">Sair</a>
                    </div>
                    <div class="left" style="background-image: url(assets/images/bg1.jpg);">
                        <div id="products_box">
                            <?php

                            if (isset($_GET['view_users'])) {
                                include('view_users.php');
                            }

                            if (isset($_GET['view_trainers'])) {
                                include('view_trainers.php');
                            }

                            if (isset($_GET['add_trainers'])) {
                                include('add_trainers.php');
                            }

                            if (isset($_GET['view_exercises'])) {
                                include('view_exercises.php');
                            }

                            if (isset($_GET['add_exercises'])) {
                                include('add_exercises.php');
                            }

                            if (isset($_GET['edit_trainer'])) {
                                include("edit_trainer.php");
                            }

                            if (isset($_GET['edit_exercise'])) {
                                include('edit_exercise.php');
                            }

                            if (isset($_GET['delete_exercise'])) {
                                include('delete_exerccise.php');
                            }

                            if (isset($_GET['delete_trainer'])) {
                                include('delete_trainer.php');
                            }

                            if (isset($_GET['delete_user'])) {
                                include('delete_user.php');
                            }

                            ?>
                        </div>
                    </div>
                </div>
            </section>

            <!-- <footer>
                <div class="footer">
                    <h5>
                        &copy; 2022 Developed By <a href="http://allecosta.github.io/webpage/">Alexandre Costa</a>
                    </h5>
                </div>
            </footer> -->
        </div>
    </main>
</body>

</html>