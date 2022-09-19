<?php

include '../includes/connection.php';

if (isset($_GET['delete_exercise'])) {
    $deleteID = $_GET['delete_exercise'];
    $deleteExer = "DELETE FROM exercises WHERE id='$deleteID'";
    $runDelete = mysqli_query($conn, $deleteExer);

    if ($runDelete) {
        echo "<script>alert('Excluido com sucesso')</script>";
        echo "<script>window.open('index.php?view_exercises','_self')</script>";
    }
}
