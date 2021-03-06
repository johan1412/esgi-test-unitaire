<?php

namespace tests\Services;

use App\Entity\Item;
use App\Entity\User;
use App\Services\TodolistService;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

class TodolistServiceTest extends TestCase {

    private User $user;
    private Item $item;

    public function createUser() {
        $user = new User();
        $user->setEmail("test@test.com");
        $user->setFirstName("prenomdetest");
        $user->setLastName("nomdetest");
        $user->setPassword('123456789');

        $date = new DateTime('now');
        $user->setBirthday($date->sub(new DateInterval('P20Y')));

        $this->user = $user;
    }

    public function createItem() {
        $item = new Item();
        $item->setName("item1");
        $item->setContent("contenu de item");
        $item->setCreatedAt(new DateTime('now'));

        $this->item = $item;
    }

    public function testAddItemNominal() {
        $this->createUser();
        $this->createItem();
        $todolistservice = $this->getMockBuilder(TodolistService::class)->onlyMethods(['sendMail'])->getMock();
        $todolistservice->expects($this->any())->method('sendMail')->willReturn("mail envoye");

        $this->assertTrue($todolistservice->addItem($this->user, $this->item->getName(), $this->item->getContent()));
    }

    public function testAddItemUserNull() {
        $this->createItem();
        $todolistservice = $this->getMockBuilder(TodolistService::class)->onlyMethods(['sendMail'])->getMock();
        $todolistservice->expects($this->any())->method('sendMail')->willReturn("mail envoye");
        $user = null;

        $this->assertFalse($todolistservice->addItem($user, $this->item->getName(), $this->item->getContent()));
    }

    public function testAddItemUserNotValid() {
        $this->createUser();
        $this->createItem();
        $todolistservice = $this->getMockBuilder(TodolistService::class)->onlyMethods(['sendMail'])->getMock();
        $todolistservice->expects($this->any())->method('sendMail')->willReturn("mail envoye");
        $this->user->setEmail('test');
        
        $this->assertFalse($todolistservice->addItem($this->user, $this->item->getName(), $this->item->getContent()));
    }

    public function testAddItemtodolistNull() {
        $this->createUser();
        $this->createItem();
        $todolistservice = $this->getMockBuilder(TodolistService::class)->onlyMethods(['sendMail'])->getMock();
        $todolistservice->expects($this->any())->method('sendMail')->willReturn("mail envoye");
        $this->settodolist = null;
        
        $this->assertFalse($todolistservice->addItem($this->user, $this->item->getName(), $this->item->getContent()));
    }

    public function testAddItemSendEmail() {
        $this->createUser();
        $this->createItem();
        $todolistservice = $this->getMockBuilder(TodolistService::class)->onlyMethods(['sendMail', 'countItem'])->getMock();
        $todolistservice->expects($this->any())->method('sendMail')->willReturn("mail envoye");
        $todolistservice->expects($this->any())->method('countItem')->willReturn(8);
        
        $this->assertEquals("email envoye", $todolistservice->addItem($this->user, $this->item->getName(), $this->item->getContent()));
    }

}