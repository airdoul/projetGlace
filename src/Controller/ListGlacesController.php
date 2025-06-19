<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListGlacesController extends AbstractController
{
    #[Route('/list/glaces', name: 'app_list_glaces')]
    public function index(): Response
    {
        return $this->render('list_glaces/list_glaces.html.twig', [
            'controller_name' => 'ListGlacesController',
        ]);
    }
}
