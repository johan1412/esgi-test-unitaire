<?php

namespace App\Entity;

use DateInterval;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use App\Repository\TodolistRepository;

/**
 * @ORM\Entity(repositoryClass=TodolistRepository::class)
 */
class Todolist
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="todolist")
     */
    private $items;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    public function __construct()
    {
        $this->items = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Item[]
     */
    public function getItems(): Collection
    {
        return $this->items;
    }

    public function addItem(Item $item): self
    {
        if (!$this->items->contains($item)) {
            $this->items[] = $item;
            $item->setToDoList($this);
        }

        return $this;
    }

    public function removeItem(Item $item): self
    {
        if ($this->items->removeElement($item)) {
            // set the owning side to null (unless already changed)
            if ($item->getToDoList() === $this) {
                $item->setToDoList(null);
            }
        }

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function canAddItem($item, $user) {
        try {
            if(is_null($item) || !$item->isValid()) {
                throw new Exception("item null or invalid");
            }
            if(is_null($user) || !$user->isValid()) {
                throw new Exception("user null or invalid");
            }
            if($this->countItem() >= 10) {
                throw new Exception("Todolist cannot have more item");
            }

            $lastItem = $this->lastItem();
            if($lastItem) {
                $currentDate = new DateTime('now');
                if(($lastItem->getCreatedAt()->add(new DateInterval('PT1800S'))) > $currentDate) {
                    throw new Exception("Last item too recent");
                }
            }
        } catch(Exception $e) {
            echo "Exception : " . $e->getMessage() . "\n";
            return false;
        }

        return true;
    }

    public function lastItem() {
        if(empty($this->getItems())) {
            return null;
        } else {
            return $this->getItems()->last();
        }
    }

    public function countItem() {
        return sizeof($this->getItems());
    }
}
