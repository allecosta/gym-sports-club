<?php

include '../includes/connection.php';

if (isset($_GET['edit_exercise'])) {
    $editExerID = $_GET['edit_exercise'];
    $selectExer = "SELECT * FROM exercises WHERE id='$editExerID'";
    $runExer = mysqli_query($conn, $selectExer);
    $rowExer = mysqli_fetch_array($runExer);
    $exerUpID = $rowExer['id'];
    $exerName = $rowExer['name'];
    $sets = $rowExer['sets'];
    $dayID = $rowExer['day_id'];
    $userID = $rowExer['user_id'];
}

$selectDay = "SELECT * FROM days WHERE id='$dayID'";
$runDay = mysqli_query($conn, $selectDay);
$rowDay = mysqli_fetch_array($runDay);
$dayEditName = $rowDay['name'];

$selectUser = "SELECT * FROM users WHERE id='$userID'";
$runUser = mysqli_query($conn, $selectUser);
$rowUsers = mysqli_fetch_array($runUser);
$userEditName = $rowUsers['name'];

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Editar Exercícios</title>
</head>

<body bgcolor="#999">
    <form action="" method="POST" enctype="multipart/form-data">
        <table width="794px" align="center" border="1" bgcolor="f1533e">
            <tr>
                <td colspan="2" align="center">
                    <h1>Editar Exercícios</h1>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Nome de usúario</strong></td>
                <td>
                    <select name="user">
                        <option value="<?php echo $userID; ?>"><?php echo $userEditName; ?></option>
                        <?php

                        $getUser = "SELECT * FROM users";
                        $runUser = mysqli_query($conn, $getUser);

                        while ($rowDays = mysqli_fetch_array($runUser)) {
                            $userID = $rowDays['userID'];
                            $userName = $rowDays['name'];

                            echo "<option value='$userID'>$userName</option>";
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Dia</strong></td>
                <td>
                    <select name="day">
                        <option value="<?php echo $dayID ?>"><?php $dayEditName; ?></option>
                        <?php

                        $getDay = "SELECT * FROM days";
                        $runDay = mysqli_query($conn, $getDay);

                        while ($rowDays = mysqli_fetch_array($runDay)) {
                            $dayID = $rowDays['id'];
                            $dayName = $rowDays['name'];

                            echo "<option value='$dayID'>$dayName<option>";
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Nome do Exercício</strong></td>
                <td><input type="text" name="exercise" value="<?php echo $exerName; ?>"></td>
            </tr>
            <tr>
                <td align="right"><strong>Número de Séries</strong></td>
                <td><input type="text" name="sets" value="<?php echo $sets; ?>"></td>
            </tr>
            <tr>
                <td align="right"><strong>Imagem do Exercício</strong></td>
                <td><input type="file" name="exer_img"><br>
                    <img src="assets/images/<?php echo $exerIMG; ?>" width="60" height="44">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="workout" value="Treino"></td>
            </tr>
        </table>
    </form>

</body>

</html>

<?php

if (isset($_POST['workout'])) {
    $userID = $_POST['user'];
    $exerName = $_POST['exercise'];
    $dayID = $_POST['day'];
    $sets = $_POST['sets'];

    $exerciseIMG = $_FILES['exer_img']['tmp_name'];
    $tempName = $_FILES['exer_img']['tmp_name'];

    if ($userName == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($exerName == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($dayName == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($sets == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($exerciseIMG == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } else {
        move_uploaded_file($tempName, "assets/images/$exerciseIMG");

        $updateExer = "UPDATE exercises SET name='$exerName', sets='$sets', img='$exerciseIMG', day_id='$dayID', user_id='$userID'
                            WHERE id='$exerUpID'";
        $runUpdate = mysqli_query($conn, $updateExer);

        if ($runUpdate) {
            echo "<script>alert('Exercício atualizado!')</script>";
            echo "<script>window.open('index.php?view_exercises','_self')</script>";
        } else {
            echo "<script>Error</script>";
        }
    }
}

?>