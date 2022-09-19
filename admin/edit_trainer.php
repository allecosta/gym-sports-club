<?php

include '../includes/connection.php';

if (isset($_GET['edit_trainer'])) {
    $editTrainerID = $_GET['edit_trainer'];
    $selectTrainer = "SELECT * FROM trainer WHERE id='$editTrainerID'";
    $runTrainer = mysqli_query($conn, $selectTrainer);
    $rowTrainer = mysqli_fetch_array($runTrainer);
    $tranUpID = $rowTrainer['id'];
    $tranName = $rowTrainer['name'];
    $tranClass = $rowTrainer['class'];
    $tranContact = $rowTrainer['contact'];
}

?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Atualizar Trainers</title>
</head>

<body bgcolor="#999">
    <form action="" method="POST" enctype="multipart/form-data">
        <table width="794px" align="center" border="1" bgcolor="#f1533e">
            <tr>
                <td colspan="2" align="center">
                    <h1>Editar Trainer</h1>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Nome do Trainer</strong></td>
                <td><input type="text" name="name" value="<?php echo $tranName; ?>"></td>
            </tr>
            <tr>
                <td align="right"><strong>Classe</strong></td>
                <td>
                    <select name="class">
                        <option><?php echo $tranClass; ?></option>
                        <?php

                        $getExer = "SELECT * FROM exercises";
                        $runExer = mysqli_query($conn, $getExer);

                        while ($rowExer = mysqli_fetch_array($runExer)) {
                            $exerID = $rowExer['id'];
                            $exerName = $rowExer['name'];

                            echo "<option value='$exerName'>$exerName</option>";
                        }

                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Contato do Trainer</strong></td>
                <td><input type="text" name="contact" value="<?php echo $tranContact; ?>"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="trainer" value="Atualizar Trainer"></td>
            </tr>
        </table>
    </form>
</body>

</html>

<?php

if (isset($_POST['trainer'])) {
    $tranName = $_POST['name'];
    $tranClass = $_POST['class'];
    $tranContact = $_POST['contact'];

    if ($tranName == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($tranClass == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } elseif ($tranContact == "") {
        echo "<script>alert('Por favor, preencha todos os campos!')</script>";
        exit();
    } else {
        $updateTrainer = "UPDATE trainer SET name='$tranName', class='$tranClass', contact='$tranContact'
                    WHERE id='$tranUpID'";
        $runUpdate = mysqli_query($conn, $updateTrainer);

        if ($runUpdate) {
            echo "<script>alert('Dados atualizados com sucesso')</script>";
            echo "<script>window.open('Error')</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
}

?>