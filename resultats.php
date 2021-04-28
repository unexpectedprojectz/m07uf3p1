<?php

include 'partida.php';
include 'DatabasePDO.php';
include 'DatabaseOOP.php';
include 'DatabaseProc.php';

session_start();

// PDO
$conn = new DatabasePDO("localhost", "admin", "admin", "m07uf3");

// OOP
// $conn = new DatabaseOOP("localhost", "admin", "admin", "m07uf3");

// PROC
// $conn = new DatabaseProc("localhost", "admin", "admin", "m07uf3");

$conn->connect();

if(isset($_GET['idEliminar'])) {
    $stmteliminar = $conn->delete($_GET['idEliminar']);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess my number</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ba4ad297d2.js" crossorigin="anonymous"></script>
</head>
<body>

    <header class="container-fluid p-3 bg-secondary">
        <a href="index.php" class="btn shadow-none"><h3 class="text-white">Guess my number</h3></a>
    </header>
    <br><br>

    <div class="container">
        <h2 class="text-center">Resultats</h2><br><br>
        <div class="row">
            <div class="col">
                    <h5 class="fw-bold">Aplicacio Descobreix</h5>
                    <div>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center text-muted">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">Modalitat</td>
                                            <td scope="col">Nivell</td>
                                            <td scope="col">Data</td>
                                            <td scope="col">Intents</td>
                                            <td scope="col">Opcions</td>
                                        </tr>
                                    
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stmtmaquina = $conn->selectByModalitat("Maquina");
                                            
                                            // PDO
                                            while($row = $stmtmaquina->fetch(PDO::FETCH_ASSOC)) {

                                            // OOP
                                            // while($row = $stmtmaquina->fetch_assoc()) {

                                            // PROC
                                            // while($row = mysqli_fetch_assoc($stmtmaquina)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['modalitat']; ?></td>
                                            <td><?php echo $row['nivell']; ?></td>
                                            <td><?php echo $row['data_partida']; ?></td>
                                            <td><?php echo $row['intents']; ?></td>
                                            <td>
                                                <a href="./modificarestadistiques.php?idModificar=<?php echo $row['id']?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="./resultats.php?idEliminar=<?php echo $row['id']?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <br>
                    <h5 class="fw-bold">Jugador Descobreix</h5>
                    <div>
                        <div class="card-body text-center">
                            <div class="d-flex justify-content-center text-muted">
                            <table class="table">
                                    <thead>
                                        <tr>
                                            <td scope="col">Modalitat</td>
                                            <td scope="col">Nivell</td>
                                            <td scope="col">Data</td>
                                            <td scope="col">Intents</td>
                                            <td scope="col">Opcions</td>
                                        </tr>
                                    
                                    </thead>
                                    <tbody>
                                        <?php
                                            $stmthuma = $conn->selectByModalitat("Huma");

                                            // PDO
                                            while($row = $stmthuma->fetch(PDO::FETCH_ASSOC)) {

                                            // OOP
                                            // while($row = $stmthuma->fetch_assoc()) {
                                                
                                            // PROC
                                            // while($row = mysqli_fetch_assoc($stmthuma)) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['modalitat']; ?></td>
                                            <td><?php echo $row['nivell']; ?></td>
                                            <td><?php echo $row['data_partida']; ?></td>
                                            <td><?php echo $row['intents']; ?></td>
                                            <td>
                                                <a href="./modificarestadistiques.php?idModificar=<?php echo $row['id']?>" class="btn btn-secondary">
                                                    <i class="fas fa-marker"></i>
                                                </a>
                                                <a href="./resultats.php?idEliminar=<?php echo $row['id']?>" class="btn btn-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>