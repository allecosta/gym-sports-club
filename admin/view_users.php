<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Visualizar Usuários</title>
</head>

<body>
    <table align="center">
        <tr align="center">
            <td colspan="6">
                <h2>Painel Usúarios</h2>
            </td>
        </tr>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Peso</th>
            <th>Idade</th>
            <th>Contato</th>
        </tr>
        <?php

        $i = 0;

        $selectUser = "SELECT * FROM users";
        $runUser = mysqli_query($conn, $selectUser);

        while ($rowUser = mysqli_fetch_array($runUser)) {
            $userID = $rowUser['id'];
            $userName = $rowUser['name'];
            $userEmail = $rowUser['email'];
            $userWeight = $rowUser['weight'];
            $userAge = $rowUser['age'];
            $userContact = $rowUser['contact'];

            $i++;

        ?>

            <tr align="center">
                <td><?php echo $i; ?></td>
                <td><?php echo $userName; ?></td>
                <td><?php echo $userEmail; ?></td>
                <td><?php echo $userWeight; ?></td>
                <td><?php echo $userAge; ?></td>
                <td><?php echo $userContact; ?></td>
                <td><a href="index.php?delete_user=<?php echo $userID; ?>">Excluir</a></td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>