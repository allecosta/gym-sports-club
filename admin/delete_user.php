<?php

include '../includes/connection.php';

if (isset($_GET['delete_user'])) {
    $deleteID = $_GET['delete_user'];
    $deleteUser = "DELETE FROM users WHERE id='$deleteID'";
    $runDelete = mysqli_query($conn, $deleteUser);

    if ($runDelete) {
        echo "<script>alert('Excluido com sucesso')</script>";
        echo "<script>window.open('index.php?view_users','_self')<script>";
    }
}
