<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Exception\NotEncodableValueException;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/api/users")
 */
class UserController extends AbstractController
{
    /**
     * @Route("/", name="user_index", methods={"GET"})
     */
    public function index(UserRepository $userRepository): JsonResponse
    {
        return $this->json(['all_users' => $userRepository->findAll()], 200);
    }

    /**
     * @Route("/store", name="user_store", methods={"POST"})
     */
    public function store(Request $request, ValidatorInterface $validatorInterface, SerializerInterface $serializer): JsonResponse
    {
        $user = $request->getContent();
        
        try {
            $user = $serializer->deserialize($user, User::class, 'json');

            $errors = $validatorInterface->validate($user);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }
            if($user->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->json($user, 201);
            } else {
                return $this->json("invalid user", 400);
            }
        } catch(NotEncodableValueException $e) {
            return $this->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show($id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);
        if(is_null($user)) {
            return $this->json(["user" => "null"], 400);
        }
        return $this->json(["user" => $user], 200);
    }

    /**
     * @Route("/{id}", name="user_edit", methods={"PUT"})
     */
    public function edit(Request $request, $id, SerializerInterface $serializer, ValidatorInterface $validatorInterface, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);
        if(is_null($user)) {
            return $this->json(["error" => "the user doesn't exist"], 400);
        }
        $data = $request->getContent();
        try {
            $userEdited = $serializer->deserialize($data, User::class, 'json');
            $user->setEmail($userEdited->getEmail())
                ->setFirstName($userEdited->getFirstName())
                ->setLastName($userEdited->getLastName())
                ->setPassword($userEdited->getPassword())
                ->setbirthday($userEdited->getBirthday());
            
            $errors = $validatorInterface->validate($user);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }
            if($user->isValid()) {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();

                return $this->json($user, 200);
            } else {
                return $this->json("invalid user", 400);
            }
        } catch(NotEncodableValueException $e) {
            return $this->json(['message' => $e->getMessage()], 400);
        }
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete($id, UserRepository $userRepository): JsonResponse
    {
        $user = $userRepository->find($id);
        if(!$user) {
            return $this->json(["error" => "the user doesn't exist"], 400);
        }
        
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($user);
        $entityManager->flush();

        return $this->json("deleted with success", 200);
    }
}
