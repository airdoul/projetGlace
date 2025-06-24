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

final class ModifyController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/modify/{id}', name: 'app_modify')]
    public function modify(Glaces $glace, Request $request, EntityManagerInterface $entityManager): Response
    {
        
            // $glace = new Glaces();
        
        $form = $this->createForm(CreateGlaceTypeForm::class, $glace);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $entityManager->persist($glace);

            $entityManager->flush();

            $this->addFlash('success', 'Bravo votre glace a bien été modifiée !');

            return $this->redirectToRoute('app_home');
            
        }


        return $this->render('modify/modify.html.twig', [
            'CreateGlace' =>$form->createView(),
        ]);
    }
}


