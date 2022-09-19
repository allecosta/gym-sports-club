<?php

include '../includes/connection.php';

if (isset($_GET['delete_trainer'])) {
    $deleteID = $_GET['delete_trainer'];
    $deleteTrainer = "DELETE FROM trainer WHERE id='$deleteID'";
    $runDelete = mysqli_query($conn, $deleteTrainer);

    if ($runDelete) {
        echo "<script>alert('Excluido com sucesso')</script>";
        echo "<script>window.open('index.php?view_trainers', '_self')</script>";
    }
}
