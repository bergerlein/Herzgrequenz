<!-- Eingabeüberprüfung -->

<?php
class Verify {

    // name: max 30 zeichen, nur buchstaben und leerzeichen
    public function name($name) {

        if (!(preg_match('/^[a-zA-Z äöüÖÄÜ]+$/', $name))) {
            return false;
        } else {
            return ((isset($name)) AND ( strlen($name) < 31));
        }
    }

    // alter: nur ziffern, 18-100
    public function alter($alter) {
        return (isset($alter) AND (is_numeric($alter)) AND (($alter) > 17 AND ($alter) < 101));
    }

    // geschlecht: nur m oder w
    public function geschlecht($geschlecht) {
        return (isset($geschlecht) AND ( ($geschlecht) == "w" OR ( $geschlecht) == "m"));
    }

    public function checkArzt($checkArzt) {
        return (isset($checkArzt));
    }

    public function checkHaftung($checkHaftung) {
        return (isset($checkHaftung));
    }

}
