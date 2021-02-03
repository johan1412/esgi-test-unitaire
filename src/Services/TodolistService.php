<?php

namespace App\Services;

use App\Entity\Item;
use App\Entity\Todolist;
use App\Entity\User;
use App\Repository\TodolistRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class TodolistService
{
    private EntityManagerInterface $em;

    public function __construct(EntityManagerInterface $em) {
        $this->em = $em;
    }


    public function sendMail($mailer, $userEmail) {
        $email = (new Email())
            ->from('test@test.fr')
            ->to($userEmail)
            ->text('Vous ne pouvez plus qu\'ajouter que deux items à la todo list');

        $mailer->send($email);

        return true;
    }


    public function createTodolist(User $user, $name, $validatorInterface) {
        if(is_null($user) || !$user->isValid() || !is_null($user->getToDoList())) {
            return false;
        }

        $toDoList = new Todolist();
        $toDoList->setName($name);
        $user->setToDoList($toDoList);

        $errors = $validatorInterface->validate($toDoList);
        if(count($errors) > 0) {
            return false;
        }

        $entityManager = $this->em;
        $entityManager->persist($toDoList);
        $entityManager->persist($user);
        $entityManager->flush();

        return true;
    }


    public function countItem(Todolist $todolist) {
        return sizeof($todolist->getItems());
    }


    public function addItem(User $user, $name, $content) {
        if(is_null($user) || !$user->isValid() || is_null($user->getToDoList())) {
            return false;
        }
        foreach($user->getToDoList()->getItems() as $item) {
            if($item->getName() == $name) {
                return false;
            }
        }
        $item = new Item();
        $item->setName($name);
        $item->setContent($content);
        $item->setCreatedAt(new DateTime('now'));
        
        $todolist = $user->getToDoList();
        if($todolist->canAddItem($item, $user)) {
            $todolist->addItem($item);
            $entityManager = $this->em;
            $entityManager->persist($item);
            $entityManager->flush();

            $countItem = $this->countItem($todolist);
            if($countItem === 8) {
                return $this->sendMail(new MailerInterface, $user->getEmail());
            }

            return true;
        }

        return false;
    }

}