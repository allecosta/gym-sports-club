<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Vizualizar Trainers</title>
</head>

<body>
    <?php if (isset($_GET['view_trainers'])) : ?>
        <table align="center">
            <tr align="center">
                <td colspan="6">
                    <h2>Painel Trainers</h2>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Classe</th>
                <th>Contato</th>
            </tr>
            <?php

            $i = 0;

            $selectTrainer = "SELECT * FROM trainer";
            $runSelect = mysqli_query($conn, $selectTrainer);

            while ($rowTrainer = mysqli_fetch_array($runSelect)) {
                $trainerID = $rowTrainer['id'];
                $trainerName = $rowTrainer['name'];
                $trainerClass = $rowTrainer['class'];
                $trainerContact = $rowTrainer['contact'];

                $i++;

            ?>

                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $trainerName; ?></td>
                    <td><?php echo $trainerClass; ?></td>
                    <td><?php echo $trainerContact; ?></td>
                    <td><a href="index.php?edit_trainer=<?php echo $trainerID; ?>">Editar</a></td>
                    <td><a href="index.php?delete_trainer=<?php echo $trainerID; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php endif ?>
</body>

</html>