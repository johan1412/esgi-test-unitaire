<?php

namespace App\Entity;

use DateInterval;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use App\Repository\UserRepository;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 */
class User
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $firstName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\OneToOne(targetEntity=Todolist::class)
     */
    private $toDoList;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getbirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setbirthday(\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }


    public function isValid() {
        try {
            if(is_null($this->email) || !filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("email null or not valid");
            }
            if(empty($this->firstName) || empty($this->lastName)) {
                throw new Exception("firstname or lastname null");
            }
            $passwordLength = strlen($this->password);
            if($passwordLength < 8) {
                throw new Exception("password is too short");
            }
            if($passwordLength > 40) {
                throw new Exception("password is too long");
            }
            $user_birthday = $this->birthday;
            $max_birthday = (new DateTime('now'))->sub(new DateInterval('P13Y'));
            if($user_birthday > $max_birthday) {
                throw new Exception("user under 13 years old");
            }
        } catch(Exception $e) {
            echo "Exception levée : " . $e->getMessage() . "\n";
            return false;
        }

        return true;
    }

    public function getToDoList(): ?Todolist
    {
        return $this->toDoList;
    }

    public function setToDoList(?Todolist $toDoList): self
    {
        $this->toDoList = $toDoList;

        return $this;
    }
}
