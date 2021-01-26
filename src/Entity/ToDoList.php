<?php

namespace App\Entity;

use DateInterval;
use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception;

/**
 * @ORM\Entity(repositoryClass=ToDoListRepository::class)
 */
class ToDoList
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity=Item::class, mappedBy="toDoList")
     */
    private $items;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="toDoList", cascade={"persist", "remove"})
     */
    private $user;

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

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function canAddItem($item) {
        try {
            if(is_null($item) || !$item->isValid()) {
                throw new Exception("item null or invalid");
            }
            if(is_null($this->user) || !$this->user->isValid()) {
                throw new Exception("user null or invalid");
            }
            if($this->countItem() >= 10) {
                throw new Exception("Todolist cannot have more item");
            }

            $lastItem = $this->lastItem();
            $currentDate = new DateTime('now');
            if(($lastItem->getCreatedAt()->add(new DateInterval('P1800S'))) > $currentDate) {
                throw new Exception("Last item too recent");
                
            }
        } catch(Exception $e) {
            echo "Exception : " . $e->getMessage() . "\n";
            return false;
        }

        return true;
    }

    public function lastItem() {
        return $this->getItems()->last();
    }

    public function countItem() {
        return sizeof($this->getItems());
    }
}
