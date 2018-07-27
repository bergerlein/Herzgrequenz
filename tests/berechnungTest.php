
<?php

//C:\xampp\htdocs\herzfrequenz>C:\xampp\php\php.exe phpunit.phar --bootstrap ./Berechnung.php ./tests/berechnungTest.php --testdox tests

use PHPUnit\Framework\TestCase;

class berechnungTest extends TestCase {

public function testMaxHF() {
$berechnung = new Berechnung();
$alter = 33;
$geschlecht = "m";
$ergebnis = 220 - $alter;
$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));

$geschlecht = "w";
$ergebnis = 226 - $alter;
$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));

$alter = 100;
$geschlecht = "m";
$ergebnis = 220 - $alter;
$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));

$geschlecht = "w";
$ergebnis = 226 - $alter;
$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));

$alter = 18;
$geschlecht = "m";
$ergebnis = 220 - $alter;

$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));
$geschlecht = "w";
$ergebnis = 226 - $alter;
$this->assertEquals($ergebnis, $berechnung->berechneMaxHF($geschlecht, $alter));
}

public function testGesundheitszone() {
$berechnung = new Berechnung();
$maxHF = 220;
$gesundheitMin = round($maxHF * 0.5);
$gesundheitMax = round($maxHF * 0.6);
$ergebnis = "$gesundheitMin bis $gesundheitMax";
$this->assertEquals($ergebnis, $berechnung->berechneGesundheitszone($maxHF));

$maxHF = 226;
$gesundheitMin = round($maxHF * 0.5);
$gesundheitMax = round($maxHF * 0.6);
$ergebnis = "$gesundheitMin bis $gesundheitMax";
$this->assertEquals($ergebnis, $berechnung->berechneGesundheitszone($maxHF));
}

public function testFettzone() {
$berechnung = new Berechnung();
$maxHF = 220;
$fettMin = round($maxHF * 0.6);
$fettMax = round($maxHF * 0.7);
$ergebnis = "$fettMin bis $fettMax";
$this->assertEquals($ergebnis, $berechnung->berechneFettzone($maxHF));


$maxHFm = 226;
$fettMin = round($maxHFm * 0.6);
$fettMax = round($maxHFm * 0.7);
$ergebnis = "$fettMin bis $fettMax";
$this->assertEquals($ergebnis, $berechnung->berechneFettzone($maxHFm));
}

public function testAerobeZone() {
$berechnung = new Berechnung();
$maxHF = 220;
$aerobMin = round($maxHF * 0.7);
$aerobMax = round($maxHF * 0.8);
$ergebnis = "$aerobMin bis $aerobMax";
$this->assertEquals($ergebnis, $berechnung->berechneAerobeZone($maxHF));

$maxHF = 226;
$aerobMin = round($maxHF * 0.7);
$aerobMax = round($maxHF * 0.8);
$ergebnis = "$aerobMin bis $aerobMax";
$this->assertEquals($ergebnis, $berechnung->berechneAerobeZone($maxHF));
}

public function testAnaerobeZone() {
$berechnung = new Berechnung();
$maxHF = 220;
$anaerobMin = round($maxHF*0.8);
$anaerobMax = round($maxHF*0.9);
$ergebnis = "$anaerobMin bis $anaerobMax";
$this->assertEquals($ergebnis, $berechnung->berechneAnaerobeZone($maxHF));

$maxHF = 226;
$anaerobMin = round($maxHF*0.8);
$anaerobMax = round($maxHF*0.9);
$ergebnis = "$anaerobMin bis $anaerobMax";
$this->assertEquals($ergebnis, $berechnung->berechneAnaerobeZone($maxHF));
}

public function testRoteZone(){
$berechnung = new Berechnung();
$maxHF = 220;
$roteZoneMin = round($maxHF*0.9);
$roteZoneMax = round($maxHF*1);
$ergebnis = "$roteZoneMin bis $roteZoneMax";
$this->assertEquals($ergebnis,$berechnung->berechneRoteZone($maxHF));

$maxHF = 226;
$roteZoneMin = round($maxHF*0.9);
$roteZoneMax = round($maxHF*1);
$ergebnis = "$roteZoneMin bis $roteZoneMax";
$this->assertEquals($ergebnis,$berechnung->berechneRoteZone($maxHF));

}
}
