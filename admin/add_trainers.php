<?php

include '../includes/connection.php';

?>

<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Adicionar Trainers</title>
</head>

<body bgcolor="#999">
    <form action="add_trainers.php" method="POST" enctype="multipart/form-data">
        <table width="794px" align="center" border="1" bgcolor="#f1533e">
            <tr>
                <td colspan="2" align="center">
                    <h1>Adicionar Novo Trainer</h1>
                </td>
            </tr>
            <tr>
                <td align="right"><strong>Nome </strong></td>
                <td><input type="text" name="name"></td>
            </tr>
            <tr>
                <td align="right"><strong>Classe </strong></td>
                <td>
                    <select name="class" id="">
                        <option>Selecione uma Classe</option>
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
                <td align="right"><strong>Contato </strong></td>
                <td><input type="text" name="contact"></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="trainer" value="Adicionar Trainer"></td>
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
        $insertTran = "INSERT INTO trainer (name, class, contact) VALUES ('$tranName', '$tranClass', '$tranContact')";
        $runTran = mysqli_query($conn, $insertTran);

        if ($runTran) {
            echo "<script>alert('Novo trainer adicionado com sucesso!')</script>";
            echo "<script>window.open('index.php?add_trainers','_self')</script>";
        } else {
            echo "<script>alert('Error')</script>";
        }
    }
}

?>