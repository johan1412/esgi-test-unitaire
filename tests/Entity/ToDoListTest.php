<?php

namespace tests\Entity;

use App\Entity\Item;
use App\Entity\Todolist;
use App\Entity\User;
use DateInterval;
use DateTime;
use PHPUnit\Framework\TestCase;

class TodolistTest extends TestCase {

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

    public function testCanAddItemNominal() {
        $this->createUser();
        $this->createItem();
        $todolist = new Todolist();
        $todolist->setName("testName");

        $this->assertTrue($todolist->canAddItem($this->item, $this->user));
    }

    public function testCanAddItemNull() {
        $this->createUser();
        $item = null;
        $todolist = new Todolist();
        $todolist->setName("testName");

        $this->assertFalse($todolist->canAddItem($item, $this->user));
    }

    public function testCanAddLastItemTooRecent() {
        $this->createItem();
        $this->createUser();
        $todolist = $this->getMockBuilder(Todolist::class)->onlyMethods(['lastItem'])->getMock();

        $lastItem = new Item();
        $lastItem->setName("item2");
        $lastItem->setContent("content of second");
        $date = new DateTime('now');
        $lastItem->setCreatedAt($date->sub(new DateInterval('PT60S')));

        $todolist->expects($this->any())->method('lastItem')->willReturn($lastItem);

        $this->assertFalse($todolist->canAddItem($this->item, $this->user));
    }

    public function testCanAddItemTooMany() {
        $this->createUser();
        $this->createItem();
        $todolist = $this->getMockBuilder(Todolist::class)->onlyMethods(['countItem'])->getMock();

        $todolist->expects($this->any())->method('countItem')->willReturn(10);

        $this->assertFalse($todolist->canAddItem($this->item, $this->user));
    }

}