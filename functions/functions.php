<?php

include 'includes/connection.php';

$db = mysqli_connect("$DATABASE_HOST", "$DATABASE_USER", "$DATABASE_PASS", "$DATABASE_NAME");


function getDays()
{
    global $db;

    $getDays = "SELECT * FROM days";
    $runDays = mysqli_query($db, $getDays);

    while ($rowDays = mysqli_fetch_array($runDays)) {
        $dayID = $rowDays['id'];
        $dayName = $rowDays['name'];

        echo "<li><a href='index.php?day=$dayID'>$dayName</a></li>";
    }
}

function getExercise()
{
    global $db;

    $getExer = "SELECT * FROM exercises";
    $runExer = mysqli_query($db, $getExer);

    while ($rowExer = mysqli_fetch_array($runExer)) {
        $exerID = $rowExer['id'];
        $exerName = $rowExer['name'];

        echo "<li><a href='index.php?exer=$exerID'>$exerName</a></li>";
    }
}

function getDayExercises()
{
    global $db;

    if (isset($_GET['day'])) {
        $dayID = $_GET['day'];
        $getExer = "SELECT * FROM exercises WHERE id='$dayID'";
        $runExer = mysqli_query($db, $getExer);
        $count = mysqli_num_rows($runExer);

        if ($count == 0) {
            echo "<h3>Nenhum treino disponível neste dia</h3>";
        }

        while ($rowExer = mysqli_fetch_array($runExer)) {
            $exerID = $rowExer['id'];
            $exerName = $rowExer['name'];
            $sets = $rowExer['sets'];
            $exerIMG = $rowExer['img'];

            echo "
                <div id='single_product'>
                    <h3 style='color: #f2e013;'>$exerName</h3>
                    <img src='../admin/assets/images/$exerIMG' width='300' height='221' /><br>
                    <p><h3 style='color: #e0d126'>$sets</h3></p>
                </div>
            ";
        }
    }
}

function getExerExercises()
{
    global $db;

    if (isset($_GET['exer'])) {
        $exerID = $_GET['exer'];
        $getExerExer = "SELECT * FROM exercises WHERE id='$exerID'";
        $runExerExer = mysqli_query($db, $getExerExer);
        $count = mysqli_num_rows($runExerExer);

        while ($rowExerExer = mysqli_fetch_array($runExerExer)) {
            $exerID = $rowExerExer['id'];
            $exerName = $rowExerExer['name'];
            $exerIMG = $rowExerExer['img'];

            echo "
                <div id='single_produtc'>
                    <h3 style='color: #f2e013';>$exerName</h3>
                    <img src='../admin/assets/images/$exerIMG' whidth='300' height='221' /><br>
                </div>
            ";
        }
    }
}

function getAllExercises()
{
    global $db;

    if (!isset($_GET['day'])) {
        if (!isset($_GET['exer'])) {
            $getAllExer = "SELECT * FROM exercises ORDER BY rand() LIMIT 0,5";
            $runAllExer = mysqli_query($db, $getAllExer);

            while ($rowAllExer = mysqli_fetch_array($runAllExer)) {
                $exerID = $rowAllExer['id'];
                $exerName = $rowAllExer['name'];
                $sets = $rowAllExer['sets'];
                $exerIMG = $rowAllExer['img'];

                echo "
                    <div id='single_product'>
                        <h3 style='color: #f2e013;'>$exerName</h3>
                        <img src='../admin/assets/images/$exerIMG' width='200' height='147' /><br>
                    </div>
                ";
            }
        }
    }
}
