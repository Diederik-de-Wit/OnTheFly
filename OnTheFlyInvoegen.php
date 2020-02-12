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
<hr/>
<ul><h1><p>Vluchten Invoeren:</p></h1></ul>
<form method="POST">
        <table>
            <thead>
            <tr>
                <th><b>vluchtnummer:</b></th>
                <th><b>welk vliegtuig:</b></th>
                <th><b>datum vertrek:</b></th>
                <th><b>datum retour:</b></th>
                <th><b>bestemming:</b></th>
                <th><b>status:</b></th>
            </tr>
            </thead>
        </table>


        <table>
            <thead>
            <tr>
                <td><input type="text" placeholder="vluchtnummer" name="vluchtnummer"/></td>
                <td><input type="text" placeholder="welk vliegtuig" name="welkvliegtuig"/></td>
                <td><input type="date" placeholder="datum vertrek" name="datumvertrek"/></td>
                <td><input type="date" placeholder="datum retour" name="datumretour"/></td>
                <td><input type="text" placeholder="bestemming" name="bestemming"/></td>
                <td><input type="text" placeholder="status" name="status"/></td>
            </tr>
            </thead>
        </table>


    <ul><p><input type="submit" name="opslaan" value="Opslaan"></p></ul>
    <hr/><br><br>
</form>

    <ul><h1><p>↓ Kijk of uw gegevens kloppen ↓ </p></h1></ul>
<table>
    <thead>
    <tr>
        <th><b>vluchtnummer:</b></th>
        <th><b>welk vliegtuig:</b></th>
        <th><b>datum vertrek:</b></th>
        <th><b>datum retour:</b></th>
        <th><b>bestemming:</b></th>
        <th><b>status:</b></th>
    </tr>
    </thead>
</table>

</form>


<br>

<table>
    <thead>
<?php

if (isset($_POST["opslaan"])) {
    $lijst = array();
    array_push($lijst, $_POST["vluchtnummer"]);
    array_push($lijst, $_POST["welkvliegtuig"]);
    array_push($lijst, $_POST["datumvertrek"]);
    array_push($lijst, $_POST["datumretour"]);
    array_push($lijst, $_POST["bestemming"]);
    array_push($lijst, $_POST["status"]);



    echo "<tr>";
    echo "<td>vluchtnummer:    </td>".$lijst[0];
    echo "<td>welkvliegtuig:   </td>".$lijst[1];
    echo "<td>datumvertrek:    </td>".$lijst[2];
    echo "<td>datumretour:     </td>".$lijst[3];
    echo "<td>bestemming:      </td>".$lijst[4];
    echo "<td>status: </td>".$lijst[5]. "<br/>". "<br/>";
    echo "</tr>";

}

$host = "localhost";
$dbname = "onthefly";
$username = "root";
$password = "";

$conn = new PDO("mysql:host=$host;dbname=$dbname","$username","$password") or die("Verbinding mislukt!");

$sQuery = "SELECT * FROM planning";
$stm = $conn->prepare($sQuery);
if($stm->execute())
{
    $result = $stm->fetchALL(PDO::FETCH_OBJ);


    foreach($result as $prod){
        echo "<tr>";
        echo "<td>$prod->vluchtnummer</td>";
        echo "<td>$prod->welkvliegtuig</td>";
        echo "<td>$prod->datumvertrek</td>";
        echo "<td>$prod->datumretour</td>";
        echo "<td>$prod->bestemming</td>";
        echo "<td>$prod->status</td>";
        echo "</tr>";
    }

}else echo "mislukt!";

if(isset($_POST['opslaan']))
{
    $vluchtnummer = $_POST['vluchtnummer'];
    $welkvliegtuig = $_POST['welkvliegtuig'];
    $datumvertrek = $_POST['datumvertrek'];
    $datumretour = $_POST['datumretour'];
    $bestemming = $_POST['bestemming'];
    $status = $_POST['status'];


    $query = "INSERT INTO planning VALUES 
                            ('$vluchtnummer', '$welkvliegtuig', '$datumvertrek', '$datumretour', '$bestemming', '$status')";
    $stm = $conn->prepare($query);
    if($stm->execute()){
        echo "gelukt";

    }else echo "mislukt";

}




?>
    </thead>
</table>


</body>
</html>




