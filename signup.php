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
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Inscreva-se</title>
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
                            <li><a href="login.php">Login</a></li>
                            <li><a href="index.php">Contate-nos</a></li>
                        </ul>
                    </div>
                </nav>
            </header>

            <section>
                <div class="content_wrapper">
                    <div id="left_sidebar">
                        <div id="sidebar_title">Days</div>
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
                                <h1 style="color: #1767d5; text-align: center;">
                                    <center>No pain No gain</center>
                                </h1>
                            </div>
                        </div>
                        <div id="products_box" style="background-image: url(assets/images/bg1.jpg);">
                            <div id="frm">
                                <h2 style="color: darkgrey; text-align: center;">Inscreva-se gratuitamente</h2>
                                <form action="signup.php" method="POST" autocomplete="off">
                                    <input type="text" id="name" name="name" placeholder="Nome">
                                    <input type="email" id="email" name="email" placeholder="Email">
                                    <input type="password" id="password" name="pass" placeholder="Senha">
                                    <input type="text" id="weight" name="weight" placeholder="Peso">
                                    <input type="text" id="age" name="age" placeholder="Idade">
                                    <input type="text" id="contact" name="contact" placeholder="Número de contato">
                                    <input type="submit" name="signup" value="Enviar">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <footer class="footer">
                <h5 class="color: #000; padding-top: 30px; text-align: center; font-family: Verdana, Geneva, sans-serif;">
                    &copy; 2022 Developed By <a href="http://allecosta.github.io/webpage/">Alexandre Costa</a>
                </h5>
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
    $runUSer = mysqli_query($conn, $selectUser);
    $rowCount = mysqli_num_rows($runUSer);

    if ($rowCount == 1) {
        $_SESSION['email'] = $userEmail;
        header('location: index.php');
    } else {
        echo "<script>alert('OPS! Email ou password inválido')</script>";
    }
}

if (isset($_POST['signup'])) {
    $userName = $_POST['name'];
    $userEmail = $_POST['email'];
    $userPass = $_POST['pass'];
    $userWeight = $_POST['weight'];
    $userAge = $_POST['age'];
    $userContact = $_POST['contact'];

    if ($userName == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } elseif ($userEmail == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } elseif ($userPass == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } elseif ($userWeight == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } elseif ($userAge == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } elseif ($userContact == "") {
        echo "<script>alert('Por favor, preencha este campo!')</script>";
    } else {
        $insertUser = "INSERT INTO users (name, email, pass, weight, age, contact) 
            VALUES ('$userName', '$userEmail', '$userPass', '$userWeight', '$userAge', '$userContact')";

        $runUSer = mysqli_query($conn, $insertUser);

        if ($runUSer) {
            echo "<script>alert('Registrado com sucesso')</script>";
        }
    }
}

?>