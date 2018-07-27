<?php

use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase {

	public function testCanGetNameOfPerson() {
		$person = new person('Hans');

		$this->assertEquals('Hans', $person->getName());
	}

	public function testCanSetAgeOfPerson() {
		$person = new person('Hans');

		$this->assertFalse($person->setAge("ungültig"));
		$this->assertTrue($person->setAge(30));
	}

	public function testCanGetAllHobbiesOfPersonAsArray() {
		$person = new person('Hans');

		$this->assertTrue(is_array($person->getHobbies()));
		$this->assertCount(3, $person->getHobbies());
		$this->assertContainsOnly('string', $person->getHobbies());
		$this->assertArraySubset(array('lesen'), $person->getHobbies());
	}

	public function testCanGetAllHobbiesOfPersonAsJsonString() {
		$person = new person('Hans');

		$this->assertJsonStringEqualsJsonString(
			'["lesen", "schwimmen", "tanzen"]',
			$person->getHobbiesAsJson()
		);
	}
}
