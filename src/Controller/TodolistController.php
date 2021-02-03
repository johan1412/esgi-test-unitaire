<?php

namespace App\Controller;

use App\Entity\Todolist;
use App\Repository\TodolistRepository;
use App\Repository\UserRepository;
use App\Services\TodolistService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/todolists")
 */
class TodolistController extends AbstractController
{
    private $TodolistService;


    public function __construct(TodolistService $service)
    {
        $this->TodolistService = $service;
    }

    /**
     * @Route("/", name="Todolist_index", methods={"GET"})
     */
    public function index(TodolistRepository $TodolistRepository): JsonResponse
    {
        return $this->json(['all todo list' => $TodolistRepository->findAll()], 200);
    }

    /**
     * @Route("/store", name="Todolist_new", methods={"POST"})
     */
    public function store(Request $request, UserRepository $userRepository, ValidatorInterface $validatorInterface): JsonResponse
    {
        $data = json_decode($request->getContent());
        $user = $userRepository->find($data->userId);
        $name = $data->name;

        if(!$user) {
            return $this->json("invalid request", 400);
        }
        
        if($this->TodolistService->createTodolist($user, $name, $validatorInterface)) {
            return $this->json("successful creation", 201);
        } else {
            return $this->json("invalid Todolist", 400);
        }
    }

    /**
     * @Route("/{id}", name="Todolist_show", methods={"GET"})
     */
    public function show($id, TodolistRepository $TodolistRepository): JsonResponse
    {
        $Todolist = $TodolistRepository->find($id);
        if(!$Todolist) {
            return $this->json("todo list doesn't exist", 400);
        }
        return $this->json(["todo list" => $Todolist], 200);
    }

    /**
     * @Route("/{id}", name="Todolist_edit", methods={"PUT"})
     */
    public function edit(Request $request, $id, TodolistRepository $TodolistRepository, SerializerInterface $serializer, ValidatorInterface $validatorInterface): JsonResponse
    {
        $Todolist = $TodolistRepository->find($id);
        if(is_null($Todolist)) {
            return $this->json(["error" => "the todo list doesn't exist"], 400);
        }
        $data = $request->getContent();
        try {
            $TodolistEdited = $serializer->deserialize($data, Todolist::class, 'json');
            $Todolist->setName($TodolistEdited->getName());
            
            $errors = $validatorInterface->validate($Todolist);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($Todolist);
            $entityManager->flush();

            return $this->json($Todolist, 200);

        } catch(NotEncodableValueException $e) {
            return $this->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @Route("/{id}", name="Todolist_delete", methods={"DELETE"})
     */
    public function delete($id, TodolistRepository $TodolistRepository): JsonResponse
    {
        $Todolist = $TodolistRepository->find($id);
        if(!$Todolist) {
            return $this->json(["error" => "the todo list doesn't exist"], 400);
        }
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($Todolist);
        $entityManager->flush();

        return $this->json("deleted with success", 200);
    }
}
