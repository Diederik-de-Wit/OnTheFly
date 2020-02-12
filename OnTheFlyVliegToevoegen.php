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
<ul><h1><p>Vliegtuigen Invoeren:</p></h1></ul>
<form method="POST">
    <table>
        <thead>
        <tr>
            <th><b>vliegtuignummer:</b></th>
            <th><b>type:</b></th>
            <th><b>vliegtuigmaatschappij:</b></th>
            <th><b>status:</b></th>
        </tr>
        </thead>
    </table>


    <table>
        <thead>
        <tr>
            <td><input type="text" placeholder="vliegtuignumemr" name="vliegtuignummer"/></td>
            <td><input type="text" placeholder="type" name="type"/></td>
            <td><input type="text" placeholder="vliegtuigmaatschappij" name="vliegtuigmaatschappij"/></td>
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
        <th><b>vliegtuignummer:</b></th>
        <th><b>type:</b></th>
        <th><b>vliegtuigmaatschappij:</b></th>
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
        array_push($lijst, $_POST["vliegtuignummer"]);
        array_push($lijst, $_POST["type"]);
        array_push($lijst, $_POST["vliegtuigmaatschappij"]);
        array_push($lijst, $_POST["status"]);



        echo "<tr>";
        echo "<td>vliegtuignummer:        </td>".$lijst[0];
        echo "<td>type:                   </td>".$lijst[1];
        echo "<td>vliegtuigmaatschappij:  </td>".$lijst[2];
        echo "<td>status:                 </td>".$lijst[3]. "<br/>". "<br/>";
        echo "</tr>";

    }

    $host = "localhost";
    $dbname = "onthefly";
    $username = "root";
    $password = "";

    $conn = new PDO("mysql:host=$host;dbname=$dbname","$username","$password") or die("Verbinding mislukt!");

    $sQuery = "SELECT * FROM vliegtuigen";
    $stm = $conn->prepare($sQuery);
    if($stm->execute())
    {
        $result = $stm->fetchALL(PDO::FETCH_OBJ);


        foreach($result as $prod){
            echo "<tr>";
            echo "<td>$prod->vliegtuignummer</td>";
            echo "<td>$prod->type</td>";
            echo "<td>$prod->vliegtuigmaatschappij</td>";
            echo "<td>$prod->status</td>";
            echo "</tr>";
        }

    }else echo "mislukt!";

    if(isset($_POST['opslaan']))
    {
        $vliegtuignummer = $_POST['vliegtuignummer'];
        $type = $_POST['type'];
        $vliegtuigmaatschappij = $_POST['vliegtuigmaatschappij'];
        $status = $_POST['status'];


        $query = "INSERT INTO vliegtuigen VALUES 
                            ('$vliegtuignummer', '$type', '$vliegtuigmaatschappij', '$status')";
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




