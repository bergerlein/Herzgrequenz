<?php

// /opt/lampp/bin/php phpunit --bootstrap ./Verify.php ./verifyTest.php 
use PHPUnit\Framework\TestCase;

class verifyTest extends TestCase{
    
    public function testVerifyName() {
        $verify = new Verify();
        $this->assertTrue($verify->name('Carina')); // einfacher Name
        $this->assertTrue($verify->name('Günther')); // Umlaut ü
        $this->assertTrue($verify->name('Cäcilia')); // Umlaut ä
        $this->assertTrue($verify->name('Jörg')); // Umlaut ö
        $this->assertTrue($verify->name('Sabrina Hofstaetter')); // mit Leerzeichen
        $this->assertTrue($verify->name('abcdefghijklmnopqrstuvwxyzabcd')); // 30 Zeichen
        
        $this->assertFalse($verify->name('Sarah5')); // Ziffer
        $this->assertFalse($verify->name('abc-defg')); // Sonderzeichen -
        $this->assertFalse($verify->name('Sarah!')); // Sonderzeichen !
        $this->assertFalse($verify->name('')); // leerer String
        $this->assertFalse($verify->name('abcdefghijklmnopqrstuvwxyzabcde')); // 31 Zeichen  
    }
    
    public function testVerifyAlter() {
        $verify = new Verify();
        $this->assertTrue($verify->alter('43')); // Mitte
        $this->assertTrue($verify->alter('18')); // 18 - untere Grenze
        $this->assertTrue($verify->alter('100')); // 100 - obere Grenze
        
        $this->assertFalse($verify->alter('')); // leerer String
        $this->assertFalse($verify->alter('101')); // 101 
        $this->assertFalse($verify->alter('17')); // 17
        $this->assertFalse($verify->alter('a')); // buchstabe
        $this->assertFalse($verify->alter('%')); // Sonderzeichen
        $this->assertFalse($verify->alter('-5')); // negativ
        $this->assertFalse($verify->alter('0')); // 0
    } 
    
    public function testVerifyGeschlecht(){
        $verify = new Verify();
        $this->assertTrue($verify->geschlecht('m'));
        $this->assertTrue($verify->geschlecht('w'));
        
        $this->assertFalse($verify->geschlecht('')); // leerer String
        $this->assertFalse($verify->geschlecht('f')); // f
        $this->assertFalse($verify->geschlecht('wm')); // zwei Buchstaben
        $this->assertFalse($verify->geschlecht('1')); // Ziffer
    }
    
    public function testVerifyCheckArzt(){
        $verify = new Verify();
        $this->assertTrue($verify->checkArzt('1')); // true
        
        $this->assertFalse($verify->checkArzt(null)); // null
    }
    public function testVerifyCheckHaftung(){
        $verify = new Verify();
        $this->assertTrue($verify->checkHaftung('1')); // true
        
        $this->assertFalse($verify->checkArzt(null)); // null
    }

}
