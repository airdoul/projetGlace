<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\InscriptionTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

final class InscriptionController extends AbstractController
{
    #[Route('/inscription', name: 'app_inscription')]
    public function register(Request $request, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordEncoder): Response
    {
        $user = new User();
        $form = $this->createForm(InscriptionTypeForm::class, $user);
        $form->handleRequest(($request));

        if ($form->isSubmitted() && $form->isValid()) {
            $user->setRoles(['ROLE_USER']);
            $user->setPassword(
                $passwordEncoder->hashPassword($user, $form->get('password')->getData())
            );
            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Vous êtes maintenant bien inscrit !');

            return $this->redirectToRoute('app_home');
        }

                return $this->render('inscription/inscription.html.twig', [
            'inscriptionForm' => $form->createView(),
        ]);
    }
}
