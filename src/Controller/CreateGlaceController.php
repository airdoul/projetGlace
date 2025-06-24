<?php

namespace App\Controller;

use App\Entity\Glaces;
use App\Form\CreateGlaceTypeForm;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class CreateGlaceController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/create/glace', name: 'app_create_glace')]
    public function app_create_glace(Request $request, EntityManagerInterface $entityManager): Response
    {
        $glace = new Glaces();
        
        $form = $this->createForm(CreateGlaceTypeForm::class, $glace);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($glace);

            $entityManager->flush();

            $this->addFlash('success', 'Bravo votre glace a bien été ajouter !');

            return $this->redirectToRoute('app_home');
        }


        return $this->render('create_glace/create_glace.html.twig', [
            'CreateGlace' =>$form->createView(),
        ]);
    }
}
