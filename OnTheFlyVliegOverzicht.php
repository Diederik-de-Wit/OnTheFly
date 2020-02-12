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
                            <li><a href="OnTheFlyOverzicht.php">Overzicht Vluchten</a></li>
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
                            <li><a href="Onthefly.php">HomePage</a></li>
                            <li><a href="OnTheFlyVliegOverzicht.php">Overzicht Vliegtuigen</a></li>
                            <li><a href="OnTheFlyVliegToevoegen.php">Toevoegen Vliegtuigen</a></li>
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
        <th>vliegtuignummer</th>
        <th>type vliegtuig</th>
        <th>vliegtuigmaatschappij</th>
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

    $query = "SELECT * FROM vliegtuigen";
    $stm = $conn->prepare($query);
    if($stm->execute()){

        $airplanes = $stm->fetchAll(PDO::FETCH_OBJ);

        foreach($airplanes as $airplane){

            echo "<tr>";
            echo "<td>$airplane->id</td>";
            echo "<td>$airplane->vliegtuignummer</td>";
            echo "<td>$airplane->type</td>";
            echo "<td>$airplane->vliegtuigmaatschappij</td>";
            echo "<td>$airplane->status</td>";
            echo "</tr>";
        }
    }
    ?>
    </tbody>
</table>


</body>
</html>




