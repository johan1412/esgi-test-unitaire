<?php

namespace App\Controller;

use App\Entity\Item;
use App\Repository\ItemRepository;
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
 * @Route("/api/items")
 */
class ItemController extends AbstractController
{

    private $TodolistService;


    public function __construct(TodolistService $service)
    {
        $this->TodolistService = $service;
    }


    /**
     * @Route("/", name="item_index", methods={"GET"})
     */
    public function index(ItemRepository $itemRepository): JsonResponse
    {
        return $this->json(['all items' => $itemRepository->findAll()], 200);
    }

    /**
     * @Route("/store", name="item_new", methods={"POST"})
     */
    public function store(Request $request, UserRepository $userRepository): JsonResponse
    {
        $data = json_decode($request->getContent());
        $name = $data->name;
        $content = $data->content;
        $user = $userRepository->find($data->userId);

        if(!$user) {
            return $this->json("user doesn't exist", 400);
        }
        
        if($this->TodolistService->addItem($user, $name, $content)) {
            return $this->json("successful creation", 201);
        } else {
            return $this->json("invalid request", 400);
        }
    }

    /**
     * @Route("/{id}", name="item_show", methods={"GET"})
     */
    public function show($id, ItemRepository $itemRepository): JsonResponse
    {
        $item = $itemRepository->find($id);
        if(!$item) {
            return $this->json("item doesn't exist", 400);
        }
        return $this->json(["item" => $item], 200);
    }

    /**
     * @Route("/{id}", name="item_edit", methods={"PUT"})
     */
    public function edit(Request $request, $id, ItemRepository $itemRepository, ValidatorInterface $validatorInterface, SerializerInterface $serializer): JsonResponse
    {
        $item = $itemRepository->find($id);
        if(is_null($item)) {
            return $this->json(["error" => "the item doesn't exist"], 400);
        }
        $data = $request->getContent();
        try {
            $itemEdited = $serializer->deserialize($data, Item::class, 'json');
            $item->setName($itemEdited->getName());
            $item->setContent($itemEdited->getContent());
            
            $errors = $validatorInterface->validate($item);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($item);
            $entityManager->flush();

            return $this->json($item, 200);

        } catch(NotEncodableValueException $e) {
            return $this->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @Route("/{id}", name="item_delete", methods={"DELETE"})
     */
    public function delete($id, ItemRepository $itemRepository): JsonResponse
    {
        $item = $itemRepository->find($id);
        if(!$item) {
            return $this->json(["error" => "the item doesn't exist"], 400);
        }
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($item);
        $entityManager->flush();

        return $this->json("deleted with success", 200);
    }
}
