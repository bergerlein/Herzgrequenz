<!-- Ergebnis-Seite -->

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css.css">
        <title>result.php</title>
    </head>
    <body>

        <?php
        // Klasse zur Input-Überprüfung einbinden
        include 'Verify.php';
        $verify = new Verify();

        // Variablen für Verify initialisieren und Methoden aufrufen
        $verifyAlter = $verify->alter($_POST['alter']);
        $verifyName = $verify->name($_POST['name']);
        $verifyGeschlecht = $verify->geschlecht($_POST['geschlecht']);
        $verifyArzt = $verify->checkArzt($_POST['checkArzt']);
        $verifyHaftung = $verify->checkHaftung($_POST['checkHaftung']);

        // Bei korrekter eingabe (alle Prüfungen sind true) wird Ergebnis angezeigt
        if (($verifyAlter) AND ( $verifyName) AND ( $verifyGeschlecht) AND ( $verifyArzt) AND ( $verifyHaftung)) {

            // Klasse zur Berechnung der HF-Zonen einbinden
            include 'Berechnung.php';

            $berechnung = new Berechnung();

            // Variablen für Berechnung initialisieren und Methoden aufrufen
            // Maximale Herzfrequenz: Berechnung wird in Klasse durchgeführt
            // Hierfür werden Parameter "geschlecht" und "alter" an die Methode übergeben
            // Das Ergebnis wird in der Variable $maxHF gespeichert und unten im Formular ausgegeben
            $maxHF = $berechnung->berechneMaxHF($_POST['geschlecht'], $_POST['alter']);

            // Variablen für Berechnung initialisieren
            // für Berechnung aller weiteren Werte wird nur die Maximale Herzfrequenz benötigt, daher nur diese übergeben
            $gesundheitszone = $berechnung->berechneGesundheitszone($maxHF);
            $fettzone = $berechnung->berechneFettzone($maxHF);
            $aerobeZone = $berechnung->berechneAerobeZone($maxHF);
            $anaerobeZone = $berechnung->berechneAnaerobeZone($maxHF);
            $roteZone = $berechnung->berechneRoteZone($maxHF);
            ?>

            <div class ="container">
                <div class="ausgabeDaten">
                    <div class="ausgabeName" id="ausgabeName">
                        <h3><?php echo 'Ergebnis für ' . $_POST['name']; ?></h3>
                    </div>
                    <div class="daten">
                        <div class=ausgabeAge id=ausgabeAge> Abhängig von deinem Alter
                            (<?php echo $_POST['alter']; ?>)<br>
                        </div>
                        <div class="ausgabeSex" id="ausgabeSex">
                            und deinem Geschlecht
                            (<?php echo $_POST['geschlecht']; ?>)<br>
                        </div>
                        wurden folgende Werte berechnet:<br><br>
                    </div>
                    <div class="ausgabe" id="ausgabe">
                        <p>Deine Maximale Herzfrequenz beträgt <?php echo ($maxHF) ?></p>
                    </div>
                </div>
                <br>
                <div class="container1">
                    <table class="table table-striped" id="second">
                        <h5><p>Deine Herzfrequenzzonen</p></h5>
                        <thead>
                            <tr>
                                <th scope="col">Pulsbereich</th>
                                <th scope="col">Belastungszone</th>
                                <th scope="col">Beschreibung</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <th scope="row" id="1"><?php echo $gesundheitszone ?></th>
                                <td>Gesundheitszone</td>
                                <td>In diesem Pulsbereich wird vor allem das Herz-Kreislauf-System gestärkt. Dieser Bereich ist besonders für Anfänger geeignet. </td>

                            </tr>
                            <tr>
                                <th scope="row" id="2"><?php echo ($fettzone) ?></th>
                                <td>Fettverbrennungszone</td>
                                <td>In diesem Pulsbereich werden die meisten Kalorien aus Fett verbrannt. Zudem wird das Herz-Kreislauf-System trainiert.</td>
                            </tr>
                            <tr>
                                <th scope="row" id="3"><?php echo ($aerobeZone) ?></th>
                                <td> Aerobe Zone</td>
                                <td>In diesem Pulsbereich werden Kohlenhydrate und Fette zur Energiegewinnung in den Muskelzellen verbrannt. Dieser Bereich fordert das Herz-Kreislauf-System sowie die Lunge und den Stoffwechsel. </td>
                            </tr>
                            <tr>
                                <th scope="row" id="4"><?php echo($anaerobeZone) ?></th>
                                <td> Anaerobe Zone</td>
                                <td>In diesem Pulsbereich kann der Körper den Sauerstoffbedarf nicht mehr decken. Dieser Bereich dient zum Kraft- und Muskelmasseaufbau. </td>
                            </tr>
                            <tr>
                                <th scope="row" id="5"><?php echo ($roteZone) ?></th>
                                <td> Rote Zone</td>
                                <td>Diesen Pulsbereich sollte man mit Vorsicht genießen. Er ist gefährlich für Anfänger und kann schädlich für das Herz sein. </td>
                            </tr>

                        </tbody>
                    </table>
                    <a href="index.php"><button class="btn btn-secondary" role="button" value="Zurück">Neue Berechnung</button></a>
                    <br><br>
                </div> 
            </div>
            <div clas="container">
                <a href="index.php"><button class="btn btn-secondary" role="button" value="Zurück">Neue Berechnung</button></a>
            </div>

            <?php
            // bei fehlerhafter Eingabe
        } else {
            echo "<h5>Tut uns leid! Da hat etwas nicht geklappt.</h5><br>";
            if (!($verifyName)) {
                echo "<b>Name</b>: Bitte max. 30 Zeichen eingeben (nur Buchstaben und Leerzeichen)<br>";
            }
            if (!($verifyAlter)) {
                echo "Das angegebene <b>Alter</b> muss zwischen 18 und 100 liegen<br>";
            }
            if (!($verifyGeschlecht)) {
                echo "Bei <b>Geschlecht</b> muss m oder w angegeben werden<br>";
            }
            if (!($verifyArzt)) {
                echo "Der <b>Empfehlung zur medizinischen Abklärung</b> muss zugestimmt werden<br>";
            }
            if (!($verifyHaftung)) {
                echo "Dem <b>Haftungsausschluss</b> muss zugestimmt werden<br>";
            }
            ?>

            <div clas="container">
                <a href="index.php"><button class="btn btn-secondary" role="button" value="Zurück">Neu eingeben</button></a>
            </div>

            <?php
        }
        ?>
    </body>
</html>