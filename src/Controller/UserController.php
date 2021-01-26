<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @Route("/user")
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
    public function store(Request $request, ValidatorInterface $validatorInterface): JsonResponse
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $data = json_decode($request->getContent(),true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validatorInterface->validate($form);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->json(["data" => $data], 201);
        }

        return $this->json("not valid", 400);
    }

    /**
     * @Route("/{id}", name="user_show", methods={"GET"})
     */
    public function show(User $user): JsonResponse
    {
        return $this->json(["user" => $user], 200);
    }

    /**
     * @Route("/{id}/edit", name="user_edit", methods={"PUT"})
     */
    public function edit(Request $request, User $user, ValidatorInterface $validatorInterface): JsonResponse
    {
        $form = $this->createForm(UserType::class, $user);
        $data = json_decode($request->getContent(),true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            $errors = $validatorInterface->validate($form);
            if(count($errors) > 0) {
                return $this->json($errors, 400);
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->json(["data" => $data], 201);
        }

        return $this->json("edit failed", 400);
    }

    /**
     * @Route("/{id}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user, UserRepository $userRepository): JsonResponse
    {
        if ($userRepository->find($user->getId())) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();

            return $this->json("deleted with success", 200);
        }

        return $this->json("delete failed", 400);
    }
}
