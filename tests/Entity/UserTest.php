<?php

namespace tests\Entity;

use App\Entity\User;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase {

    public function testIsValidNominal() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertTrue($user->isValid());
    }

    public function testEmailIsEmpty() {
        $user = new User();
        $user->setEmail("");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testEmailBadFormat() {
        $user = new User();
        $user->setEmail("test.test");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testFirstNameNull() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testLastNameNull() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testPasswordTooShort() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testPasswordTooLong() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123598plk10vc2359832045123hjv30jvc5123540jhusx');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->assertFalse($user->isValid());
    }

    public function testUnder13() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P5Y')));

        $this->assertFalse($user->isValid());
    }

    public function testOver13() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P15Y')));

        $this->assertTrue($user->isValid());
    }

}