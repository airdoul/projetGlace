<?php

namespace App\Controller;

use App\Form\CreateGlaceTypeForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class CreateGlaceController extends AbstractController
{
    #[Route('/create/glace', name: 'app_create_glace')]
    public function app_create_glace(): Response
    {
        $form = $this->createForm(CreateGlaceTypeForm::class);

        return $this->render('create_glace/create_glace.html.twig', [
            'CreateGlace' =>$form->createView(),
        ]);
    }
}
