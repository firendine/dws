<?php

try{
$con= new PDO('mysql:host=localhost;dbname=nba','silvia','6sec120.L');
echo "conectado <br>";

$nbaTeamData= "SELECT * FROM equipos";

foreach($con->query($nbaTeamData) as $row){
    print $row['Nombre'] ."/";
    print $row['Ciudad'] . "/";
    print $row['Conferencia'] . "/";
    print $row['Division'] . "<br>";
}


}catch(PDOException $ex){
    echo $ex;
    echo "<br>no conectado";

}

