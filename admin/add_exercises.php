<?php

include '../includes/connection.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adicionar Exercícios</title>
</head>

<body bgcolor="#999">
    <form action="add_exercises.php" method="POST" enctype="multipart/form-data">
        <table width="794px" align="center" border="1" bgcolor="#f1533e">
            <tr>
                <td colspan="2" align="center">
                    <h1>Insira Exercícios</h1>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Selecione Usuário</strong></td>
                <td>
                    <select name="user">
                        <option>Selecione um usuário</option>
                        <?php

                        $getUser = "SELECT * FROM users";
                        $runUser = mysqli_query($conn, $getUser);

                        while ($rowDays = mysqli_fetch_array($runUser)) {
                            $userID = $rowDays['id'];
                            $userName = $rowDays['name'];

                            echo "<option value='$userID'>$userName</option>";
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Nome do Exercício</strong></td>
                <td><input type="text" name="exercise"></td>
            </tr>
            <tr>
                <td align="right"><strong>Número de Série</strong></td>
                <td><input type="text" name="sets"></td>
            </tr>
            <tr>
                <td align="right"><strong>Imagem do Exercício</strong></td>
                <td><input type="file" name="img"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="workout" value="Atribuir Treino"></td>
            </tr>
        </table>
    </form>

</body>

</html>

<?php

if (isset($_POST['workout'])) {
    $userName = $_POST['user'];
    $exerName = $_POST['exercise'];
    $dayName = $_POST['day'];
    $sets = $_POST['sets'];

    $exerIMG = $_FILES['img']['name'];
    $tempName = $_FILES['img']['tmp_name'];

    if ($userName == "") {
        echo "<script>alert('Por favor, preencha todos os campos')</script>";
        exit();
    } elseif ($exerName == "") {
        echo "<script>alert('Por favor, preencha todos os campos')</script>";
        exit();
    } elseif ($dayName == "") {
        echo "<script>alert('Por favor, preencha todos os campos')</script>";
        exit();
    } elseif ($sets == "") {
        echo "<script>alert('Por favor, preencha todos os campos')</script>";
        exit();
    } elseif ($exerIMG == "") {
        echo "<script>alert('Por favor, preencha todos os campos')</script>";
        exit();
    }
} else {
    move_uploaded_file($tempName, "assets/images/$exerIMG");

    $insertExer = "INSERT INTO exercises (name, sets, img, day_id, user_id) 
        VALUES ('$exerName', '$sets', '$exerIMG', '$dayName', '$userName')";

    $runExer = mysqli_query($conn, $insertExer);

    if ($runExer) {
        echo "<script>alert('Exercício inserido')</script>";
        echo "<script>alert('index.php?add_exercises','_self')</script>";
    } else {
        echo "<script>alert('Error')</script>";
    }
}

?>