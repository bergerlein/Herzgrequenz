<!-- Berechnung der HF-Zonen -->

<?php

class Berechnung {

    public function berechneMaxHF($geschlecht, $alter) {
        if ($geschlecht == 'm') {
            $maxHF = (220 - $alter);
            
        } else
            $maxHF = (226 - $alter);
        return $maxHF;
    }

    public function berechneGesundheitszone($maxHF) {
        $gesundheitMin = round($maxHF*0.5);    
        $gesundheitMax = round($maxHF*0.6);
       
            return "$gesundheitMin bis $gesundheitMax";
        
    }
    
    public function berechneFettzone($maxHF){
        $fettMin = round($maxHF*0.6);
        $fettMax = round($maxHF*0.7);

        return "$fettMin bis $fettMax";
    }
    
    public function berechneAerobeZone($maxHF){
        $aerobMin = round($maxHF*0.7);
        $aerobMax = round($maxHF*0.8);
        return "$aerobMin bis $aerobMax";
    }
    
    public function berechneAnaerobeZone($maxHF){
        $anaerobMin = round($maxHF*0.8);
        $anaerobMax = round($maxHF*0.9);
        return "$anaerobMin bis $anaerobMax";
    }
    
    public function berechneRoteZone($maxHF){
        $roteZoneMin = round($maxHF*0.9);
        $roteZoneMax = round($maxHF*1);
        return "$roteZoneMin bis $roteZoneMax";
    }
    
}