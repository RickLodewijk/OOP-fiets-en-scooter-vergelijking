<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"type="text/css" href="ccs.css">
</head>
<body>
    <div class="antwoord">
    <?php
        if (isset($_POST["submit"])) {
        {
            $wegLengte = $_POST["weg_lengte"];
            $wegVertraging = $_POST["weg_vertraging"];
            $fietsBandenspanning = $_POST["fiets_bandenspanning"];
            $fietsType = $_POST["fiets_type"];
            $scooterBandenspanning = $_POST["scooter_bandenspanning"];
            $scooterSnelheid = $_POST["scooter_snelheid"];

            if ($fietsType == "Niet Elektrisch"){
                $snelheidfiets=15;
            } else {
                $snelheidfiets=25;
            }
            $scooterAntwoord=0;
            $fietsAntwoord=0;
            $fietsEindSnelheid=0;
            $scooterEindSnelheid=0;

            $fietsBandenspanning= $fietsBandenspanning/100;
            $scooterBandenspanning= $scooterBandenspanning/100;

            $scooterAntwoord = $scooterSnelheid * $scooterBandenspanning;
            $fietsAntwoord = $snelheidfiets * $fietsBandenspanning ;

            $fietsEindSnelheid= ($wegLengte/$fietsAntwoord)*60 ;
            $scooterEindSnelheid = (($wegLengte/ $scooterAntwoord)*60)+ $wegVertraging;
            
            echo "De fiets snelheid is ". $fietsAntwoord. "km per uur. <br>";
            echo "Het is ". $fietsEindSnelheid. " minuten met de fiets <br>";
            echo "De scooter snelheid is ". $scooterAntwoord. "km per uur. <br>";
            echo "Het is ".$scooterEindSnelheid. " minuten met de scooter <br> ";
            ?>
            </div>
            <div class="een">
            <?php
          
            if ( $fietsEindSnelheid > $scooterEindSnelheid){
                echo "Advies is om met de fiets te gaan.";
            } else {
                echo "Advies is om met de scooter te gaan.</div>" ;
            }
        }}
    ?>
    </div>
    <form action="eindopdracht-formulier-Rick.php" method="post">
    <h1 class="reisadvies"> Gegeven voor reis advies </h1>
    <fieldset>
        <p class="Groen">Weg</p>
        <label> Lengte (in KM) <br>
        <input class="balk" type="number" name="weg_lengte" /> </label> <br>
        <label>Vertraging door file (in minuten): <br>
        <input class="balk" type="number" name="weg_vertraging" /> </label> <br>
    </fieldset>

    <fieldset>
        <p class="Groen">Fiets</p>
        <label> Bandenspanning (in %)<br>
        <input class="balk"   type="number" name="fiets_bandenspanning"></label><br>
        <p>Wat voor fiets <br>
            <input type="radio" name="fiets_type" value="Niet Elektrisch" /> Niet Elektrisch (fietssnelheid = 15km/u)
            <input type="radio" name="fiets_type" value="Elektrisch"/> Elektrisch </p>
    </fieldset>

    <fieldset>
        <p class="Groen">Scooter</p>
        <label> Bandenspanning (in %)<br>
        <input class="balk" type="number" name="scooter_bandenspanning"></label><br>
        <p> snelheid </p>
        <select class="balk" name="scooter_snelheid">
            <option value=25> 25 km</option>
            <option value=45> 45 KM</option>
        </select>
    </fieldset>
    <input class="knop" type="submit" name="submit" value="Geef advies" />
</form>

</body>
</html>