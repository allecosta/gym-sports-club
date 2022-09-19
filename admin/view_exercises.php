<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Visualizar Exercícios</title>
</head>

<body>
    <?php

    if (isset($_GET['view_exercises'])) : ?>
        <table align="center">
            <tr align="center">
                <td colspan="6">
                    <h2>Visualizar Todos Exercícios</h2>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nome de Exercício</th>
                <th>Imagem do Exercício</th>
            </tr>
            <?php

            $i = 0;

            $selectExer = "SELECT * FROM exercises";
            $runExer = mysqli_query($conn, $selectExer);

            while ($rowExer = mysqli_fetch_array($runExer)) {
                $exerID = $rowExer['id'];
                $exerName = $rowExer['name'];
                $exerIMG = $rowExer['img'];

                $i++;
            ?>

                <tr align="center">
                    <td><?php echo $i; ?></td>
                    <td><?php echo $exerName; ?></td>
                    <td><img src="assets/images/<?php echo $exerIMG; ?>" width="60" height="44"></td>
                    <td><a href="index.php?edit_exercise=<?php echo $exerID; ?>">Editar</a></td>
                    <td><a href="index.php?delete_exercise=<?php echo $exerID; ?>">Excluir</a></td>
                </tr>
            <?php } ?>
        </table>
    <?php endif ?>
</body>

</html>