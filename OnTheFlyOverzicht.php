<!Doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="vliegtuigje.css">

    <title>On The Fly</title>
</head>
<body>

<center>
    <footer id="main-footer">
        <p>Copyright © 2020. Van Diederik de Wit.  </p>
    </footer>


    <div class="wrapper fadeInDown">
        <div id="formContent">

            <div class='swanky_wrapper'>
                <input id='Dashboard' name='radio' type='radio'>
                <label for='Dashboard'>
                    <span>Planning</span>
                    <div class='lil_arrow'></div>
                    <div class='bar'></div>
                    <div class='swanky_wrapper__content'>
                        <ul>
                            <li><a href="Onthefly.php">HomePage</a></li>
                            <li><a href="OnTheFlyOverzicht.php">Overzicht</a></li>
                            <li><a href="OnTheFlyInvoegen.php">Vluchten Invoegen</a></li>
                            <li>Vluchten zoeken</li>
                        </ul>
                    </div>
                </label>
                <input id='Messages' name='radio' type='radio'>
                <label for='Messages'>
                    <span>Vliegtuigen</span>
                    <div class='lil_arrow'></div>
                    <div class='bar'></div>
                    <div class='swanky_wrapper__content'>
                        <ul>
                            <li>Test</li>
                            <li>Test</li>
                            <li>Test</li>
                            <li>Test</li>
                        </ul>
                    </div>
                </label>
            </div>

        </div>
    </div>
</center>
<br>

<hr/>
<table>
    <thead>
    <tr>
        <th>id</th>
        <th>vluchtnummer</th>
        <th>welk vliegtuig</th>
        <th>datum vertrek</th>
        <th>datum retour</th>
        <th>bestemming</th>
        <th>status</th>
    </tr>
    </thead>
    <tbody>
<?php
$host = "localhost";
$dbname = "onthefly";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname","$username","$password") or die("Verbinding mislukt!");

$query = "SELECT * FROM planning";
$stm = $conn->prepare($query);
if($stm->execute()){

    $airplanes = $stm->fetchAll(PDO::FETCH_OBJ);

    foreach($airplanes as $airplane){

        echo "<tr>";
        echo "<td>$airplane->id</td>";
        echo "<td>$airplane->vluchtnummer</td>";
        echo "<td>$airplane->welkvliegtuig</td>";
        echo "<td>$airplane->datumvertrek</td>";
        echo "<td>$airplane->datumretour</td>";
        echo "<td>$airplane->bestemming</td>";
        echo "<td>$airplane->status</td>";
        echo "</tr>";
    }
}
?>
    </tbody>
</table>


</body>
</html>




