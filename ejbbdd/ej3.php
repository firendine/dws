<?php

try {
    $con = new PDO('mysql:host=localhost;dbname=nba', 'silvia', '6sec120.L');
    echo "conectado <br>";

    $nbaTeamData = "SELECT * FROM equipos";

    foreach ($con->query($nbaTeamData) as $row) {
        print $row['Nombre'] . " <a href='ej3.php?Nombre=".  $fila['Nombre'] .">";
        print $row['Ciudad'] . "/";
        print $row['Conferencia'] . "/";
        print $row['Division'] . "<br>";
    }




    $nombreEquipo= $_GET['Nombre'];

    $jugadores = "SELECT * FROM jugadores WHERE Nombre_Equipo LIKE $nombreEquipo ";

    foreach ($con->query($jugadores) as $row) {
        print $row['codigo'] . " ";
        print $row['Nombre'] . " ";
        print $row['Procedencia'] . " ";
        print $row['Altura'] . "<br>";
        print $row['Peso'];
        print $row['Altura']
    }


} catch (PDOException $ex) {
    echo $ex;
    echo "<br>no conectado";
}


//<a href="nbaTeam.php?codigo=<?php echo $fila['codigo']?>">